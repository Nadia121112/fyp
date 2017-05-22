<?php

namespace App\Http\Controllers;
use App\User;
use App\Subject;
use App\Daftarsubjek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DaftarsubjeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $daftarsubjeks = Daftarsubjek::with('user')->where('user_id', Auth::user()->id)->paginate(6);
      return view('daftarsubjek.index', compact('daftarsubjeks'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Respons
     */
     public function listsubjek()
          {
            $daftarsubjeks = DB::table('daftarsubjeks')
            ->join('subjects', 'daftarsubjeks.subject_id', '=', 'subjects.id')
            ->where('subjects.user_id', '=', auth()->id())
            ->selectRaw('count(*) as total, subjects.codesubject as codesubject, subjects.subjectname as subjectname')
            ->groupBy('subject_id')
            ->join('users', 'subjects.user_id', '=', 'users.id')
            ->get();
            return view('daftarsubjek.listsubjek', compact('daftarsubjeks'));
          }

          public function listpelajar($codesubject)
      {
      $subject = Subject::where('codesubject', $codesubject)->first();
      $daftarsubjeks = Daftarsubjek::where('subject_id', $subject->id)->get();
        return view('daftarsubjek.listpelajar', compact('daftarsubjeks'));
      }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $daftarsubjek=new Daftarsubjek;
     $daftarsubjek->user_id=Auth::user()->id;       //user_id
     $daftarsubjek->nomatrik=Auth::user()->userid;   //nomatrik
     $daftarsubjek->subject_id=$request->subject_id;
     $daftarsubjek->save();
     return redirect()->action('SubjectsController@senaraisubjek')->withMessage('Class have been successfully registered');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
