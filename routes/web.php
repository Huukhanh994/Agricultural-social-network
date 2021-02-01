<?php

use Illuminate\Support\Facades\Route;

require 'admin.php';
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
Route::get('/auth/redirect/{provider}','Site\SocialController@redirect');
Route::get('/callback/{provider}','Site\SocialController@callback');

Route::get('/', 'Site\PostsController@index')->name('site.pages.home');
Route::get('/products', 'Site\ProductController@index')->name('site.products.index');
Route::group(['middleware' => ['auth']], function () {
    // Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/{id}','Site\OrderController@index')->name('site.orders.index');
        Route::post('/store','Site\OrderController@store')->name('site.orders.store');
        Route::get('checkout/payment/complete', 'Site\OrderController@complete')->name('checkout.payment.complete');
    });
    // Role and permission
    Route::resource('roles', 'Site\RoleController');
    Route::resource('users', 'Site\UserController');
    Route::resource('admins', 'Site\AdminController');
    Route::post('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');
    Route::get('/checkout/product/payment/complete', 'Site\CheckoutController@complete')->name('checkout.product.payment.complete');
    Route::get('/checkoutVnPay','Site\CheckoutController@checkoutVnPay')->name('site.checkout.vnpay');
    Route::post('/vnPayPost','Site\CheckoutController@vnPayPost')->name('site.checkout.vnPayPost');
    Route::get('/checkout/return-vnpay','Site\CheckoutController@return')->name('site.checkout.return');
    // PROFILE
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'Site\ProfileController@index')->name('site.profile.index');
        Route::get('/{id}/show', 'Site\ProfileController@show')->name('site.profile.show');
        Route::get('/login', 'Site\LoginController@showLogin')->name('site.login.showLogin');
        Route::post('/storeLogin', 'Site\LoginController@storeLogin')->name('site.login.storeLogin');
        Route::get('/register', 'Site\LoginController@showRegister')->name('site.register.showRegister');
        Route::post('/storeRegister', 'Site\LoginController@storeRegister')->name('site.register.storeRegister');
        Route::get('/logout', 'Site\LoginController@logout')->name('site.logout');
        Route::post('/{id}/upload', 'Site\ProfileController@uploadImage')->name('site.profile.upload.image');
        Route::post('/follow', 'Site\FriendController@follow')->name('site.profile.follow');
        Route::post('/unFollow', 'Site\FriendController@unFollow')->name('site.profile.unFollow');
    });
    // ACCOUNT
    Route::group(['prefix' => 'accounts'], function () {
        Route::get('/', 'Site\AccountController@index')->name('site.accounts.index');
        Route::post('/update/{user_id}', 'Site\AccountController@update')->name('site.accounts.update');
        Route::get('account/orders', 'Site\AccountController@getOrders')->name('site.account.orders');
        Route::get('/{orderNumber}/showOrder','Site\AccountController@showOrder')->name('site.accounts.showOrder');
    });
    // FRIEND
    Route::group(['prefix' => 'friends'], function () {
        Route::get('/', 'Site\FriendController@index')->name('site.friends.index');
        Route::get('/groupFriends', 'Site\FriendController@showGroupFriends')->name('site.friends.group_friends');
        Route::get('/{id}/show','Site\FriendController@show')->name('site.friends.show');
        Route::post('/block','Site\FriendController@block')->name('site.friends.block');
        Route::post('/unBlock', 'Site\FriendController@unBlock')->name('site.friends.unBlock');
    });
    Route::group(['prefix' => 'relationship'], function () {
        Route::post('/ajaxFriend', 'Site\RelationshipController@ajaxFriend')->name('site.relationship.ajaxFriend');
        Route::post('/ajaxSendRequestFriend', 'Site\RelationshipController@ajaxSendRequestFriend')->name('site.relationship.ajaxFriend');
    });

    Route::group(['prefix' => 'experience_farms'], function () {
        Route::get('/', 'Site\ExperienceFarmController@index')->name('site.experience_farms.index');
        Route::get('/crops', 'Site\ExperienceFarmController@cropsIndex')->name('site.experience_farms.crops.index');
        Route::get('/animals', 'Site\ExperienceFarmController@animalsIndex')->name('site.experience_farms.animals.index');
        Route::post('/store', 'Site\ExperienceFarmController@store')->name('site.experience_farms.store');
        Route::get('/{id}/edit', 'Site\ExperienceFarmController@edit')->name('site.experience_farms.edit');
        Route::post('/{id}/update', 'Site\ExperienceFarmController@update')->name('site.experience_farms.update');
        Route::get('/{id}/delete', 'Site\ExperienceFarmController@destroy')->name('site.experience_farms.delete');
        Route::get('/addCalendar', 'Site\ExperienceFarmController@addCalendar')->name('site.experience_farms.add_calendar');
        Route::get('/list', 'Site\ExperienceFarmController@list')->name('site.experience_farms.list');
        Route::post('/list/ajaxToggleLike', 'Site\ExperienceFarmController@ajaxToggleLike')->name('site.experience_farms.ajaxToggleLike');
        // Like
        Route::post('/like', 'Site\ExperienceFarmController@like')->name('site.experience_farms.like');
        // Dislike
        Route::post('/dislike', 'Site\ExperienceFarmController@dislike')->name('site.experience_farms.dislike');
        Route::get('/{id}/modify','Site\ExperienceFarmController@modify')->name('site.experience_farms.modify');
    });
    Route::post('ajaxRequestLike', 'Site\PostsController@ajaxRequestLike')->name('ajaxRequest');
    Route::post('ajaxRequestDisLike', 'Site\PostsController@ajaxRequestDisLike')->name('ajaxRequest');
    Route::group(['prefix' => 'posts'], function () {
        Route::post('/store', 'Site\PostsController@store')->name('site.posts.store');
        Route::get('/{id}/show', 'Site\PostsController@show')->name('site.posts.show');
        Route::get('/{slug}/post', 'Site\PostsController@showSlug')->name('site.posts.show_slug');
        Route::get('/{id}/delete', 'Site\PostsController@destroy')->name('site.posts.delete');
        Route::get('/{id}/edit', 'Site\PostsController@edit')->name('site.posts.edit');
        Route::post('/{id}/update', 'Site\PostsController@update')->name('site.posts.update');
        Route::post('/rating', 'Site\PostsController@rating')->name('site.posts.ratings');
        Route::get('/maps', 'Site\PostsController@maps')->name('site.posts.maps');
        // Like
        Route::post('/like', 'Site\PostsController@like')->name('site.posts.like');
        // Dislike
        Route::post('/dislike', 'Site\PostsController@dislike')->name('site.posts.dislike');
        Route::get('/create-summernote','Site\PostsController@indexSummernote')->name('site.posts.create-summernote');
        Route::post('/storeSummernote','Site\PostsController@storeSummernote')->name('site.posts.storeSummernote');
    });

    Route::group(['prefix' => 'comments'], function () {
        Route::get('/', 'Site\CommentsController@index')->name('site.comments.index');
        Route::post('/store', 'Site\CommentsController@store')->name('site.comments.store');
    });

    Route::get('/ajaxSearch', 'Site\RelationshipController@ajaxSearch')->name('site.search.ajax_search');

    Route::group(['prefix' => 'groups'], function () {
        Route::get('/', 'Site\GroupController@index')->name('site.groups.index');
        Route::post('/store', 'Site\GroupController@store')->name('site.groups.store');
        Route::post('/ajaxSendRequestGroup', 'Site\GroupController@ajaxSendRequestGroup')->name('site.groups.ajax_send_request_group');
        Route::get('/create', 'Site\GroupController@create')->name('site.groups.create');
        Route::get('/{id}/show', 'Site\GroupController@show')->name('site.groups.show');
        Route::get('/chat','Site\GroupController@chat')->name('site.groups.chat');
    });

    Route::get('/userView/{id}', 'Site\FriendController@getuserView')->name('user.view');

    Route::group(['prefix' => 'polls'], function () {
        Route::get('/','Site\PollManagerController@index')->name('site.polls.index');
        Route::get('/create', 'Site\PollManagerController@create')->name('site.polls.create');
        Route::post('/store', 'Site\PollManagerController@store')->name('site.polls.store');
        Route::get('/edit/{poll}', 'Site\PollManagerController@edit')->name('site.polls.edit');
        Route::post('/update/{poll}', 'Site\PollManagerController@update')->name('site.polls.update');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/list', 'Site\ProductController@list')->name('site.products.list');
        Route::get('/{slug}/show', 'Site\ProductController@show')->name('site.products.show');
        Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
        Route::post('/rating', 'Site\ProductController@rating')->name('site.products.rating');
    });

    Route::get('/cart','Site\CartController@getCart')->name('checkout.cart');
    Route::get('/cart/item/{id}/remove', 'Site\CartController@removeItem')->name('checkout.cart.remove');
    Route::get('/cart/clear', 'Site\CartController@clearCart')->name('checkout.cart.clear');
    Route::post('/cart/addCouponRequest', 'Site\CartController@addCoupon');

    Route::group(['prefix' => 'saves'], function () {
        Route::get('/','Site\SaveController@index')->name('site.saves.index');
        Route::post('/store','Site\SaveController@store')->name('site.saves.store');
        Route::post('/{id}/destroy','Site\SaveController@destroy')->name('site.saves.destroy');
    });

    Route::group(['prefix' => 'events'], function () {
        // Route::get('/','Site\EventController@index')->name('site.events.index');
        Route::get('/','Site\EventController@index')->name('site.events.index');
        Route::post('/addEvents','Site\EventController@addEvents')->name('site.events.addEvent');
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/','Site\PageController@index')->name('site.pages.index');
    });

    Route::group(['prefix' => 'weathers'], function () {
        Route::get('/','Site\WeatherController@index')->name('site.weathers.index');
    });
// end Auth
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
