<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\news;
use App\master_merk;
use App\master_jenis;
use App\jenis;
use App\product;

class AdminController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

   public function newsmodul()
   {
	   	$data = array('data'=>news::paginate(5));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
	   	return view('admin.news.modul')->with($data)->with('master_jeniss',$master_jenis);
   }
   public function savemodulnews()
   {
   		$news = new news;
       	$news->id_admin = 1;
   		$news->title = Input::get('title');
   		$news->content = Input::get('content');
   		$news->slug = str_slug(Input::get('title'));

   		if(Input::hasFile('image')){
   			$image = date('YmdHis')
   			.uniqid()
   			."."
   			.Input::file('image')->getClientOriginalExtension();

   			Input::file('image')->move(storage_path(),$image);
   			$news->image = $image;

   		}
   		$news->save();

   		return redirect()->back();

   }
   public function editmodulnews($id)
   {
   		$data = array('data'=>news::find($id));
         return view('admin.news.edit')->with($data);
   }
   public function updatemodulnews()
   {
   		$news = news::find(Input::get('id'));
   		$news->id_admin = 1;
   		$news->title = Input::get('title');
   		$news->content = Input::get('content');
   		$news->slug = str_slug(Input::get('title'));

   		if(Input::hasFile('image')){
   			$image = date('YmdHis')
   			.uniqid()
   			."."
   			.Input::file('image')->getClientOriginalExtension();

   			Input::file('image')->move(storage_path(),$image);
   			$news->image = $image;

   		}
   		$news->save();

   		return redirect(url('/news/modul'));
   }
   public function deletemodulnews($id)
   {
   		news::find($id)->delete();
         return redirect()->back();
   }


   //merk
   public function merkmodul()
   {
   		$data = array('data'=>master_merk::paginate(5));
	   	return view('admin.master_merk.modul')->with($data);
   }
   public function savemodulmerk()
   {
   		$merk = new master_merk;
   		$merk->code = Input::get('code');
   		$merk->merk = Input::get('merk');
   		$merk->save();

   		return redirect()->back();
	}

	 public function editmodulmerk($id)
   {
   		$data = array('data'=>master_merk::find($id));
         return view('admin.master_merk.edit')->with($data);
   }
   public function updatemodulmerk()
   {
   		$merk = master_merk::find(Input::get('id'));
   		$merk->code = Input::get('code');
   		$merk->merk = Input::get('merk');
   		$merk->save();

   		return redirect(url('/merk/modul'));
	}
	 public function deletemodulmerk($id)
   {
   		 master_merk::find($id)->delete();
		    return redirect()->back();
   }

   //master_jenis
   public function masterjenismodul()
   {
   		$data = array('data'=>master_jenis::paginate(5));
	   	return view('admin.master_jenis.modul')->with($data);
   }
   public function savemodulmasterjenis()
   {
   		$master_jenis = new master_jenis;
   		$master_jenis->code = Input::get('code');
   		$master_jenis->jenis = Input::get('jenis');
   		$master_jenis->save();

   		return redirect()->back();
	}

	 public function editmodulmasterjenis($id)
   {
   		$data = array('data'=>master_jenis::find($id));
         return view('admin.master_jenis.edit')->with($data);
   }
   public function updatemodulmasterjenis()
   {
   		$master_jenis = master_jenis::find(Input::get('id'));
   		$master_jenis->code = Input::get('code');
   		$master_jenis->jenis = Input::get('jenis');
   		$master_jenis->save();

   		return redirect(url('/masterjenis/modul'));
	}
	 public function deletemodulmasterjenis($id)
   {
   		 master_jenis::find($id)->delete();
		    return redirect()->back();
   }

      //jenis
   public function jenismodul()
   {
   		$master_jenis = master_jenis::all();
   		$data = array('data'=>jenis::paginate(5));
	   	return view('admin.jenis.modul')->with($data)->with('master_jeniss',$master_jenis);
   }
   public function savemoduljenis()
      {
      	$jenis = new jenis;
   		$jenis->code = Input::get('code');
   		$jenis->codejenis = Input::get('codejenis');
   		$jenis->name = Input::get('name');
   		$jenis->save();

   		return redirect()->back();
	}

	 public function editmoduljenis($id)
   {
         $master_jenis = master_jenis::all();
      	$data = array('data'=>jenis::find($id));

   		return view('admin.jenis.edit')->with($data)->with('master_jeniss',$master_jenis);;
   }
   public function updatemoduljenis()
   {
      	$jenis = jenis::find(Input::get('id'));
      	$jenis->code = Input::get('code');
   		$jenis->codejenis = Input::get('codejenis');
   		$jenis->name = Input::get('name');
   		$jenis->save();

   		return redirect(url('/jenis/modul'));
	}
	 public function deletemoduljenis($id)
   {
      	jenis::find($id)->delete();
   		return redirect()->back();
   }


      //product
   public function productmodul()
   {
         $master_jenis = master_jenis::all();
         $master_merk = master_merk::all();
         $jenis = jenis::all();
         $data = array('data'=>product::paginate(5));
         return view('admin.product.modul')->with('master_merks',$master_merk)->with('master_jeniss',$master_jenis)->with('jeniss',$jenis)->with($data);
   }
   public function savemodulproduct()
      {
         $product = new product;
         $product->code = Input::get('code');
         $product->codemerk = Input::get('codemerk');
         $product->codejenis = Input::get('codejenis');
         $product->jenis = Input::get('jenis');
         $product->desc = Input::get('desc');
         $product->price = Input::get('price');

         if(Input::hasFile('image1')){
            $image1 = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('image1')->getClientOriginalExtension();

            Input::file('image1')->move(storage_path(),$image1);
            $product->image1 = $image1;

         }

         $product->save();

         return redirect()->back();
         
   }

    public function editmodulproduct($id)
   {
         $master_jenis = master_jenis::all();
         $master_merk = master_merk::all();
         $jenis = jenis::all();
         $data = array('data'=>product::find($id));

         return view('admin.product.edit')->with('master_merks',$master_merk)->with('master_jeniss',$master_jenis)->with('jeniss',$jenis)->with($data);
   }
   public function updatemodulproduct()
   {
         $product = product::find(Input::get('id'));
         $product->code = Input::get('code');
         $product->codemerk = Input::get('codemerk');
         $product->codejenis = Input::get('codejenis');
         $product->jenis = Input::get('jenis');
         $product->desc = Input::get('desc');
         $product->price = Input::get('price');

          if(Input::hasFile('image1')){
                     $image1 = date('YmdHis')
                     .uniqid()
                     ."."
                     .Input::file('image1')->getClientOriginalExtension();

                     Input::file('image1')->move(storage_path(),$image1);
                     $product->image1 = $image1;

                  }
                  
         $product->save();

         return redirect(url('/product/modul'));
   }
    public function deletemodulproduct($id)
   {
         product::find($id)->delete();
         return redirect()->back();
   }


}

