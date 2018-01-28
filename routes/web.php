<?php

/*
 * +--------+----------+----------+------+----------------------------------------------+--------------+
 * | Domain | Method   | URI      | Name | Action                                       | Middleware   |
 * +--------+----------+----------+------+----------------------------------------------+--------------+
 * |        | GET|HEAD | /        |      | App\Http\Controllers\IndexController@index   | web          |
 * |        | GET|HEAD | api/user |      | Closure                                      | api,auth:api |
 * |        | POST     | incident |      | App\Http\Controllers\IndexController@setFlag | web          |
 * |        | DELETE   | incident |      | App\Http\Controllers\IndexController@remFlag | web          |
 * |        | GET|HEAD | mailable |      | Closure                                      | web          |
 * +--------+----------+----------+------+----------------------------------------------+--------------+
 */

Route::get('/', 'IndexController@index');
Route::post('/incident', 'IndexController@setFlag');
Route::delete('/incident', 'IndexController@remFlag');


Route::get('/mailable', function () {

    $data = DB::table('devices')
        ->where('id', 1)
        ->first();

    $evaluation = [0, 1 ];
    $incidents[sizeof($evaluation)] = null;

    for ($i = 0; $i < sizeof($evaluation); $i++) {
        if ($evaluation[$i] == 1) {
            $incidents[$i] = DB::table('incidents')->where('id', $i + 1)->pluck('incidentDescription');
        }
    }
    $data->incidents = $incidents;

    return new App\Mail\IncidentCreated($data);
});