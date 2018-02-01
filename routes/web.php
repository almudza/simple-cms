<?php

/*Front End*/
Route::namespace('User')->group(function(){

	Route::get('/', 'HomeController@index');

	Route::get('/blog', 'BlogController@list')->name('blog');
	
	Route::get('/{slug}', 'BlogController@post')->name('post');


});

Route::get('/custom', function(){
	return view('user.custom.list');
});




// middelware

Route::group(['middelware'=> ['web']], function() {

	/*Admin Route*/
	Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){


		/*Route Admin Dashboard*/
		Route::get('/dashboard','DashboardController@index');

		/*Route Blog*/
		Route::group(['namespace' => 'Blog','prefix' => 'blog'], function(){
				
			/*Post Prefix Route*/
			Route::prefix('post')->group(function(){

				// permanent delete
				Route::get('/kill/{id}','PostController@kill')->name('post.kill');
				// showTrash
				Route::get('/show_trashed','PostController@showTrash')->name('post.showTrash');
				// Restored trash
				Route::get('/restore/{id}','PostController@restore')->name('post.restore');
				// doftDelete
				Route::get('/trash{id}', 'PostController@trash')->name('post.trash');

				// Update 
				Route::post('/update/{id}', [
					'uses' => 'PostController@update',
					'as' => 'post.update'
				]);

				// edit 
				Route::get('/edit/{id}','PostController@edit')->name('post.edit');

				Route::post('/create','PostController@store')->name('post.store');
				Route::get('/create', 'PostController@create')->name('post.create');
				Route::get('/', 'PostController@index')->name('post.index');

			
			});

			/*route Category*/
			Route::resource('/category', 'CategoryController');


			/*Route Tag*/
			Route::resource('/tag','TagController');

		});

	});

});
