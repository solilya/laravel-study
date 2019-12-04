<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
    
	public function home()
	{
	  return view('home')->with('word','welcome to home');
	}


	public function process(Request $request)
	{
	
		
	
		$name=$request->input('name','not provided');
		$number=$request->input('number','not provided');

		$rules=['name' => 'required|max:5',
		        'number' => 'integer|max:23646'];

		$messages= [
		    'name.required' => 'Поле имя обязательно',
		    'number.integer'  => 'Поле должно быть числом'
		  ];

		$request->session()->flash('status', 'Отправлен запрос!');

		$validator = Validator::make($request->all(), $rules, $messages);
		 
		if ($validator->fails())
		{
		        return redirect()->back()->withErrors($validator->errors());
		}
		
		\Session::flash('flash message', 'Форма отправлена!');
#	$this->validate($request, [ 'name' => 'required|max:5','number' => 'integer|max:100203']);

		return view('process')->with(['name'=>$name,'number'=>$number]);
	}




}
