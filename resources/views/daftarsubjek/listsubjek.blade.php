@extends('layouts.app')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
<h2>Subject List</h2>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th width="20%">Code Subject</th>
<th width="50%">subject Name</th>
<th width="20%">No. of Students</th>
<th width="15%">Action</th>

</tr>
</thead>
<tbody>
    @foreach ($daftarsubjeks as $daftarsubjek)
    <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $daftarsubjek->codesubject }}</td>
<td>{{  $daftarsubjek->subjectname }}</td>
<td>{{$daftarsubjek->total}}</td>
<td>

<a href="{{ route('daftarsubjek.listpelajar', $daftarsubjek->codesubject)}}" class="btn btn-primary btn-sm">List of Students</a>

</td>


    @endforeach

  </tbody>
  </table>

  </div>
  </div>
  </div>
  </div>
  </div>
  <script src="{{ asset('js/warning.js') }}"></script>
  @endsection
