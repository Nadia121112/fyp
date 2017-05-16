@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Subjects<a href="{{ url('/registersubj/create') }}" class="btn btn-info pull-right" role="button">Register New Subject</a></h2>

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="10%">Subject Code</th>
                                <th width="30%">Subject Name</th>
                                <th width="10%">Class Type</th>
                                <th width="10%">Start Time</th>
                                <th width="10%">End Time</th>
                                <th width="5%">By</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody pull-{right}>
                                                    <?php $i = 0 ?>
                                                    @forelse($subjects as $subject)
                                                        <tr>
                                                            <td >{{ $subjects->firstItem() + $i }}</td>
                                                            <td>{{ $subject->codesubject }}</td>
                                                            <td>{{ $subject->subjectname }}</td>
                                                            <td>{{ $subject->classtype }}</td>
                                                            <td>{{ $subject->starttime }}</td>
                                                            <td>{{ $subject->endtime }}</td>

                                                            <td>{{ $subject->user->name }}</td>
                                                            <td>
                                                            @if( $subject->user_id == Auth::user()->id)
                                                                <a href="{{ action('SubjectsController@edit',   $subject->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                                <a href="{{ action('SubjectsController@destroy',    $subject->id) }}" class="btn btn-danger btn-sm" id="confirm-modal">Delete</a>
                                                            @endif
                                                            </td>
                                                        </tr>
                                                        <?php $i++ ?>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6">Looks like there is no post available.</td>
                                                    </tr>

                                                    @endforelse
                                                </tbody>
                                              </table>
                                                       {{ $subjects->links() }}
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <script src="{{ asset('js/warning.js') }}"></script>
                                   @endsection
