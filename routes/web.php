<?php

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

//ADMIN 
Route::get('/adminRegister', function () {
    return view('adminRegister');
});
Route::post('/AddAdmin', array('uses'=>'Admin@adminregister'));

Route::get('/adminLogin', function () {
    return view('adminLogin');
});
Route::post('/login', array('uses'=>'Admin@adminlogin'));

Route::get('/adminHome', function () {
    return view('adminHome');
});

Route::get('/viewShops', function () {
    return view('viewShops');
});

Route::get('/viewShops', 'AdminFunctions@shopRegReq');

Route::get('/approveShop', 'AdminFunctions@appShop');
Route::get('/rejectShop', 'AdminFunctions@rejectShop');


Route::get('/viewUsers', function () {
    return view('viewUsers');
});
Route::get('/viewUsers', 'AdminFunctions@usersData');

Route::get('/adminLogout', 'Admin@adminLogout');

//CATEGORY
Route::get('/category', function () {
    return view('category');
});
Route::POST('/Addcat', array('uses'=>'AdminFunctions@addCategory'));
Route::get('/category', array('uses'=>'AdminFunctions@showCategory'));
Route::get('/delete/{delId}', 'AdminFunctions@deleteCategory');

//SUBCATEGORY
Route::get('/subcategory', function () {
    return view('subcategory');
});
Route::POST('/Addsubcat', array('uses'=>'AdminFunctions@addSubcategory'));
Route::get('/subcategory', array('uses'=>'AdminFunctions@showsubcategory'));
Route::get('/subdelete/{delId}', 'AdminFunctions@deleteSubcategory');

//STATES
Route::POST('/addstate', array('uses'=>'AdminFunctions@addState'));
Route::get('/states', array('uses'=>'AdminFunctions@showState'));
Route::get('/deleteState/{did}', 'AdminFunctions@deleteState');

//DISTRICTS
Route::POST('/AddDistrict', array('uses'=>'AdminFunctions@addDist'));
Route::get('/districts', array('uses'=>'AdminFunctions@showDistrict'));
Route::get('/deleteDistrict/{did}', 'AdminFunctions@deleteDistrict');

//PLACES
Route::POST('/AddPlace', array('uses'=>'AdminFunctions@addPlace'));
Route::get('/places', array('uses'=>'AdminFunctions@showPlace'));
Route::get('/deletePlace/{did}', 'AdminFunctions@deletePlace');





//SHOP
Route::get('/shopRegister', function () {
    return view('shopRegister');
});
Route::get('/shopRegister', 'ShopFunctions@showState');
Route::get('/api/get-districts', 'ShopFunctions@showDistrict');
Route::get('/api/get-places', 'ShopFunctions@showPlace');
Route::POST('/registerShop', array('uses'=>'ShopFunctions@shopRegister'));
//SHOPlOGIN
Route::get('/shopLogin', function () {
    return view('shopLogin');
});
Route::get('/shopHome', function(){
    return view('shopHome');
});
//LOGOUT
Route::get('/shopLogout', 'ShopFunctions@shopLogout');

Route::POST('/shopLoginCheck',array('uses'=>'ShopFunctions@shopLoginCheck'));
//ADD ITEM
Route::get('/addItem', function(){
    return view('addItem');
});
Route::get('/addItem','ShopFunctions@showCategory');
Route::get('/api/get-subCategory','ShopFunctions@showSubCategory');
//ITEM ADD
Route::POST('/itemToDB','ShopFunctions@itemToDB');
//VIEW ITEM
Route::get('/viewItem', function(){
    return view('viewItem');
});
Route::get('/viewItem','ShopFunctions@itemView');



//USER
Route::get('/userRegister', function () {
    return view('userRegister');
});
Route::get('/userRegister', 'userFunctions@showState');
Route::get('/user/get-districts', 'userFunctions@showDistrict');
Route::get('/user/get-places', 'userFunctions@showPlace');
Route::POST('/registerUser', array('uses'=>'userFunctions@userRegister'));
//USERLOGIN
Route::get('/userLogin', function () {
    return view('userLogin');
});
Route::POST('/userLoginCheck', 'userFunctions@userLoginCheck');
Route::get('/userLogout', 'userFunctions@Logout');

//DROPDOWN
Route::get('/dropdown', function () {
    return view('dropdown');
});
Route::get('/dropdown', 'dbController@showCountry');
Route::get('/api/get-state-list', 'dbController@showState');
Route::get('/api/get-city-list', 'dbController@showCities');
Route::get('/userHome', function (){
    return view('userHome');
});
Route::get('/userHome', 'userFunctions@userdatafetch');
Route::get('/itemView', function(){
    return view('itemView');
});
Route::get('/itemView', 'userFunctions@itemDataFetch');


Route::get('/hover', function(){
    return view('hover');
});


Route::get('/userAccount', function(){
    return view('userAccount');
});
Route::get('/userAccount', 'userFunctions@accountDataFetch');

//USER FORGET PASSWORD
Route::get('/userForgetPass', function(){
    return view('user/userForgetPass');
});
Route::post('/CheckUserExists', 'userFunctions@userCheck');
Route::post('/changeUserPassword', 'userFunctions@changeUserPassword');
