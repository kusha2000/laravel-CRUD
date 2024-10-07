<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('avatar');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);

        $stuData = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'avatar' => $fileName,
        ];

        Student::create($stuData);

        return response()->json([
            'status' => 200,
        ]);
    }

    public function fetchAll()
    {
        $students = Student::all();

        $response = '';

        if ($students->count() > 0) {
            $response .= "<table id='stuTable' class='display'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            ";

            foreach ($students as $student) {
                $response .= "
                <tr>
                    <th>".$student->id."</th>
                    <th><img src='storage/images/".$student->avatar."' width='50px' height='50px' class='img-thumbnail rounded-circle'></th>
                    <th>".$student->first_name." ".$student->last_name."</th>
                    <th>".$student->email."</th>
                    <th><a href='#' id='".$student->id."' class='userEditBtn'  data-bs-toggle='modal' data-bs-target='#editStudentModal'>Edit</a> | Delete</th>
                </tr>
                ";
            }


            $response .= "</tbody></table>";

            echo $response;
        } else {
            echo "<h3 align='center'>No Record in the Database</h3>";
        }
    }
}
