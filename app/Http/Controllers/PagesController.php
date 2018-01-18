<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


	 protected $request;


	 function __construct()
	 {

	 }








	 /**
		* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		*/
		function index(){

		 $name = 'julian borzani';
		 return view('inicio',compact('name'));

		}




	 function contact(){

			$name = 'julian borzani';
			return view('contacto',compact('name'));

	 }



	 function saludo($saludos = ""){


			$data = ['Motorola','iphone','Galaxy'];
			$data = [];
			return view('saludo',compact('data','saludos'));

	 }





	 function mensaje(Request $request){


			 return $request->all();
	 }

}
