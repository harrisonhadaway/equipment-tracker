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
        $user = \Auth::User()->id;
        $equipment = \App\Equipment::where('owner_id', '=', $user)->get();
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
        return view('/home');
    }

    public function newrecord(Request $request)
    {
        $maintenance_logs = new \App\Maintenance_logs;

        $maintenance_logs->equipment_id = $request->input('equipment_id');
        $maintenance_logs->service_description = $request->input('service_description');
        $maintenance_logs->serviced_by = $request->input('serviced_by');
        $maintenance_logs->hours_at_service = $request->input('hours_at_service');
        $maintenance_logs->service_cost = $request->input('service_cost');
        $maintenance_logs->service_notes = $request->input('service_notes');
        $maintenance_logs->save();

        return redirect('/profile/' . $request->input('equipment_id'));
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
        $maintenance_logs = \App\Maintenance_logs::where('equipment_id', '=', $equipment->id)->get();
        $maintenance_logs = $maintenance_logs->sortbydesc('created_at');
        $total_cost = $maintenance_logs->sum('service_cost');
        return view('profile', compact('equipment', 'maintenance_logs', 'total_cost'));
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

        $equipment = \App\Equipment::find($id);
        $equipment->make = $request->input('make');
        $equipment->model = $request->input('model');
        $equipment->year = $request->input('year');
        $equipment->purchase_miles = $request->input('purchase_miles');
        $equipment->purchase_hours = $request->input('purchase_hours');
        $equipment->purchase_from = $request->input('purchase_from');
        $equipment->purchase_date = $request->input('purchase_date');
        $equipment->purchase_price = $request->input('purchase_price');
        $equipment->serial_number = $request->input('serial_number');
        $equipment->vin_number = $request->input('vin_number');
        $equipment->save();
        return redirect('/profile/' . $request->input('equipment_id'));
        
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
