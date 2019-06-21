<?php

namespace App\Http\Controllers;

use App\PsychoTest;
use Illuminate\Http\Request;

class PsychoTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'test'=>PsychoTest::all(),
        ];
        return view('admin.psyTest.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'type'=>'create'
        ];
        return view('admin.psyTest.manage',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PsychoTest::create($request->all());
        return redirect()->action('PsychoTestController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PsychoTest  $psychoTest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[
            'test'=>PsychoTest::find($id),
        ];
        return view('admin.psyTest.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PsychoTest  $psychoTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[
            'type'=>'update',
            'test'=>PsychoTest::find($id),
        ];
        return view('admin.psyTest.manage',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PsychoTest  $psychoTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PsychoTest::find($id)->update($request->all());
        return redirect()->action('PsychoTestController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PsychoTest  $psychoTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PsychoTest::destroy($id);
        return redirect()->action('PsychoTestController@index');
    }
}
