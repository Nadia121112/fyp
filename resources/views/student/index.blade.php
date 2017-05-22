@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Students<a href="{{ url('/registerstudent/create') }}" class="btn btn-info pull-right" role="button">Update Info</a></h2>

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
                                <th width="30%">Student Name </th>
                                <th width="30%">Programme</th>
                                <th width="30%">Year</th>
                                <th width="20%">Phone Number</th>

                                {{-- <th width="15%">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody pull-{right}>
                                                    <?php $i = 0 ?>
                                                    @forelse($students as $student)
                                                        <tr>

                                                            <td>{{ $student->nomatrik }}</td>
                                                            <td>{{ $student->namapelajar }}</td>
                                                            <td>{{ $student->program }}</td>
                                                            <td>{{ $student->tahun }}</td>
                                                            <td>{{ $student->nombortelefon }}</td>
                                                            {{-- <td>{{ $student->user->name }}</td> --}}

                                                            {{-- <td>
                                                            @if( $student->user_id == Auth::user()->id)
                                                                <a href="{{ action('StudentsController@edit',   $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                                <a href="{{ action('StudentsController@destroy',    $student->id) }}" class="btn btn-danger btn-sm" id="confirm-modal">Delete</a>
                                                            @endif
                                                            </td> --}}
                                                        </tr>
                                                        <?php $i++ ?>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6">Looks like there is update here.</td>
                                                    </tr>

                                                    @endforelse
                                                </tbody>
                                              </table>
                                                       {{ $students->links() }}
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <script src="{{ asset('js/warning.js') }}"></script>
                                   @endsection
