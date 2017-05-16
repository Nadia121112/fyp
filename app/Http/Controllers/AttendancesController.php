<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Subject;
use App\Student;
use App\AttendanceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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
     public function create()
     {
      // $attendance_lists = AttendanceList::with('subject')->where('codesubject',Auth::user()->id)->paginate(5);
      // $attendance_lists = AttendanceList::findOrFail($codesubject);
      $students = Student::get();
      $attendance_lists = AttendanceList::get();
      // $attendance_lists = AttendanceList::with('user','subject')->where('user_id','codesubject',Auth::user()->id)->paginate(5);
       return view('attendance.create' ,compact('attendance_lists', 'students'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
       'nomatrik' => 'required',
      // 'namapelajar' => 'required',


      ]);

      $attendance_lists= new AttendanceList;
      $attendance_lists->nomatrik = $request->nomatrik;
      // $attendance->namapelajar = $request->namapelajar;



      $attendance_lists->save();


      return redirect()->action('AttendancesController@create')->withMessage('Attendance have been recorded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
      $attendance = Attendance ::findOrFail($id);
      return view('attendance.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'codesubject' => 'required',
          'subjectname' => 'required',
          'classtype' => 'required',
          'starttime' => 'required',
          'endtime' => 'required',

      ]);

      $attendance = Subject::findOrFail($id);
      $attendance->codesubject = $request->codesubject;
      $attendance->subjectname = $request->subjectname;
      $attendance->classtype = $request->classtype;
      $attendance->starttime = $request->starttime;
      $attendance->endtime = $request->endtime;
      $attendance->save();

      return redirect()->action('AttendancesController@index')->withMessage('Subject has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $attendance = attendance::findOrFail($id);
      $attendance->delete();
      return back()->withError('Subject has been successfully deleted');

    }
}
