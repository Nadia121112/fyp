@extends('layouts.app')
@section('content')

            <div class="panel panel-default">
  <div class="panel-heading">
<h2>List of Subjects</h2>
</div>
        <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th width="10%">Code Subject</th>
                          <th width="25%">Subject Name </th>
                          <th width="18%">Class Type </th>
                          <th width="10%">Start Time</th>
                          <th width="12%">End Time</th>
                          <th width="25%">Action</th>


                        </tr>
                      </thead>
                      <tbody pull-{right}>
                        <?php $i = 0 ?>
                        @forelse($daftarsubjeks as $daftarsubjek)
                        <tr>
                          <td >{{ $daftarsubjeks->firstItem() + $i }}</td>
                          <td>{{  $daftarsubjek->subject->codesubject }}</td>
                          <td>{{  $daftarsubjek->subject->subjectname }}</td>
                          <td>{{  $daftarsubjek->subject->classtype }}</td>
                          <td>{{  $daftarsubjek->subject->starttime }}</td>
                          <td>{{  $daftarsubjek->subject->endtime }}</td>

        </tr>


        <?php $i++ ?>
                @empty
                    <tr>
                        <td colspan="6">Tiada program yang telah anda daftarkan .</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {{ $daftarsubjeks->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="{{ asset('js/warning.js') }}"></script>
        @endsection
