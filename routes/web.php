<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/', 'EntryController@insert');

//$router->post('/', function (Request $request) {
//
//    $service = \App\Models\Service::where($request->only('key'))->first();
//
//    $data = $request->except('key');
//
//    \App\Models\Entry::create([
//        'service_id' => $service->id,
//        'data' => json_encode($data),
//    ]);
//
//    return ['success' => true, 'result' => 'Запись успешно добавлена'];
//});