<?php

namespace App\Http\Controllers;

use App\Betters;
use Illuminate\Http\Request;

class BettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('betters.index', ['betters' => Betters::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = \App\Horses::orderBy('name')->get();
        return view('betters.create', ['horses' => $horses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $better = new Betters();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $better->fill($request->all());
        $better->save();
        return redirect()->route('betters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function show(Betters $betters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function edit(Betters $betters)
    {
        $betters = \App\Betters::orderBy('name')->get();
        return view('betters.edit', ['betters' => $betters, 'betters' => $betters]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Betters $betters)
    {
        $betters->fill($request->all());
        $betters->save();
        return redirect()->route('betters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Betters  $betters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Betters $betters)
    {
        $betters->delete();
        return redirect()->route('betters.index');
    }
}
