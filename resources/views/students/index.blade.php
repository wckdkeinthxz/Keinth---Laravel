@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       		<h1>Students</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-student-modal">Add Student</button>
       		@include('students.modals._add-student-modal')

          <a href="{{ route('students.check_attendance') }}" class="btn btn-primary">Check Today's Attendance</a>

           <a href="{{ route('students.attendance_report') }}" class="btn btn-primary">Attendance Report</a>

          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Name</th>
                <th>Year Level</th>
                <th>Action</th>
       				</tr>
       			</thead>
       			<tbody>
              @foreach($students as $student)
           				<tr>
           					<td>{{ $loop->iteration}}</td>
           					<td>
                      {{ $student->first_name }} 
                      {{ $student->middle_name }} 
                      {{ $student->last_name }}
                    </td>
                    <th>{{ $student->year_level }}</th>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-student-modal-{{$student->id}}">Edit</button>
                        @include('students.modals._edit-student-modal')

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-student-modal-{{$student->id}}">Delete</button>
                        @include('students.modals._delete-student-modal')
                    </td>
           				</tr>
              @endforeach
       				</tbody>
       			</tbody>
       		</table>
        </div>
    </div>
</div>
@endsection


