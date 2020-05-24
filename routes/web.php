<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('get',function(){
// 	echo 'day la get';
// 	echo '<form action="put-method" method="post">';
// 	echo csrf_field();
// 	echo '<input type="hidden" name="_method" value="put">';
// 	echo '<button type="submit">click</button>';		
// 	echo '</form>';
// });
// Route::post('post',function(){
// 	echo 'day la post';
// });
// Route::put('put-method',function(){
// 	echo 'day la put';
// });
// Route::delete('delete-method',function(){
// 	echo 'day la delete';
// });
// Route::patch('patch-method',function(){
// 	echo 'day la patch';
// });
Route::get('/abc', function () {
    return view('welcome');
});
Route::get('/get',function(){
	return view('welcome2');
});
Route::get('/get/1',function(){
	
	 return 'user';
})->name('get.post');

Route::get('/user/{id}/post/{post_id}',function($id,$post_id){
	return 'bai viet so '.$post_id.' va tac gia co so id la :'.$id;
})->name('user.post');

Route::post('/update', function () {
	echo 'sdsd';
	$data= $_POST;
	print_r($data);
    // return redirect('/get');
});

Route::get('/user/{id?}',function($id=null){
	$url = route('get.post');
	$url1= route('user.post',[
		'id' => 1,
		'post_id'=>2
	]);
	dd($url1);
	if ($id == null) {
		return 'list user';
	}
	return 'user'.$id;
});

Route::prefix('admin')->group(function(){
	Route::prefix('user')->group(function(){
		Route::get('/',function(){
			dd('admin.user.index');
		});
		Route::get('/blog',function(){
			echo 'day la blog';
		});
		Route::get('/content',function(){
			echo 'day la content';
		});

	});
	Route::get('post',function(){
		echo 'sdsd';
		

	});
});



