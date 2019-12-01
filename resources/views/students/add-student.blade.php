@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>Add Student </h1>
              <form action="{{ route('students.store') }}" method="post">
                  @csrf
                  <input class="form-control mb-2" name="first_name" placeholder="First Name"/>
                  <input class="form-control mb-2" name="middle_name" placeholder="Middle Name"/>
                  <input class="form-control mb-2" name="last_name" placeholder="Last Name"/>
                  <button type="submit" class="btn btn-primary">Add Student</button>
              </form>
        </div>
    </div>
</div>
@endsection