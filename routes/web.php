<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'company','middleware'=>'auth'],function (){

    Route::get('lowongan','NewApplicantController@ViewApplicant');
    Route::get('list','NewApplicantController@ApplicationList');

    Route::get('daftar/{id}','NewApplicantController@ViewRegisterBiodata');
    Route::post('daftar','NewApplicantController@RegisterBiodata');

    Route::get('psychotest/{id}','NewApplicantController@ViewPsychoTest');
    Route::post('psychotest','NewApplicantController@StorePsychoTest');

    Route::group(['prefix'=>'internals','middleware'=>'notApplicant'],function (){

        Route::resource('applicant','ApplicantController');
        Route::get('print/{id}','ApplicantController@printOut');
        Route::resource('lowongan','VacancyController');

        Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){

            Route::resource('psychotest','PsychoTestController');
            Route::resource('scoringType','ScoringTypeController');
            Route::resource('config/scoringValue','ScoringValueController');
            Route::get('create/scoringValue/{id}','ScoringValueController@create_value');

            route::group(['prefix'=>'pelamar'],function (){
                Route::get('masuk/{id}','ApplicantController@ShowPreCalculated');
                Route::get('terproses/{id}','ApplicantController@ShowCalculated');
                Route::get('terima/{id}','ApplicantController@AcceptApplicant');
                Route::get('tolak/{id}','ApplicantController@RejectApplicant');
            });

        });

    });

});

Route::get('storage/{path}',function ($path){
    $path = storage_path('app/' . $path);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->where('path','.+');