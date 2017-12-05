<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

use Validator;
class EquipmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::User()->id;
        $equipment = \App\Equipment::where('owner_id', '=', $user)->get()->sortbydesc('created_at');
        foreach ($equipment as $machine) {
            $log = \App\Maintenance_logs::where('equipment_id', '=', $machine->id)->get()->sortbydesc('created_at')->first(); 
            if($log == null) {
                $machine->last_update = $machine->updated_at;
            } else $machine->last_update = $log->created_at;
        }
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
        $s3url = '';
        if ($request->file('file') == !null) {
            $file = $request->file('file');
            // Resize photos???
            $ext = Input::file('file')->getClientOriginalExtension();
            $filename = $request->year . rand(0,99) . \Auth::user()->id . '.' . $ext;
            $s3url = 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/uploads/' . $filename;
            //Push file to S3
            Storage::disk('s3')->put('/uploads/' . $filename, file_get_contents($file));
        }
        $equipment = new \App\Equipment;
        $equipment->owner_id = \Auth::user()->id;
        $equipment->make = $request->input('make');
        $equipment->model = $request->input('model');
        $equipment->year = $request->input('year');
        $equipment->highlighted = false;
        $equipment->hours_or_miles = $request->input('hours_or_miles');
        $equipment->purchase_usage = $request->input('purchase_usage');
        $equipment->purchase_from = $request->input('purchase_from');
        $equipment->purchase_date = $request->input('purchase_date');
        $equipment->purchase_price = $request->input('purchase_price');
        $equipment->serial_number = $request->input('serial_number');
        $equipment->vin_number = $request->input('vin_number');
        $equipment->imageurl = $s3url;
        $equipment->save();
        return redirect('/home');
    }

    public function newrecord(Request $request)
    {
        
        $maintenance_logs = new \App\Maintenance_logs;
        $maintenance_logs->equipment_id = $request->input('equipment_id');
        $maintenance_logs->service_description = $request->input('service_description');
        $maintenance_logs->serviced_by = $request->input('serviced_by');
        $maintenance_logs->usage_at_service = $request->input('usage_at_service');
        $maintenance_logs->service_cost = $request->input('service_cost');
        $maintenance_logs->service_notes = $request->input('service_notes');
        $maintenance_logs->save();
        return redirect('/profile/' . $request->input('equipment_id'));
    }

    public function newfile(Request $request, $id)
    {
        $equipment_files = new \App\Equipment_files;
        if ($request->file('file') == !null) {
            $file = $request->file('file');
            // Resize photos???
            $ext = Input::file('file')->getClientOriginalExtension();
            $filename = rand(0,1000) . \Auth::user()->id . '.' . $ext;
            $s3url = 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/userfiles/' . $filename;
            //Push file to S3
            Storage::disk('s3')->put('/userfiles/' . $filename, file_get_contents($file));

            $equipment_files->fileurl = $s3url;
        }
        $equipment_files->equipment_id = $id;
        $equipment_files->user_id = \Auth::user()->id;
        $equipment_files->filename = $request->input('filename');
        $equipment_files->save();
        return redirect('/profile/' . $id);
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
        if($maintenance_logs->sortbydesc('created_at')->first() == !null) {
            $last_update = $maintenance_logs->sortbydesc('created_at')->first();
        } else $last_update = $equipment;
            if($equipment->highlighted) {
            $favorite_class = 'favorited';
            }       
            if(!$equipment->highlighted) {
            $favorite_class = '';
            }
            if($equipment->hours_or_miles == 'Hours') {
                $hours_select = "checked=''";
            } else $hours_select = "";
            if($equipment->hours_or_miles == 'Miles') {
                $miles_select = "checked=''";
            } else $miles_select = "";
 

        $files = \App\Equipment_files::where('equipment_id', '=', $equipment->id)->get();
            
        if ($equipment->owner_id == \Auth::user()->id) {
            return view('profile', compact('equipment', 'files', 'maintenance_logs', 'total_cost', 'favorite_class', 'hours_select','miles_select', 'last_update'));
        }
        return view('welcome');
    }

    public function showrecord($id, $recordId)
    {
        $equipment = \App\Equipment::find($id);
        $maintenance_logs = \App\Maintenance_logs::find($recordId);
        return $maintenance_logs;
    }

    public function favorite_equipment($id)
    {
        $equipment = \App\Equipment::find($id);
        $equipment->highlighted = !$equipment->highlighted;
        $equipment->save(); 
        if($equipment->highlighted) {
            $favorite_class = 'favorited';
        }       
        if(!$equipment->highlighted) {
            $favorite_class = '';
        }
        return redirect('/profile/' . $id);

    }
    public function favorites()
    {
        $user = \Auth::User()->id;
        $favorites = \App\Equipment::where('highlighted', '=', true)->where('owner_id', '=', $user)->get();

        foreach ($favorites as $machine) {
            $log = \App\Maintenance_logs::where('equipment_id', '=', $machine->id)->get()->sortbydesc('created_at')->first(); 
            if($machine->latestLog == null) {
                $machine->last_update = $machine->updated_at;
            } else $machine->last_update = $log->created_at;
        }
        return view('home', compact('favorites'));
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
        $s3url = '';
        if ($request->file('file') == !null) {
            $file = $request->file('file');
            $v = Validator::make(
                $request->all(),
                ['file' => 'required|max:8000']
            );
            $ext = Input::file('file')->getClientOriginalExtension();
            $filename = $request->year . rand(0,99) . \Auth::user()->id . '.' . $ext;
            $s3url = 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/uploads/' . $filename;
            Storage::disk('s3')->put('/uploads/' . $filename, file_get_contents($file));
            $equipment->imageurl = $s3url;
        }
        $equipment->make = $request->input('make');
        $equipment->model = $request->input('model');
        $equipment->year = $request->input('year');
        $equipment->hours_or_miles = $request->input('hours_or_miles');
        $equipment->purchase_usage = $request->input('purchase_usage');
        $equipment->purchase_from = $request->input('purchase_from');
        $equipment->purchase_date = $request->input('purchase_date');
        $equipment->purchase_price = $request->input('purchase_price');
        $equipment->serial_number = $request->input('serial_number');
        $equipment->vin_number = $request->input('vin_number');
        $equipment->save();
        return redirect('/profile/' . $request->input('equipment_id'));
    }

    public function update_log(Request $request)
    {
        $id = $request->input('maintenance_log_id');
        $maintenance_logs = \App\Maintenance_logs::find($id);
        $maintenance_logs->service_description = $request->input('service_description');
        $maintenance_logs->serviced_by = $request->input('serviced_by');
        $maintenance_logs->usage_at_service = $request->input('usage_at_service');
        $maintenance_logs->service_cost = $request->input('service_cost');
        $maintenance_logs->service_notes = $request->input('service_notes');
        $maintenance_logs->save();
        
        
        return redirect('/profile/' . $maintenance_logs->equipment_id); 

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hard delete function
        $equipment = \App\Equipment::find($id);
        $image = basename($equipment->imageurl);
        Storage::disk('s3')->delete('/uploads/' . $image);
        $logs = \App\Maintenance_logs::where('equipment_id', '=', $equipment->id)->delete();
        $equipment->delete();
        return redirect('/list');

    }

    public function destroyRecord($id)
    {
        $log = \App\Maintenance_logs::find($id);
        $id = $log->equipment_id;
        $log->delete();
        return redirect('/profile/' . $id);
    }


    
    
}
