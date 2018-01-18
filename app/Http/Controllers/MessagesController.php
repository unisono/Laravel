<?php

namespace App\Http\Controllers;

use App\Events\Event;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Cache;
class MessagesController extends Controller
{



	 function __construct()
	 {
			$this->middleware('auth',['except'=> ['create','store','update'] ]);

	 }








	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			 //$messages  = DB::table('messages')->get();
			 //$messages = Message::pagination(10); //Muy lento !!!


			$key = "messages.page.".request('page',1);


			$messages = Cache::tags('messages')->rememberForever($key,function(){
				return Message::with(['user'])->latest()->paginate(10);
			});

			/* $cache = (Cache::has($key)) ? true : false;

			 if($cache){
			 	 $messages = Cache::get($key);

			 }else{

					$messages = Message::with(['user'])->latest()->paginate(10);

					Cache::put($key,$messages,5);
			 }

        */
			 return view('messages.index' , compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	/* DB::table('messages')->insert([
    	 'nombre'=>		$request->input('nombre'),
					 'email'=>		$request->input('email'),
					 'texto'=>		$request->input('mensaje'),
					 'created_at'=> Carbon::now(),
					 'updated_at'=> Carbon::now()
			 ]);*/


    	$message =  Message::create($request->all());

			 event(new Event($message));
    	 Cache::tags('messages')->flush();

        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

			 //$menssage =  DB::table('messages')->where('id',$id)->first();
			 $menssage = Message::findOrFail($id);

			 return view('messages.show', compact('menssage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

			 //$message =  DB::table('messages')->where('id',$id)->first();
			 $message = Message::findOrFail($id);

        return view('messages.edit',compact('message'));
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
//        DB::table('messages')->where('id',$id)->update([
//
//						'nombre'=>		$request->input('nombre'),
//						'email'=>		$request->input('email'),
//						'texto'=>		$request->input('mensaje'),
//						'updated_at'=> Carbon::now()
//
//				]);

			 Message::findOrFail($id)->update($request->all());
			 Cache::tags('messages')->flush();

        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			 //DB::table('messages')->where('id',$id)->delete();

			 Message::findOrFail($id)->delete();
			 Cache::tags('messages')->flush();
			 return redirect()->route('mensajes.index');
    }
}
