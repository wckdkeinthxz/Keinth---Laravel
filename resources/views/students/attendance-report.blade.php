@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       		<h1>Students</h1>
        

          <table class='table'>
       			<thead>
       				<tr>
       					<th>#</th>
       					<th>Students</th>

                @foreach($dates as $date)
                    <th>{{ $date }}</th>
                @endforeach
       				</tr>
       			</thead>
       			<tbody>
                @foreach($students as $student)
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $student->full_name }}}</th>

                    @foreach($dates as $date)
                      <th>{{ $student->attendance($date) }}</th>
                    @endforeach
                @endforeach
       			</tbody>
       			</tbody>
       		</table>
        </div>
    </div>
</div>
@endsection


