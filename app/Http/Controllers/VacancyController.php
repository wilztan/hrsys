<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Vacancy;
use Illuminate\Http\Request;
use Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'vacancies'=>Vacancy::all(),
        ];
        return view('admin.vacancy.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'type'=>'create',
        ];
        return view('admin.vacancy.manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['creator_id' => Auth::user()->id]);
        Vacancy::create($request->all());
        return redirect()->action('VacancyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'vacancy'=>Vacancy::find($id),
            'applicants'=>Applicant::where('vacancy_id','=',$id)->where('status','=','ACCEPTED')->get(),
        ];
        return view('admin.vacancy.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'type'=>'update',
            'vacancy'=>Vacancy::find($id),
        ];
        return view('admin.vacancy.manage',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Vacancy::find($id)->update($request->all());
        return redirect()->action('VacancyController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vacancy::destroy($id);
        return redirect()->action('VacancyController@index');
    }
}
