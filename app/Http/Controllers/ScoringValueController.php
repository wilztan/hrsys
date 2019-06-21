<?php

namespace App\Http\Controllers;

use App\ScoringValue;
use Illuminate\Http\Request;

class ScoringValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function create_value($type_id){
        $data=[
            'type_id'=>$type_id,
            'type'=>'create',
        ];
        return view('admin.config.manage_value',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ScoringValue::create($request->all());
        return redirect()->action('ScoringTypeController@show',$request->type_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoringValue  $scoringValue
     * @return \Illuminate\Http\Response
     */
    public function show(ScoringValue $scoringValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoringValue  $scoringValue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'type'=>'update',
            'scoring'=>ScoringValue::where('id','=',$id)->first()
        ];
        return view('admin.config.manage_value',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoringValue  $scoringValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ScoringValue::where('id','=',$id)->update($request->except(['_method','_token']));
        return redirect()->action('ScoringTypeController@show',$request->type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoringValue  $scoringValue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $value = ScoringValue::where('id','=',$id)->first();
        ScoringValue::destroy($id);
        return redirect()->action('ScoringTypeController@show',$value->type_id);

    }
}
