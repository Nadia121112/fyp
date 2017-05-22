<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Daftarsubjek;
use App\Subject;
use App\Student;
use App\User;
use App\AttendanceList;
use Illuminate\Html\FormFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $subjects = Subject::with('user')->where('user_id',Auth::user()->id)->paginate(5);
      return view('attendance.index', compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($id){

      //  $daftarsubjeks = \DB::table('daftarsubjeks')->where('subject_id', $id);

      //  $user = User :: findOrFail ($id);
      //  $daftarsubjek = Daftarsubjek::where('daftarsubjek', $user_id);
      //  $user = User::where('user', $id);

      $subject = Subject::where('id', $id)->first();
      $id = $subject->id;
      // dd($subject->id);
      $daftarsubjeks = Daftarsubjek::where('subject_id', $subject->id)->get();
      $current = Carbon::now();
      $date = $current->toDateString();

      // $date = $request->date;
      // dd($date);

      foreach ($daftarsubjeks as $daftarsubjek) {

          $attendance_list = new AttendanceList;

          $attendance_list->date = $date;
          $attendance_list->subject_id = $id;
          $attendance_list->user_id = $daftarsubjek->user_id;  //user id
          $attendance_list->nomatrik = $daftarsubjek->user->userid;  //nomatrik

          $attendance_list->save();
      }

      $lists = AttendanceList::where([
         ['date','=', $current],
        ['subject_id','=', $id],
      ])->get();

      //  return view('attendance.create', compact('lists'));
      return redirect()->action('AttendancesController@show', $id)->withMessage('success');

     }

    /**
     * Store a newly created resource in storage.

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

      $this->validate($request, [
       'nomatrik' => 'required',
      //  'namapelajar' => ' ';
      ]);



      $current = Carbon::now();
      $date = $current->toDateString();
      $inputmatrik = $request->nomatrik;
      // dd($inputmatrik);
      // $inputmatrik = Input::get('nomatrik');
      $nomatriks = AttendanceList::where([
        ['nomatrik','=', $inputmatrik],
        ['date','=', $date],
        ['subject_id', '=', $id],
      ])->get();

      // dd($nomatriks);

      $attendance_list = AttendanceList::where('nomatrik', $inputmatrik)->get();
      // dd($attendance_list);

      foreach ($attendance_list as $attendance) {
        // dd($attendance->id);
        if ($nomatriks !=null) {
          $attendance->status = $request->status ;
          $attendance->save();
          // dd($attendance);

          // return redirect()->action('AttendancesController@index')->withMessage('Attendance have been recorded');
          return back();
        }
        // dd($value->id);
      }
      // dd($attendance_list->id);

      if ($nomatriks !=null) {      //exists

      }


    }

    public function show($id)
    {
      // $sid = Subject::findOrFail($id);
      // $att = AttendanceList::where('subject_id',$sid);
      // dd($att);
      $current = Carbon::now();
      $date = $current->toDateString();
      $lists = AttendanceList::where([
        ['date','=', $date],
        ['subject_id','=', $id],
      ])->get();
      // dd($lists);

        return view('attendance.create', compact('lists', 'id'));
    }


    public function update(Request $request, $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

    }
}
