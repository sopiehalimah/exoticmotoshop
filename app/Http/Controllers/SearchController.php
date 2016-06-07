<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\master_jenis;
use App\jenis;
use App\product;

use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
     public function search(Request $request)
    {

    	$query = $request->get('q');
    	$hasil = product::where('desc', 'LIKE', '%' . $query . '%')->paginate(12);
    	$master_jenis = \App\master_jenis::with('jeniss')->get();

    	return view('ui.search.result', compact('hasil', 'query'))->with('master_jeniss',$master_jenis);
    }
}
