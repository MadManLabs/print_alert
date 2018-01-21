<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->update(['hasIncident' => 1]);

        /*
         * TODO:
         * - Email?
         * - 
         * - Wünsche?
         * - hue -> gruppe
         * - ...
         */

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
