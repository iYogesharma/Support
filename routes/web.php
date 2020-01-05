<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'/ticket','middleware'=>'auth'],function(){
    Route::get('/create',['uses'=>'TicketController@create','as'=>'ticket.create']);
    Route::get('/{id}',['uses'=>'TicketController@details','as'=>'ticket.details']);
    Route::get('/close/{id}',['uses'=>'TicketController@close','as'=>'ticket.close']);
    Route::post('/',['uses'=>'TicketController@store','as'=>'ticket.store']);
    Route::put('/{id}',['uses'=>'TicketController@reply','as'=>'ticket.reply']);
});
