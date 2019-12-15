<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Carbon\Carbon;
use App\Attendance;


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


    public function checkAttendance(){
        $students = Student::all();
        $todaysDate = Carbon::today();

        return view('students.check-attendance', compact('students','todaysDate') );
    }

    public function attendancePresent(Request $request){
        $student = Student::find($request->id);
        $attendance = Attendance::where('user_id', $request->id)
                                ->whereDate('attendance_date', Carbon::parse($request->todays_date))
                                ->first();

        if(!$attendance){
            $attendance = new Attendance;
        }

        $attendance->user_id = $request->id;
        $attendance->attendance_date = Carbon::parse($request->todays_date);
        $attendance->is_present = true;
        $attendance->save();

        return redirect()->back()->withStatus($student->full_name.' is present.');
    }   

    public function attendanceAbsent(Request $request){
        $student = Student::find($request->id);
        $attendance = Attendance::where('user_id', $request->id)
                                ->whereDate('attendance_date', Carbon::parse($request->todays_date))
                                ->first();

        if(!$attendance){
            $attendance = new Attendance;
        }

        $attendance->user_id = $request->id;
        $attendance->attendance_date = Carbon::parse($request->todays_date);
        $attendance->is_present = false;
        $attendance->save();

        return redirect()->back()->withStatus($student->full_name.' is absent.');
    }

}

