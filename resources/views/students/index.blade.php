@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       		<h1>Students</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-student-modal">Add Student</button>
       		@include('students.modals._add-student-modal')

          <a href="{{ route('students.check_attendance') }}" class="btn btn-primary">Check Today's Attendance</a>

          <a href="{{ route('students.attendance_report') }}" class="btn btn-primary mb-2">Attendance Report</a>

          <form action="{{ route('students.index') }}" method="get"?>
          <div class="form-group">
              <label>Select Year Level:</label>
              <select class="form-control mb-2" name="year_level"/>
                  <option value="0">Select Year Level</option>
                  <option value="1" @if($year_level == 1) selected @endif>1</option>
                  <option value="2" @if($year_level == 2) selected @endif>2</option>
                  <option value="3" @if($year_level == 3) selected @endif>3</option>
                  <option value="4" @if($year_level == 4) selected @endif>4</option>
                  <option value="5" @if($year_level == 5) selected @endif>5</option>
              </select>

              <button type="submit" class="btn btn-primary">Filter</button>
          </div>
          </form>

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


