<?php

namespace App\Http\Controllers;

use App\Mail\IncidentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {

        $devices = DB::table('devices')->get();

        $messages = DB::table('incidents')->where('displayMessage', '=', 1)->get();

        $data = array(
            'devices' => $devices,
            'messages' => $messages
        );

        return \View::make('index')->with($data);
    }

    public function setFlag(Request $request)
    {
        $validatedData = $request->validate([
            'evaluation' => 'required',
            'id' => 'required|numeric',
            'optionalText' => 'max:255',
        ]);

        if ($validatedData === false) {
            return response('Error', 500);
        }

        $optionalText = $request->input('optionalText');

        DB::table('devices')
            ->where('id', $request->input('id'))
            ->update(
                ['hasIncident' => 1],
                ['optionalText' => $optionalText]
                );
        /*
         * TODO:
         * - hue -> gruppe
         * - ...
         */
        // Collect data for mail
        $data = DB::table('devices')
                ->where('id', $request->input('id'))
                ->first();

        $incidents[sizeof($request->evaluation)] = null;

        for($i = 0; $i < sizeof($request->evaluation); $i++){
            $incidents[sizeof($request->evaluation)] = DB::table('incidents')->where('id',$request->evaluation+1)->pluck('incidentDescription');
        }
        $data->incidents = $incidents;

        Mail::to(env('MAIL_USERNAME'))
            ->send(new IncidentCreated($data));


        return response('', 200);
    }


    public function remFlag(Request $request)
    {
        $validation = $request->validate(
            [
                'id' => 'required|numeric',
            ]
        );

        if($validation === false){
            return response('Error', 500);
        }

        DB::table('devices')
            ->where('id', $request->input('id'))
            ->update(['hasIncident' => 0]);

        return response('', 200);

    }

}
