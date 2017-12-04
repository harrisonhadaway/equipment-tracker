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
        $storage = Storage::disk('s3');
        $file = Storage::url('placeholder.jpg');

        
        
        $user = \Auth::User()->id;
        $equipment = \App\Equipment::where('owner_id', '=', $user)->get()->sortbydesc('created_at');

        foreach ($equipment as $machine) {

            $log = \App\Maintenance_logs::where('equipment_id', '=', $machine->id)->get()->sortbydesc('created_at')->first(); 
            
            if($log == null) {
                $machine->last_update = $machine->updated_at;
            } else $machine->last_update = $log->created_at;
            
        }
        
         return view('list', compact('equipment', 'file'));
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

    public function photoupload(Request $request)
    {
        $file = Input::file('fileToUpload');
        
        
        Storage::disk('s3')->put('/equipmenttrackerf17/' . 'testing2', file_get_contents($file));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!$request->hasFile('file'))
            return Response::json(['error' => 'No File Sent']);
     
        if(!$request->file('file')->isValid())
            return Response::json(['error' => 'File is not valid']);
     
        $file = $request->file('file');
     
        $v = Validator::make(
            $request->all(),
            ['file' => 'required|max:8000']
        );
     
        if($v->fails())
            return Response::json(['error' => $v->errors()]);
     
        // Resize photos???
        // Thumbnails??

        //input a row into the database to track the image (if needed)
            // save $equipment->image = s3 url       

        $ext = Input::file('file')->getClientOriginalExtension();
        //Use some method to generate your filename here. Here we are just using the ID of the image
        $filename = $request->year . rand(0,99) . \Auth::user()->id . '.' . $ext;
     
        $s3url = 'https://s3.us-east-2.amazonaws.com/equipmenttrackerf17/uploads/' . $filename;
        //Push file to S3
        Storage::disk('s3')->put('/uploads/' . $filename, file_get_contents($file));
        
     
        //Use this line to move the file to local storage & make any thumbnails you might want
        //$request->file('file')->move('/full/path/to/uploads', $filename);
     
        //Thumbnail as needed here. Then use method shown above to push thumbnails to S3
     
        //If making thumbnails uncomment these to remove the local copy.
        //if(Storage::disk('s3')->exists('uploads/' . $filename))
            //Storage::disk()->delete('uploads/' . $filename);
     
        //If we are still here we are good to go.
        // return Response::json(['OK' => 1]);

        
        
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

        if ($equipment->owner_id == \Auth::user()->id) {
            return view('profile', compact('equipment', 'maintenance_logs', 'total_cost', 'favorite_class', 'hours_select','miles_select', 'last_update'));
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
        //
    }


    public function storeimg(Gallery $gallery, Request $request)
    {
        if(!$request->hasFile('file'))
            return Response::json(['error' => 'No File Sent']);
     
        if(!$request->file('file')->isValid())
            return Response::json(['error' => 'File is not valid']);
     
        $file = $request->file('file');
     
        $v = Validator::make(
            $request->all(),
            ['file' => 'required|mimes:jpeg,jpg|max:8000']
        );
     
        if($v->fails())
            return Response::json(['error' => $v->errors()]);
     
        //input a row into the database to track the image (if needed)
        $image = $gallery->images()->create([
            'id' => null,
            'ext' => $request->file('file')->guessExtension()
        ]);
            
        //Use some method to generate your filename here. Here we are just using the ID of the image
        $filename = $image->id . '.' . $image->ext;
     
        //Push file to S3
        Storage::disk('s3')->put('uploads/' . $filename, file_get_contents($file));
     
        //Use this line to move the file to local storage & make any thumbnails you might want
        //$request->file('file')->move('/full/path/to/uploads', $filename);
     
        //Thumbnail as needed here. Then use method shown above to push thumbnails to S3
     
        //If making thumbnails uncomment these to remove the local copy.
        //if(Storage::disk('s3')->exists('uploads/' . $filename))
            //Storage::disk()->delete('uploads/' . $filename);
     
        //If we are still here we are good to go.
        return Response::json(['OK' => 1]);
    }
}
