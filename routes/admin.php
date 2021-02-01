<?php

Route::group(['prefix'  =>  'admin'], function () {
    
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware(['guest'])->name('password.request');
    // Route::resource('products', 'Admin\ProductController');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/','Admin\PageController@dashboard')->name('admin.dashboard');

        Route::group(['prefix' => 'profiles'], function () {
            Route::get('/','Admin\ProfileController@index')->name('admin.profiles.index');
            Route::post('/{id}/update', 'Admin\ProfileController@update')->name('admin.profiles.update');
        });

        Route::group(['prefix' => 'accounts'], function () {
            Route::get('/','Admin\AccountSettingController@index')->name('admin.accounts.index');
        });

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::group(['prefix'  =>   'categories'], function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('/lists', 'Admin\CategoryController@lists')->name('admin.categories.lists');
            Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::get('/{id}/delete', 'Admin\CategoryController@destroy')->name('admin.categories.delete');
        });

        Route::group(['prefix' => 'foods'], function () {
            Route::get('/','Admin\FoodsController@index')->name('admin.foods.index');
            Route::post('/import','Admin\FoodsController@import')->name('admin.foods.import');
        });

        Route::group(['prefix' => 'insecticides'], function () {
            Route::get('/','Admin\InsecticidesController@index')->name('admin.insecticides.index');
            Route::post('/import', 'Admin\InsecticidesController@import')->name('admin.insecticides.import');
        });

        Route::group(['prefix' => 'manager_users'], function () {
            Route::get('/','Admin\ManagementUsersController@index')->name('admin.manager_users.index');
            Route::get('/{id}/edit','Admin\ManagementUsersController@edit')->name('admin.manager_users.edit');
            Route::post('/store','Admin\ManagementUsersController@store')->name('admin.manager_users.store');
            Route::post('/{id}/update','Admin\ManagementUsersController@update')->name('admin.manager_users.update');
            Route::get('/{id}/delete','Admin\ManagementUsersController@destroy')->name('admin.manager_users.delete');
            Route::post('/import','Admin\ManagementUsersController@import')->name('admin.manager_users.import');
        });

        Route::group(['prefix' => 'seasonals'], function () {
            Route::get('/', 'Admin\SeasonalController@index')->name('admin.seasonals.index');
            Route::get('/{id}/show', 'Admin\SeasonalController@show')->name('admin.seasonals.show');
            Route::get('/{id}/edit', 'Admin\SeasonalController@edit')->name('admin.seasonals.edit');
            Route::post('/store', 'Admin\SeasonalController@store')->name('admin.seasonals.store');
            Route::post('/{id}/update', 'Admin\SeasonalController@update')->name('admin.seasonals.update');
            Route::get('/{id}/delete', 'Admin\SeasonalController@destroy')->name('admin.seasonals.delete');
        });

        Route::group(['prefix' => 'managerPrice'], function () {
            Route::get('/','Admin\ManagementPriceController@index')->name('admin.managementPrice.index');
        });

        Route::group(['prefix' => 'managerRoles'], function () {
            Route::get('/', 'Admin\ManagementRoleController@index')->name('admin.managementRole.index');
        });

        Route::group(['prefix' => 'managerCropPlantAnimals'], function () {
            Route::get('/','Admin\ManagementCropPlantAnimalController@index')->name('admin.manager_crop_plant_animals.index');
            Route::post('/store', 'Admin\ManagementCropPlantAnimalController@store')->name('admin.manager_crop_plant_animals.store');
            Route::get('/{id}/edit', 'Admin\ManagementCropPlantAnimalController@edit')->name('admin.manager_crop_plant_animals.edit');
            Route::post('/{id}/update', 'Admin\ManagementCropPlantAnimalController@update')->name('admin.manager_crop_plant_animals.update');
            Route::get('/{id}/delete', 'Admin\ManagementCropPlantAnimalController@destroy')->name('admin.manager_crop_plant_animals.delete');
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/','Admin\PostsController@index')->name('admin.posts.index');
            Route::post('/store','Admin\PostsController@store')->name('admin.posts.store');
            Route::get('/{id}/show','Admin\PostsController@show')->name('admin.posts.show');
            Route::get('/map','Admin\PostsController@map')->name('admin.posts.map');
            Route::get('/{id}/edit','Admin\PostsController@edit')->name('admin.posts.edit');
            Route::post('/{id}/update','Admin\PostsController@update')->name('admin.posts.update');
            Route::get('/{id}/delete','Admin\PostsController@destroy')->name('admin.posts.delete');
            Route::get('image/{id}/delete','Admin\PostsController@destroyImage')->name('admin.posts.images.delete');
            Route::get('/{id}/accept', 'Admin\PostsController@accept')->name('admin.posts.accept');
            Route::get('/index/blockUsers', 'Admin\PostsController@indexBlockUsers')->name('admin.posts.indexBlockUsers');
            Route::post('/blockAjax','Admin\PostsController@blockAjax')->name('admin.posts.blockAjax');
            Route::post('/unblockAjax', 'Admin\PostsController@unblockAjax')->name('admin.posts.unblockAjax');
        });

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/','Admin\GroupController@index')->name('admin.groups.index');
            Route::post('/store','Admin\GroupController@store')->name('admin.groups.store');
            Route::get('/{id}/edit','Admin\GroupController@edit')->name('admin.groups.edit');
            Route::get('/{id}/show','Admin\GroupController@show')->name('admin.groups.show');
            Route::post('/{id}/update','Admin\GroupController@update')->name('admin.groups.update');
            Route::get('/{id}/delete','Admin\GroupController@destroy')->name('admin.groups.delete');
            Route::get('/{id}/accept','Admin\GroupController@accept')->name('admin.groups.accept');
            Route::post('/acceptAjax','Admin\GroupController@acceptAjax')->name('admin.groups.acceptAjax');
        });

        Route::group(['prefix' => 'polls'], function () {
            Route::get('/','Admin\PollManagerController@home')->name('admin.polls.home');
            Route::get('/index','Admin\PollManagerController@index')->name('admin.polls.index');
            Route::get('/create','Admin\PollManagerController@create')->name('admin.polls.create');
            Route::post('/store','Admin\PollManagerController@store')->name('admin.polls.store');
            Route::get('/edit/{poll}', 'Admin\PollManagerController@edit')->name('admin.polls.edit');
            Route::patch('/update/{poll}', 'Admin\PollManagerController@update')->name('admin.polls.update');
            Route::get('/admin/polls/{poll}/options/add', ['uses' => 'Admin\OptionManagerController@push', 'as' => 'admin.polls.options.push']);
            Route::post('/admin/polls/{poll}/options/add', ['uses' => 'Admin\OptionManagerController@add', 'as' => 'admin.polls.options.add']);
            Route::get('/admin/polls/{poll}/options/remove', ['uses' => 'Admin\OptionManagerController@delete', 'as' => 'admin.polls.options.remove']);
            Route::delete('/admin/polls/{poll}/options/remove', ['uses' => 'Admin\OptionManagerController@remove', 'as' => 'admin.polls.options.remove']);
            Route::delete('/admin/polls/{poll}', ['uses' => 'Admin\PollManagerController@remove', 'as' => 'admin.polls.remove']);
            Route::patch('/admin/polls/{poll}/lock', ['uses' => 'Admin\PollManagerController@lock', 'as' => 'admin.polls.lock']);
            Route::patch('/admin/polls/{poll}/unlock', ['uses' => 'Admin\PollManagerController@unlock', 'as' => 'admin.polls.unlock']);
        });

        Route::group(['prefix' => 'options'], function () {
            Route::get('/', 'Admin\OptionManagerController@index')->name('admin.options.index');
        });

        Route::group(['prefix' => 'votes'], function () {
            Route::get('/', 'Admin\VoteManagerController@index')->name('admin.votes.index');
        });

        Route::group(['prefix'  =>   'brands'], function () {
            Route::get('/', 'Admin\BrandController@index')->name('admin.brands.index');
            Route::get('/create', 'Admin\BrandController@create')->name('admin.brands.create');
            Route::post('/store', 'Admin\BrandController@store')->name('admin.brands.store');
            Route::get('/{id}/edit', 'Admin\BrandController@edit')->name('admin.brands.edit');
            Route::post('/update', 'Admin\BrandController@update')->name('admin.brands.update');
            Route::get('/{id}/delete', 'Admin\BrandController@delete')->name('admin.brands.delete');
        });

        Route::group(['prefix' => 'attributes'], function () {
            Route::get('/', 'Admin\AttributeController@index')->name('admin.attributes.index');
            Route::get('/create', 'Admin\AttributeController@create')->name('admin.attributes.create');
            Route::post('/store', 'Admin\AttributeController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributeController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributeController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributeController@delete')->name('admin.attributes.delete');
            // Vue
            Route::post('/get-values', 'Admin\AttributeValueController@getValues');
            Route::post('/add-values', 'Admin\AttributeValueController@addValues');
            Route::post('/update-values', 'Admin\AttributeValueController@updateValues');
            Route::post('/delete-values', 'Admin\AttributeValueController@deleteValues');
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
            Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
            Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
            Route::post('/attributes/store','Admin\ProductAttributeController@store')->name('admin.products.attributes.store');
            // Load attributes on the page load
            Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
            // Load product attributes on the page load
            Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
            // Load option values for a attribute
            Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
            // Add product attribute to the current product
            Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
            // Delete product attribute from the current product
            Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');
        });

        Route::group(['prefix' => 'orders'], function () {
            Route::get('/{order_number}/show', 'Admin\ManagerOrderController@show')->name('admin.orders.show');
            Route::get('/','Admin\ManagerOrderController@index')->name('admin.orders.index');
        });
        
        Route::group(['prefix' => 'districts'], function () {
            Route::get('/', 'Admin\DistrictController@index')->name('admin.districts.index');
            Route::get('/create', 'Admin\DistrictController@create')->name('admin.districts.create');
            Route::post('/store', 'Admin\DistrictController@store')->name('admin.districts.store');
            Route::get('/show','Admin\DistrictController@show')->name('admin.districts.show');
            Route::post('/import','Admin\DistrictController@import')->name('admin.districts.import');
        });
    });
    

    Route::group(['prefix' => 'cities'], function () {
        Route::get('/','Admin\CityController@index')->name('admin.cities.index');
        Route::post('/import','Admin\CityController@import')->name('admin.cities.import');
    });

    Route::group(['prefix' => 'wards'], function () {
        Route::get('/', 'Admin\WardController@index')->name('admin.wards.index');
        Route::post('/import', 'Admin\WardController@import')->name('admin.wards.import');
    });
});