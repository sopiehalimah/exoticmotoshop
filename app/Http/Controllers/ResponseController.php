<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\response;
use Illuminate\Support\Facades\Input;

class ResponseController extends Controller
{
    
     public function save()
    {
    	$data = new response;
    	$data->id_news = Input::get('id_news');
		$data->name = Input::get('name');
		$data->email = Input::get('email');
		$data->comment = Input::get('comment');


	
		$data->save();

		return redirect()->back();

    }
}
