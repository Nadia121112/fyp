@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1">Kemaskini Profil</a></li>
                </ul>
                <div class="tab-content">

                  <!-- Start of first tab -->
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">

                            <form class="form-horizontal" action="{{ action ('PenggunasController@update' , $pengguna->id) }}" method="POST" enctype="multipart/form-data">

                              {{ csrf_field() }}
                              {{ method_field('PATCH') }}

                                <div class="form-group"><label class="col-sm-2 control-label">Nama :</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="name" placeholder="Username" value="{{ old('name', $pengguna->user->name) }}"></input>
                                    </div>
                                </div>

                                 <div class="form-group"><label class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="" readonly="true" value="{{ old('email', $pengguna->user->email) }}"></input>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Nama Penuh:</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" placeholder="Nama Penuh" value="{{ $pengguna->nama }}"></input>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Telefon:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telefon" placeholder="000-0000000" value="{{ $pengguna->telefon }}"></input>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label">Alamat</label>

                                    <div class="col-md-10">
                                                              <textarea class="form-control" name="alamat" placeholder="Alamat" rows="6"
                                                                        value="{{ $pengguna->alamat }}" maxlength="100"></textarea>
                                                              <p class="text-muted">Maximum character is 100</p>
                                                              @if($errors->has('alamat'))
                                                                  <span class="help-block">
                                                                      <strong>{{ $errors->first('alamat') }}</strong>
                                                                  </span>
                                                              @endif
                                                          </div>
                                                      </div>

                                          <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                                            <label class="col-md-2 control-label">Gambar Profil</label>
                                            <div class="col-md-10">
                                                  <input type="file" name="gambar" id="fileUpload" class="hide">
                                                      <label for="fileUpload" style="width: 500px">
                                                          <img class="image-placeholder" src="{{ $pengguna->gambar }}" width="50%"/>
                                                      </label>
                                            </div>
                                          </div>
                                      </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>
                                    <div class="col-md-4">
                                      <a href="{{ action('PenggunasController@index') }}" class="btn btn-default">Batal</a>
                                      <button type="submit" class="btn btn-primary">Hantar</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <!-- End of first tab -->

                  </div>
                </div>
              </div>
@endsection
@section('script')
@endsection
