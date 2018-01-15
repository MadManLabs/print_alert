<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){

        $devices = DB::table('devices')->get();

        $messages = DB::table('incidents')->where('displayMessage','=',1)->get();

        $data = array(
            'devices'  => $devices,
            'messages' => $messages
        );

        return \View::make('index')->with($data);
    }

    public function submit(Request $request){
        $validatedData = $request->validate([
            'evaluation' => 'required',
            'optionalText' => 'max:255',
        ]);

        if($validatedData===false){
            return response('Error', 500);
        }

        $optionalText = $request->input('optionalText');

        /*
         * TODO:
         * - Email?
         * - DB-Insert?
         * - Wünsche?
         * - ...
         */

        return response('',200);


    }

}
