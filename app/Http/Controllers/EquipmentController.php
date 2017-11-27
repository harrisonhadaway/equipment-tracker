<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = \App\Equipment::all();
        return view('list', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $equipment = new \App\Equipment;

        $equipment->owner_id = \Auth::user()->id;
        $equipment->make = $request->input('make');
        $equipment->model = $request->input('model');
        $equipment->year = $request->input('year');
        $equipment->highlighted = false;
        $equipment->purchase_miles = $request->input('purchase_miles');
        $equipment->purchase_hours = $request->input('purchase_hours');
        $equipment->purchase_from = $request->input('purchase_from');
        $equipment->purchase_date = $request->input('purchase_date');
        $equipment->purchase_price = $request->input('purchase_price');
        $equipment->serial_number = $request->input('serial_number');
        $equipment->vin_number = $request->input('vin_number');
        $equipment->save();
        return $equipment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = \App\Equipment::find($id);
        return view('profile', compact('equipment'));
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
