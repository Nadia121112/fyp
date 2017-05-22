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

                    <div class="form-group">
                        <label class="col-md-2 control-label">Matric Number</label>
                        <div class="col-md-8">
                          <td>{{Auth ::User()->userid}}</td>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-md-2 control-label">Name</label>
                         <div class="col-md-8">
                           <td>{{Auth ::User()->name}}</td>
                          </div>
                      </div>

                    
                      <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                          <label class="col-md-2 control-label">Tahun Pengajian</label>
                          <div class="col-md-2">
                               <input id = "tahun" type="text" class="form-control" name="tahun" value="{{ old('tahun') }}" required autofocus>

                               @if($errors->has('tahun'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('tahun') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                      <div class="form-group{{ $errors->has('program') ? ' has-error' : '' }}">
                          <label class="col-md-2 control-label">Programme</label>
                          <div class="col-md-4">
                              <select id ="program"  type= "text" class="form-control" name="program" required autofocus>

                                <option value="SEIS">SOFTWARE ENGINEERING INFORMATION SYSTEM DEVELOPMENT</option>
                                <option value="SEMM">SOFTWRARE ENGINEERING MULTIMEDIA</option>
                                <option value="IT">INFORMATION TECHNOLOGY</option>
                                <option value="CS">COMPUTER SCIENCE</option>
                            </select>

                               @if($errors->has('program'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('program') }}</strong>
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
