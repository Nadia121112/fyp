
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Take Attendance</h2>
  </div>
<div class="panel-body">
  <form class="form-horizontal" action="{{ action('AttendancesController@store')}}" method="POST"
          enctype="multipart/form-data">
            {{ csrf_field() }}
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


</form>

<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>

                            {{-- <th width="20%">Code Subject</th> --}}
                            <th width="20%">Matric Number</th>
                            <th width="20%">Student Name</th>
                            <th width="20%">Programme</th>
                            <th width="20%">Created Time</th>

                        </tr>
                    </thead>
                    <tbody pull-{right}>
<?php $i=0 ?>
@foreach($students as $b)
@foreach($attendance_lists as $a)

      @if($a->nomatrik == $b->nomatrik)
  <tr>
      {{-- <td>{{$a->codesubject}}</td> --}}
      <td>{{ $b->nomatrik }}</td>
      <td>{{ $b->namapelajar }}</td>
      <td>{{ $b->kursus }}</td>
      <td>{{ $a->created_at }}</td>
        @endif
    </tr>

  <?php $i++ ?>

@endforeach($attendances as $attendance)

@endforeach

</table>
</div>
</div>

      </div>
    </div>


@endsection
