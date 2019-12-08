<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index(){
    	$students = Student::all();
    	return view('students.index', array('students' => $students));
    }

    public function addStudent(){
    	return view('students.add-student');
    }

    public function store(Request $request){
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    	]);

    	$student = new Student;
    	$student->first_name = $request->first_name;
    	$student->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
    	$student->last_name = $request->last_name;
    	$student->save();

    	return redirect()->route('students.index')->withStatus('Student Added.');
    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);


        $student = Student::find($request->id);
        if($student){
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->middle_name = $request->middle_name ? $request->middle_name : 'N/A';
            $student->save();
        }

        return redirect()->back()->withStatus('Student Updated!');
        
        }

        public function destroy(Request $request){
            $student = Student::find($request->id);

            if($student){
                $student->delete();
            }

            return redirect()->back()->withStatus('Student Deleted.');
        }

}

