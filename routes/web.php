<?php

/*
+--------+----------+----------+------+----------------------------------------------+--------------+
| Domain | Method   | URI      | Name | Action                                       | Middleware   |
+--------+----------+----------+------+----------------------------------------------+--------------+
|        | GET|HEAD | /        |      | App\Http\Controllers\IndexController@index   | web          |
|        | GET|HEAD | api/user |      | Closure                                      | api,auth:api |
|        | POST     | incident |      | App\Http\Controllers\IndexController@setFlag | web          |
|        | DELETE   | incident |      | App\Http\Controllers\IndexController@remFlag | web          |
+--------+----------+----------+------+----------------------------------------------+--------------+
 */

Route::get('/', 'IndexController@index');
Route::post('/incident', 'IndexController@setFlag');
Route::delete('/incident', 'IndexController@remFlag');
