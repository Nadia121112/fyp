@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Take Attendance</h2>
  </div>
<div class="panel-body">

  <form class="form-horizontal" action="{{ action('AttendancesController@store', $id)}}" method="POST"
          enctype="multipart/form-data">
            {{ csrf_field() }}

{{$id}}


            <div class="form-group{{ $errors->has('nomatrik') ? ' has-error' : '' }}">
              <label class="col-md-2 control-label">Matric Number</label>
              {{-- <input class="form-control mr-sm-2" type="text" placeholder="nomatrik"> --}}

              <div class="col-md-8">
                <input class="form-control" type="text" name="nomatrik" placeholder="Enter your matric number"
                rows="6"
                value="{{ old('nomatrik') }}" maxlength="10">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ENTER</button>

                @if($errors->has('nomatrik'))
                <span class="help-block">
                  <strong>{{ $error-s>first('nomatrik') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <input type="hidden" name="status" value="presence">


</form>

<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          {{-- @foreach ($attendance_lists as $attendance_list) --}}


                            {{-- <th width="20%">Code Subject</th> --}}
                            <th width="20%">date</th>
                            <th width="15%">Matric Number</th>
                            <th width="35%">Student Name</th>
                            <th width="25%">Status</th>

                        </tr>
                    </thead>
                    <tbody pull-{right}>

<?php $i=0 ?>
{{-- @foreach($daftarsubjeks as $daftarsubjek)
  <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $daftarsubjek->user->userid }}</td>
<td>{{  $daftarsubjek->user->name }}</td>
</tr>
@endforeach --}}

@foreach ($lists as $list)
  <tr>
    {{-- <td > {{ $loop->iteration}}</td> --}}
    <td>{{$list->date}}</td>
    <td>{{$list->nomatrik}}</td>
    <td>{{$list->user->name}}</td>
    <td>{{$list->status}}</td>
  </tr>

@endforeach

{{-- @foreach($daftarsubjeks as $b)
@foreach($users as $a)

      @if($a->id == $b->user_id)
  <tr>
       <td>{{$a->userid}}</td>
       <td>{{ $a->name }}</td>


    @endif


    </tr>
  @endforeach
@endforeach --}}

  <?php $i++ ?>



</table>
</div>
</div>

      </div>
    </div>


@endsection
