<?php


Route::get('/test', function() {
	return Devmus\Model\User\Profile::find(1)->user;
});


Auth::routes();



/*Front End*/
Route::namespace('User')->group(function(){

	Route::get('/', 'HomeController@index')->name('home');


	// Profile
	Route::get('/dashboard', 'ProfileController@index')->name('user.dashboard');
	Route::post('/dashboard', 'ProfileController@update');
	Route::delete('/dashboard', 'ProfileController@destroy');


	// Blog

	Route::get('/blog', 'BlogController@list')->name('blog');
	
	Route::get('/{slug}', 'BlogController@post')->name('post');

	Route::get('/category/{category}', 'BlogController@category')->name('category');

	Route::get('/tag/{tag}', 'BlogController@tag')->name('tag');




});

Route::get('/custom', function(){
	return view('user.custom.list');
});




// middelware


/*Admin Route*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middelware' => 'auth:admin'], function(){


	// Route Login Admin
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');

	// Route login post 
	Route::post('login', 'Auth\LoginController@login');

	// Logout Admin 
	// Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

	/*Route Admin Dashboard*/
	Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');

	// Users Admin manage
	Route::resource('user', 'UserController');

	// Role Route
	Route::resource('role', 'RoleController');

	// Permission Route
	Route::resource('permission', 'PermissionController');


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
			// delete thumbnail post 
			Route::delete('/edit/{id}','PostController@deleteThumb')->name('deletethumb');

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

