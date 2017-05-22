@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Register Subject</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('SubjectsController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('codesubject') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Code Subject</label>
                        <div class="col-md-8">
                             <input id = "codesubject" type="text" class="form-control" name="codesubject" value="{{ old('codesubject') }}" required autofocus>

                             @if($errors->has('codesubject'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('codesubject') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group{{ $errors->has('subjectname') ? ' has-error' : '' }}">
                         <label class="col-md-2 control-label">Subject Name</label>
                         <div class="col-md-8">
                              <input id = "subjectname" type="text" class="form-control" name="subjectname" value="{{ old('subjectname') }}" required autofocus>

                              @if($errors->has('subjectname'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('subjectname') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('classtype') ? ' has-error' : '' }}">
                          <label class="col-md-2 control-label">Class Type</label>
                          <div class="col-md-4">
                              <select id ="classtype"  type= "text" class="form-control" name="classtype" required autofocus>

                                <option value="Lecture">Lecture</option>
                                <option value="Tutorial">Tutorial</option>
                                <option value="Lab">Lab</option>
                            </select>

                               @if($errors->has('classtype'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('classtype') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                           <label class="col-md-2 control-label">Day</label>
                           <div class="col-md-4">
                               <select id ="day"  type= "text" class="form-control" name="day" required autofocus>

                                 <option value="Monday">Monday</option>
                                 <option value="Tuesday">Tuesday</option>
                                 <option value="Wednesday">Wednesday</option>
                                 <option value="Thursday">Thursday</option>
                                 <option value="Friday">Friday</option>
                             </select>

                                @if($errors->has('day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('starttime') ? ' has-error' : '' }}">
                           <label class="col-md-2 control-label">Start Time</label>
                           <div class="col-md-4">
                               <input id ="starttime"  type= "time" class="form-control" name="starttime" >

                                @if($errors->has('starttime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('starttime') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endtime') ? ' has-error' : '' }}">
                            <label class="col-md-2 control-label">End Time</label>
                            <div class="col-md-4">
                                <input id ="endtime"  type= "time" class="form-control" name="endtime" required autofocus>

                                 @if($errors->has('endtime'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('endtime') }}</strong>
                                     </span>
                                 @endif
                             </div>
                         </div>


                     <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                             <a href="{{ action('SubjectsController@index') }}" class="btn btn-default">Cancel</a>
                             <button type="submit" class="btn btn-success">Save</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 @endsection
