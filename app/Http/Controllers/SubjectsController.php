<?php

namespace App\Http\Controllers;

use App\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subjects = Subject::with('user')->where('user_id',Auth::user()->id)->paginate(5);
      return view('subject.index', compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('subject.create');
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
          'codesubject' => 'required',
          'subjectname' => 'required',
          'classtype' => 'required',
          'day' => 'required',
          'starttime' => 'required',
          'endtime' => 'required',


      ]);

      $subject = new Subject;
      $subject->codesubject = $request->codesubject;
      $subject->subjectname = $request->subjectname;
      $subject->classtype = $request->classtype;
      $subject->day = $request->day;
      $subject->starttime = $request->starttime;
      $subject->endtime = $request->endtime;
      $subject->user_id = Auth::user()->id;
      $subject->save();

      return redirect()->action('SubjectsController@store')->withMessage('Subject has been successfully added');

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
    public function edit($id)
    {
      $subject = Subject ::findOrFail($id);
      return view('subject.edit', compact('subject'));
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
          'day' => 'required',
          'starttime' => 'required',
          'endtime' => 'required',

      ]);

      $subject = Subject::findOrFail($id);
      $subject->codesubject = $request->codesubject;
      $subject->subjectname = $request->subjectname;
      $subject->classtype = $request->classtype;
      $subject->day = $request->day;
      $subject->starttime = $request->starttime;
      $subject->endtime = $request->endtime;
      $subject->save();

      return redirect()->action('SubjectsController@index')->withMessage('Subject has been successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subject = subject::findOrFail($id);
      $subject->delete();
      return back()->withError('Subject has been successfully deleted');

    }

    public function senaraisubjek (){

      $subjects = Subject::with('user')->paginate(5);
      return view('subject.senaraisubjek', compact('subjects'));
    }
}
