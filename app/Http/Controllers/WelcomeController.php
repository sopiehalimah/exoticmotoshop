<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\news;
use App\master_merk;
use App\master_jenis;
use App\jenis;
use App\product;
use App\response;
use App\order;
use Illuminate\Support\Facades\Input;


class WelcomeController extends Controller
{
    public function index()
    {
    	$data = array('data'=>news::orderBy('id','desc')->limit(4)->get());
    	$data1 = array('data1'=>product::orderBy('id','desc')->limit(3)->get());
    	$data2 = array('data2'=>master_merk::all());
        $data3 = array('data3'=>product::where('jenis', '=', 'KPL')->orderBy('id','desc')->get());
        $data4 = array('data4'=>product::where('jenis', '=', 'VGL')->orderBy('id','desc')->get());
    	$master_jenis = \App\master_jenis::with('jeniss')->get();
        $data5 = array('data5'=>jenis::all());
    	return view('welcome')->with($data)->with($data1)->with($data2)->with($data3)->with($data4)->with($data5)->with('master_jeniss',$master_jenis);
    }

    public function news()
    {
        $master_jenis = \App\master_jenis::with('jeniss')->get();
        $data = array('data'=>news::orderBy('id','desc')->paginate(9));
        $data1 = array('data1'=>news::orderBy('id','desc')->limit(3)->get());
        $data3 = array('data3'=>master_merk::all());
        return view('ui.news.news')->with($data)->with($data1)->with($data3)->with('master_jeniss',$master_jenis);
    }
    public function detailnews($slug)
    {
        $master_jenis = \App\master_jenis::with('jeniss')->get();
        $data = array('data'=>news::where('slug',$slug)->first());
        $data1 = array('data1'=>response::orderBy('id','desc')->paginate(5));
        $data2 = array('data2'=>news::orderBy('id','desc')->limit(3)->get());
        $data3 = array('data3'=>master_merk::all());
        return view('ui.news.detailnews')->with($data)->with($data1)->with($data2)->with($data3)->with('master_jeniss',$master_jenis);
    }

    public function detailproduct($id)
    {
    	
    	$data2 = array('data2'=>product::find($id));
    	return view('welcome')->with($data2);
    	
    }

     public function savecart(Request $r)
    {
        $key = count(session('cart'));
        $array  = session('cart');
        $array[$key+1]['id'] = Input::get('id');
        $array[$key+1]['codejenis'] = Input::get('codejenis');
        $array[$key+1]['codemerk'] = Input::get('codemerk');
        $array[$key+1]['codeproduct'] = Input::get('codeproduct');
        $array[$key+1]['jenis'] = Input::get('jenis');
        $array[$key+1]['desc']= Input::get('desc');
        $array[$key+1]['price'] = Input::get('price');
        $array[$key+1]['b'] = "1";
        $array[$key+1]['total'] = Input::get('total');
        $array[$key+1]['subtotal'] = Input::get('subtotal');
        $array[$key+1]['image1'] = Input::get('image1');
        $r->session()->put('cart',  $array);
        

        return redirect()->back();

        
    }
    
     public function updatecart(Request $r, $id){

        // $key = count(session('cart'));
        $array  = session('cart');
        $array[$id] = $r->$id;
        $array[$id]['id'] = Input::get('id');
        $array[$id]['codejenis'] = Input::get('codejenis');
        $array[$id]['codemerk'] = Input::get('codemerk');
        $array[$id]['codeproduct'] = Input::get('codeproduct');
        $array[$id]['jenis'] = Input::get('jenis');
        $array[$id]['desc']= Input::get('desc');
        $array[$id]['price'] = Input::get('price');
        $array[$id]['b'] = Input::get('b');
        $array[$id]['image1'] = Input::get('image1');
        $array[$id]['total'] = Input::get('total');
        $array[$id]['subtotal'] = Input::get('subtotal');

        $r->session()->put('cart',  $array);
        
            // $data = new cart;
            // $data->codejenis = Input::get('codejenis');
            // $data->jenis = Input::get('jenis');
            // $data->ket = Input::get('ket');
            // $data->harga = Input::get('harga');
            // $data->save();
        // return $cart;
        return redirect()->back();


     }

    public function cart()
    {
        $master_jenis = \App\master_jenis::with('jeniss')->get();

           
        $cart = session('cart');
// 
        // return $cart;
         return view('ui.cart.cart')->with('cart',$cart)->with('master_jeniss',$master_jenis);
    }
    public function checkout()
    {
       $master_jenis = \App\master_jenis::with('jeniss')->get();

           
        $cart = session('cart');
// 
        // return $cart;
         return view('ui.checkout.checkout')->with('cart',$cart)->with('master_jeniss',$master_jenis); 
    }

   public function savebilling(Request $r)
   {

        $order = new order;
        $order->first_name = Input::get('first_name');
        $order->last_name = Input::get('last_name');
        $order->email = Input::get('email');
        $order->phone = Input::get('phone');
        $order->address= Input::get('address');
        $order->country = Input::get('country');
        $order->city = Input::get('city');
        // $order->pay_method = Input::get('pay_method');

        $order->save();

        $cart = session('cart');

      if(count($cart)!=0)
      {
        foreach($cart as $key => $cart2){
          \App\cart::create(['codeproduct_'=>$r->input('code_').$cart[$key]['id'],
                             'codejenis_'=>$r->input('codejenis_').$cart[$key]['id'],
                             'jenis_'=>$r->input('jenis_').$cart[$key]['id'],
                             'desc_'=>$r->input('desc_').$cart[$key]['id'],
                             'price_'=>$r->input('price_').$cart[$key]['id'],
                             'b_'=>$r->input('b_').$cart[$key]['id'],
                             'image1_'=>$r->input('image1_').$cart[$key]['id'],
                             'id_order_'=>$r->input('id_order_').$cart[$key]['id'],
                             'subtotal_'=>$r->input('subtotal_').$cart[$key]['id'],
                             'total_'=>$r->input('total_').$cart[$key]['id']*$r->input('b_').$cart[$key]['id']]);
        }
        $r->session()->forget('cart');
      }

        return redirect()->back();
   }

}
