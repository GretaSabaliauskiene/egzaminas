<?php

namespace App\Http\Controllers;

use App\Horses;
use Illuminate\Http\Request;

class HorsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horses.index', ['horses' => Horses::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $horses = new Horses();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $horses->fill($request->all());
        $horses->save();
        return redirect()->route('horses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function show(Horses $horses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function edit(Horses $horses)
    {
        return view('horses.edit', ['horses' => $horses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horses $horses)
    {
        $horses->fill($request->all());
        $horses->save();
        return redirect()->route('horses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horses  $horses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horses $horses)
    {
        $horses->delete();
        return redirect()->route('horses.index');
    }
}
