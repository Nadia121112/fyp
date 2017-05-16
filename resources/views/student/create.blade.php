@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Register Student</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('StudentsController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nomatrik') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label">Matric Number</label>
                        <div class="col-md-8">
                             <input id = "nomatrik" type="text" class="form-control" name="nomatrik" value="{{ old('nomatrik') }}" required autofocus>

                             @if($errors->has('nomatrik'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('nomatrik') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     <div class="form-group{{ $errors->has('namapelajar') ? ' has-error' : '' }}">
                         <label class="col-md-2 control-label">Student Name</label>
                         <div class="col-md-8">
                              <input id = "namapelajar" type="text" class="form-control" name="namapelajar" value="{{ old('namapelajar') }}" required autofocus>

                              @if($errors->has('namapelajar'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('namapelajar') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('kursus') ? ' has-error' : '' }}">
                          <label class="col-md-2 control-label">Course</label>
                          <div class="col-md-4">
                              <select id ="kursus"  type= "text" class="form-control" name="kursus" required autofocus>

                                <option value="SEIS">SEIS</option>
                                <option value="SEMM">SEMM</option>
                                <option value="IT">IT</option>
                                <option value="CS">CS</option>
                            </select>

                               @if($errors->has('kursus'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('kursus') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group{{ $errors->has('set') ? ' has-error' : '' }}">
                           <label class="col-md-2 control-label">Set Kursus</label>
                           <div class="col-md-2">
                                <input id = "set" type="text" class="form-control" name="set" value="{{ old('set') }}" required autofocus>

                                @if($errors->has('set'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('set') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('nombortelefon') ? ' has-error' : '' }}">
                           <label class="col-md-2 control-label">Phone Number</label>
                           <div class="col-md-8">
                                <input id = "nombortelefon" type="text" class="form-control" name="nombortelefon" value="{{ old('nombortelefon') }}" required autofocus>

                                @if($errors->has('nombortelefon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombortelefon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                     <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                             <a href="{{ action('AttendancesController@index') }}" class="btn btn-default">Cancel</a>
                             <button type="submit" class="btn btn-success">Save</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
 @endsection
