@extends('layouts.app')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
<h2>List of Students</h2>

</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th width="20%">Matric Number</th>
<th width="70%">Name</th>


</tr>
</thead>
<tbody>
    @foreach ($daftarsubjeks as $daftarsubjek)

    <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $daftarsubjek->user->userid }}</td>
<td>{{  $daftarsubjek->user->name }}</td>


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
