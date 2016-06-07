<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\master_merk;
use App\jenis;
use App\product;
use Illuminate\Support\Facades\Input;


class ProductController extends Controller
{
       public function CVT()
    {
         $data = array('data'=>product::where('jenis', '=', 'CVT')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'CVT')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }

      public function SPB()
    {
         $data = array('data'=>product::where('jenis', '=', 'SPB')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Supply Bahan Bakar')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }

      public function BBU()
    {
         $data = array('data'=>product::where('jenis', '=', 'BBU')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Blok Bore Up')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
   

     public function KPL()
    {
         $data = array('data'=>product::where('jenis', '=', 'KPL')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Kopling')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
      public function KNP()
    {
         $data = array('data'=>product::where('jenis', '=', 'KNP')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Knalpot')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
      public function AKM()
    {
         $data = array('data'=>product::where('jenis', '=', 'AKM')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Aksesoris Mesin')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
      public function CCS()
    {
         $data = array('data'=>product::where('jenis', '=', 'CCS')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Crankcase')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
        public function PDG()
    {
         $data = array('data'=>product::where('jenis', '=', 'PDG')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Pendingin')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }

         public function GER()
    {
         $data = array('data'=>product::where('jenis', '=', 'GER')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Gear')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }

         public function VRA()
    {
         $data = array('data'=>product::where('jenis', '=', 'VRA')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Velg Racing')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
         public function VRU()
    {
         $data = array('data'=>product::where('jenis', '=', 'VRU')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Velg Ruji')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
         public function SAR()
    {
         $data = array('data'=>product::where('jenis', '=', 'SAR')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Swing Arm')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
         public function RTI()
    {
         $data = array('data'=>product::where('jenis', '=', 'RTI')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Rantai')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
 
         public function AKR()
    {
         $data = array('data'=>product::where('jenis', '=', 'AKR')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Aksesoris Roda')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }

         public function BAN()
    {
         $data = array('data'=>product::where('jenis', '=', 'BAN')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Ban')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }


         public function VGL()
    {
         $data = array('data'=>product::where('jenis', '=', 'VGL')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Vgrill')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
        public function SRE()
    {
         $data = array('data'=>product::where('jenis', '=', 'SRE')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Short Rear')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }
        public function CTE()
    {
         $data = array('data'=>product::where('jenis', '=', 'CTE')->orderBy('id','desc')->paginate(9));
         $master_jenis = \App\master_jenis::with('jeniss')->get();
         $data3 = array('data3'=>master_merk::all());
         $data4 = array('data4'=>jenis::where('name', '=', 'Cover Tengki')->get());
         $data5 = array('data5'=>jenis::all());
        return view('ui.product.product')->with('master_jeniss',$master_jenis)->with($data)->with($data3)->with($data4)->with($data5);
    }


}
