<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function store(Request $request){
        $file=$request->file('avatar');
        $fileName=time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images',$fileName);

        $stuData=[
            'first_name'=>$request->fname,
            'last_name'=>$request->lname,
            'email'=>$request->email,
            'avatar'=>$fileName,
        ];

        Student::create($stuData);

        return response()->json([
            'status'=>200,
        ]);
    }
}
