<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{

    public function index()
    {
      // $students = Student::all();
      // foreach ($students as $student) {
      //   // $subjects= $student->subjek;
      //   $subjects = explode(' ',$student->subjek );
      //   dd($subjects);

      $students = Student::with('user')->where('user_id',Auth::user()->id)->paginate(5);
      return view('student.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// $subjeks = $request-> get('subjek');

      $this->validate($request, [

          'tahun' => 'required',
          'program' => 'required',
          'nombortelefon' => 'required',

      ]);


        $student = new Student;
      
        $student->tahun = $request->tahun;
        $student->program = $request->program;
        $student->nombortelefon = $request->nombortelefon;
        $student->user_id = Auth::user()->id;
        $student->save();


      return redirect()->action('StudentsController@store')->withMessage('Info has been successfully updated');

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
    // public function edit($id)
    // {
    //   $subject = Subject ::findOrFail($id);
    //   return view('subject.edit', compact('subject'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //   $this->validate($request, [
    //       'codesubject' => 'required',
    //       'subjectname' => 'required',
    //       'classtype' => 'required',
    //       'starttime' => 'required',
    //       'endtime' => 'required',
    //
    //   ]);
    //
    //   $subject = Subject::findOrFail($id);
    //   $subject->codesubject = $request->codesubject;
    //   $subject->subjectname = $request->subjectname;
    //   $subject->classtype = $request->classtype;
    //   $subject->starttime = $request->starttime;
    //   $subject->endtime = $request->endtime;
    //   $subject->save();
    //
    //   return redirect()->action('SubjectsController@index')->withMessage('Subject has been successfully updated');
    //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //   $subject = subject::findOrFail($id);
    //   $subject->delete();
    //   return back()->withError('Subject has been successfully deleted');
    //
    // }
}
