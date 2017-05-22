@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Senarai Subjek</h2>
    </div>
    <div class="panel-body">
      <div class="row">
              <div class="col-md-25">
                <div class="table-responsive">
              <div class="col-md-15">
                  @foreach($subjects as $subject)
                      <div class="col-md-4" id="senaraisubjek">
                          <h4><strong>{{ $subject->subjectname }}</strong></h4>

                          <br>

                          <p> Subject Code   :  {{ $subject->codesubject }}</p>
                          <p> Class type  :  {{ $subject->classtype }}</p>
                          <p> Day  :  {{ $subject->day }}</p>
                          <p> Start time  :  {{ $subject->starttime }}</p>
                          <p> End time  :  {{ $subject->endtime }}</p>

                          {{-- <p>  {{ date("g:ia\, jS M Y", strtotime($pendaftaran->masa_mula)) }}</p>
					                <p>  {{date("g:ia\, jS M Y", strtotime($pendaftaran->masa_akhir)) }}</p>  --}}

                          <br>
                          <form action="{{ action('DaftarsubjeksController@store') }}" method="POST">
                  {{ csrf_field() }}

                    <button type="submit" class="btn btn-primary">ADD</button>
                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">

</form>

                          <br><br>
                      </div>
                  @endforeach
                </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
