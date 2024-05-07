<?php

namespace App\Http\Controllers;
use App\Models\Code;
use App\Classes\HashCode;
use Illuminate\Http\Request;
use App\Jobs\GenerateHashCodes;

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
        $range = str_split($request->range);

        $data = [
            'length' => $request->length,
            'prefix' => $request->prefix ?? '',
            'suffix' => $request->suffix ?? '',
            'range'  => $range ?? '',
        ];

        GenerateHashCodes::dispatch($data);

        return back();
    }
}
