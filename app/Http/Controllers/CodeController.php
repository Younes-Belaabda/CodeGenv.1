<?php

namespace App\Http\Controllers;
use App\Models\Code;
use \App\Classes\Hashcode;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Jobs\GenerateHashCodes;
use Illuminate\Support\Facades\Storage;

class CodeController extends Controller
{
    public function index(Request $request , Group $group){
        $codes = Code::where('group_id' , $group->id)->paginate(5);
        if($request->has('q'))
            $codes = Code::where('group_id' , $group->id)
            ->where('hash' , 'like' , "%" . $request->get('q') ."%")
            ->paginate(10);
        return view('codes.index' , ['codes' => $codes , 'group' => $group]);
    }

    public function groupes(Request $request){
        $groupes = Group::orderBy('status')->paginate(10);
        if($request->has('q'))
            $groupes = Group::where('name' , 'like' , "%" . $request->get('q') ."%")->paginate(50);
        return view('codes.groupes' , ['groupes' => $groupes]);
    }

    public function create(){
        return view('codes.create');
    }

    public function store(Request $request , Hashcode $hashcode){

        $request->validate([
            'group' => 'required|unique:groups,name',
            'smallcase' => 'required',
            'uppercase' => 'required',
            'numbers' => 'required',
            'codes_number' => 'required'
        ]);

        $group_name = $request->group;
        $prefix = $request->prefix;
        $suffix = $request->suffix;
        $smallcase_count = $request->smallcase;
        $uppercase_count = $request->uppercase;
        $number_count    = $request->numbers;
        $codes_number    = $request->codes_number;
        $chars = [];

        if($request->has('codes_chars') && $request->has('codes_numbers')){
            for($i=0;$i<count($request->codes_chars);$i++){
                $chars[] = [
                    'char' => $request->codes_chars[$i],
                    'number' => $request->codes_numbers[$i],
                ];
            }
        }


        $hashcode->init($prefix ?? '' , $suffix ?? '' , $smallcase_count , $uppercase_count , $number_count , $chars);

        $group = Group::create([
            'name' => $group_name
        ]);

        if(env('JOB_ACTIVATED') == true){
            GenerateHashCodes::dispatch($hashcode);
        }else{
            for ($i=0; $i < $codes_number; $i++) {
                try{
                    Code::create([
                        'hash' => $hashcode->get(),
                        'status' => false,
                        'group_id' => $group->id
                    ]);
                }catch(\Exception $ex){
                    info($ex);
                }
            }
        }

        return back();
    }

    public function download(Group $group){
        $codes = $group->codes;
        $text = '';
        foreach($codes as $code){
            $text .= $code->hash . "\n";
        }

        $filename = time() . '.txt';

        Storage::put(time() . '.txt', $text);

        return Storage::download($filename);
    }

    public function status(Group $group){
        $group->status = true;
        $group->save();
        return back();
    }
}
