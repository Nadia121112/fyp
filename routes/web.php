<?php

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/home', 'HomeController@index');
    Route::get('/profile', 'PenggunasController@index');
    Route::get('/profile/{profile}/edit', 'PenggunasController@edit');
    Route::patch('/profile/{profile}', 'PenggunasController@update');

    Auth::routes();

     //subject
    // Route::group(['middleware' =>  ['auth', 'admin']], function(){

    // Route::get('/registersubj', 'SubjectsController@index');
    // Route::get('/registersubj/create', 'SubjectsController@create');
    // Route::post('/registersubj', 'SubjectsController@store');
    // Route::get('/registersubj/{registersubj}', 'SubjectsController@show');
    // Route::get('/registersubj/{registersubj}/edit', 'SubjectsController@edit');
    // Route::patch('/registersubj/{registersubj}', 'SubjectsController@update');
    // Route::delete('/registersubj/{registersubj}/delete', 'SubjectsController@destroy');


      //attendance
    Route::get('/attendance', 'AttendancesController@index');
    Route::get('/attendance/{id}', 'AttendancesController@create');
    Route::get('/attendance/{id}/show', 'AttendancesController@show');
    Route::post('/attendance/{id}', 'AttendancesController@store');
    Route::patch('/attendance/{attendance}', 'AttendancesController@update');
    Route::delete('/attendance/{attendance}/delete', 'AttendancesController@destroy');



// });

  // Route::group(['middleware' =>  ['auth', 'admin']], function(){

    Route::get('/registersubj', 'SubjectsController@index');
    Route::get('/registersubj/create', 'SubjectsController@create');
    Route::post('/registersubj', 'SubjectsController@store');
    Route::get('/registersubj/{registersubj}', 'SubjectsController@show');
    Route::get('/registersubj/{registersubj}/edit', 'SubjectsController@edit');
    Route::patch('/registersubj/{registersubj}', 'SubjectsController@update');
    Route::delete('/registersubj/{registersubj}/delete', 'SubjectsController@destroy');
    Route::get('/senaraisubjek', 'SubjectsController@senaraisubjek');

    //students
    Route::get('/registerstudent', 'StudentsController@index');
    Route::get('/registerstudent', 'StudentsController@create');
    Route::post('/registerstudent', 'StudentsController@store');

  // });

  // student register subject
  Route::get('/daftarsubjek', 'DaftarsubjeksController@index');
  Route::post('/registerclass', 'DaftarsubjeksController@store');
  Route::get('/listsubjek', 'DaftarsubjeksController@listsubjek');
  Route::get('/daftarsubjek/{codesubject}/listpelajar', 'DaftarsubjeksController@listpelajar')->name('daftarsubjek.listpelajar');




    //students
//   Route::group(['middleware' =>  ['auth', 'admin']], function(){
//
//   Route::get('/registerstudent', 'StudentsController@index');
//   Route::get('/registerstudent/create', 'StudentsController@create');
//   Route::post('/registerstudent', 'StudentsController@store');
//     // Route::get('/registerstudent', 'StudentsController@index');
//     // Route::get('/registerstudent/insert', 'StudentsController@insert');
//     // Route::post('/registerstudent', 'StudentsController@store');
//     // Route::get('/registersubj/{registersubj}', 'SubjectsController@show');
//     // Route::get('/registersubj/{registersubj}/edit', 'SubjectsController@edit');
//     // Route::patch('/registersubj/{registersubj}', 'SubjectsController@update');
//     // Route::delete('/registersubj/{registersubj}/delete', 'SubjectsController@destroy');
//
// });


//
// Route::get('/home', 'HomeController@index');
