<?php

namespace App\Http\Controllers;
use App\Models\Code;
use App\Classes\HashCode;
use Illuminate\Http\Request;
use App\Jobs\GenerateHashCodes;
use Illuminate\Support\Facades\Artisan;

class CodeController extends Controller
{
    public function index(Request $request){
        $codes = Code::paginate(50);
        if($request->has('q'))
            $codes = Code::where('hash' , 'like' , "%" . $request->get('q') ."%")->paginate(50);
        return view('codes.index' , ['codes' => $codes]);
    }
    public function create(){
        return view('codes.create');
    }
    public function store(Request $request){

        $request->validate([
            'length' => 'required'
        ]);

        $length = $request->length;
        $prefix = $request->prefix;
        $suffix = $request->suffix;

        for ($i=0; $i < 1000; $i++) {
            try{
                Code::create([
                    'hash' => $prefix . substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') , 0 , $length) . $suffix,
                    'status' => false
                ]);
            }catch(\Exception $ex){
                info('Error Code Duplicated !');
            }
        }

        // GenerateHashCodes::dispatch($length);

        // dispatch(new GenerateHashCodes($length));
        // Artisan::command('queue:work', function () {
        //     info('Queue Work Command !');
        // });

        return back();
    }
}
