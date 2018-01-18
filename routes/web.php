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


Route::get('jobs',function(){


	 dispatch(new App\Jobs\SendEmail);

	 return 'Listo';

});

Route::get('test',function(){
	 $user = new App\User();
	 $user->name='admin';
	 $user->role='1';
	 $user->email = 'admin@admin.com';
	 $user->password = bcrypt('123123');
	 $user->save();

	 return $user;

});
DB::listen(function($query){
//echo "<pre>{$query->sql}</pre>	";

});

Route::get('roles', function(){
	 return \App\Role::with('user')->get();

});


Route::get('/',['as'=>'home', 'uses'=>'PagesController@index']);

Route::get('/contactar/{name?}',['as'=>'contacto', 'uses'=>'PagesController@contact']);


Route::post('contacto', ['PagesController@mensaje']);

Route::get('login/facebook', ['as'=>'face','uses'=>'Auth\LoginController@redirectToProvider']);
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login','Auth\LoginController@showLoginForm');
Route::post('login',['as'=>'login','uses'=>'Auth\LoginController@login']);
Route::get('logout',['as'=>'salir','uses'=>'Auth\LoginController@logout'],function(){
	 return redirect()->route('incio');
});

Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');

/*Route::get('mensajes/create',['as'=>'messages.create', 'uses'=>'MessagesController@create']);
Route::post('mensajes',['as'=>'messages.store', 'uses'=>'MessagesController@store']);

Route::get('mensajes',['as'=>'messages.index', 'uses'=>'MessagesController@index']);

Route::get('mensajes/{id}',['as'=>'messages.show', 'uses'=>'MessagesController@show']);

Route::get('mensajes/{id}/edit',['as'=>'messages.edit', 'uses'=>'MessagesController@edit']);

Route::put('mensajes/{id}/update',['as'=>'messages.update', 'uses'=>'MessagesController@update']);

Route::delete('mensajes/{id}',['as'=>'messages.destroy', 'uses'=>'MessagesController@destroy']);*/


