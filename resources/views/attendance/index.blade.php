@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
         <h2>List of Subjects</h2>

    </div>
    <div class="panel-body">
        <div class="row">

          {{-- <form class="form-horizontal" action="{{action('AttendancesController@create', $subject->id)}}" method="POST" enctype="multipart/from-data">
            {{ csrf_field() }} --}}

            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
              <label for="date" class="col-md-2 control-label">Date</label>
                <div class="col-md-8">
                  <input id="date" class="form-control" type="date" name="date" value="{{ old('date') }}">

                  @if($errors->has('date'))
                  <span class="help-block">
                    <strong>{{ $errors->first('date') }}</strong>
                  </span>
                  @endif
                </div>
            </div>

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
                                                            <a href="{{ action('AttendancesController@create', $subject->id) }}" class="btn btn-primary btn-sm">Take</a>
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
                                             {{-- </form> --}}
                                           </div>
                                       </div>
                                   </div>
                                   <script src="{{ asset('js/warning.js') }}"></script>
                                   @endsection
