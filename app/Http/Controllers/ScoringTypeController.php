<?php

namespace App\Http\Controllers;

use App\ScoringType;
use App\ScoringValue;
use Illuminate\Http\Request;
use Schema;

class ScoringTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'scoring'=>ScoringType::Where('active','=',1)->get(),
        ];
        return view('admin.config.list',$data);
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
            'list'=>Schema::getColumnListing('applicants')
        ];
        return view('admin.config.manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ScoringType::create($request->all());
        return redirect()->action("ScoringTypeController@index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoringType  $scoringType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'scoring'=>ScoringType::where('id','=',$id)->first(),
            'values'=>ScoringValue::where('type_id','=',$id)->get(),
        ];
        return view('admin.config.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoringType  $scoringType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'type'=>'update',
            'scoring'=>ScoringType::where('id','=',$id)->first(),
            'list'=>Schema::getColumnListing('applicants'),
            'id'=>$id,
        ];
        return view('admin.config.manage',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoringType  $scoringType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ScoringType::where('id','=',$id)->update($request->except(['_method','_token']));
        return redirect()->action("ScoringTypeController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoringType  $scoringType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ScoringType::where('id','=',$id)->where('active','=',1)->update(['active'=>0]);
        return redirect()->action("ScoringTypeController@index");
    }
}
