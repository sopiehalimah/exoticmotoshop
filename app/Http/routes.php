<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(Request $req){
	return session('cart');
});



Route::auth();

Route::get('/admin', 'HomeController@index');

Route::get('/news','WelcomeController@news');
Route::get('/detail/news/{slug}','WelcomeController@detailnews');

Route::get('/news/modul','AdminController@newsmodul');
Route::post('/savemodulnews','AdminController@savemodulnews');
Route::get('/edit/news/{id}','AdminController@editmodulnews');
Route::post('/updatemodulnews','AdminController@updatemodulnews');
Route::get('/delete/news/{id}','AdminController@deletemodulnews');
Route::get('/image/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});

Route::get('/merk/modul','AdminController@merkmodul');
Route::post('/savemodulmerk','AdminController@savemodulmerk');
Route::get('/edit/merk/{id}','AdminController@editmodulmerk');
Route::post('/updatemodulmerk','AdminController@updatemodulmerk');
Route::get('/delete/merk/{id}','AdminController@deletemodulmerk');


Route::get('/masterjenis/modul','AdminController@masterjenismodul');
Route::post('/savemodulmasterjenis','AdminController@savemodulmasterjenis');
Route::get('/edit/masterjenis/{id}','AdminController@editmodulmasterjenis');
Route::post('/updatemodulmasterjenis','AdminController@updatemodulmasterjenis');
Route::get('/delete/masterjenis/{id}','AdminController@deletemodulmasterjenis');


Route::get('/jenis/modul','AdminController@jenismodul');
Route::post('/savemoduljenis','AdminController@savemoduljenis');
Route::get('/edit/jenis/{id}','AdminController@editmoduljenis');
Route::post('/updatemoduljenis','AdminController@updatemoduljenis');
Route::get('/delete/jenis/{id}','AdminController@deletemoduljenis');


Route::get('/product/modul','AdminController@productmodul');
Route::post('/savemodulproduct','AdminController@savemodulproduct');
Route::get('/edit/product/{id}','AdminController@editmodulproduct');
Route::post('/updatemodulproduct','AdminController@updatemodulproduct');
Route::get('/delete/product/{id}','AdminController@deletemodulproduct');
Route::get('/detail/product/{id}', 'WelcomeController@detailproduct');

Route::get('/image1/{filename}',
	function ($filename)

	{
		$path = storage_path() . '/' . $filename;
		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("content-Type", $type);

		return $response;
	});

Route::get('/', 'WelcomeController@index');

Route::post('/savecart','WelcomeController@savecart');
Route::get('/cart','WelcomeController@cart');
Route::get('hapuscart/{id}', function(Request $r, $id){
	$array = session('cart');
	unset($array[$id]);
	session(['cart' => $array]);
	return redirect()->back();
});
Route::get('/hapuscart', function(Request $request){
return session()->forget('cart');
// return redirect(url('ui.cart'));
});
Route::post('updatecart/{id}', 'WelcomeController@updatecart');


Route::post('/response','ResponseController@save');


Route::get('query','SearchController@search');


Route::get('/checkout','WelcomeController@checkout');
Route::post('/savecheckout','WelcomeController@savecheckout');
Route::post('/savebilling','WelcomeController@savebilling');

//mesin
Route::get('CVT','ProductController@CVT');
Route::get('Supply Bahan Bakar','ProductController@SPB');
Route::get('Blok Bore Up','ProductController@BBU');
Route::get('Kopling','ProductController@KPL');
Route::get('Knalpot','ProductController@KNP');
Route::get('Aksesoris Mesin','ProductController@AKM');
Route::get('Crankcase','ProductController@CCS');
Route::get('Pendingin','ProductController@PDG');

//roda
Route::get('Gear','ProductController@GER');
Route::get('Velg Racing','ProductController@VRA');
Route::get('Velg Ruji','ProductController@VRU');
Route::get('Swing Arm','ProductController@SAR');
Route::get('Stabiliser Rantai','ProductController@SRA');
Route::get('Rantai','ProductController@RTI');
Route::get('Aksesoris Roda','ProductController@AKR');
Route::get('Ban','ProductController@BAN');

//body part
Route::get('Vgrill','ProductController@VGL');
Route::get('Short Rear','ProductController@SRE');
Route::get('Cover Tengki','ProductController@CTE');