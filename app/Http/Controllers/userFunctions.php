<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class userFunctions extends Controller
{
    public function showState()
    {
        $showState=DB::table('tbl_state')->get();

        return view('/userRegister', ['selStateQuery'=>$showState]);
    }

    public function showDistrict(Request $request)
    {
        $showDistrict=DB::table('tbl_district')->where('stateId',$request->state_Id)->pluck('districtName','districtId');

        return response()->json($showDistrict);
    }

    public function showPlace(Request $request)
    {
        $showPlaces=DB::table('tbl_place')->where('districtId',$request->district_Id)->pluck('placeName','placeId');
       
        return response()->json($showPlaces);
    }

    public function userRegister(Request $request)
    {
        $fullName = $request->txtFullName;
        $userName = $request->txtUserName;
        $password = $request->txtPassword;
        $contactNumber = $request->txtnumber;
        $place = $request->selPlace;
        $userImage = $request->file('UserImage')->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $request->file('UserImage')->move($destination, $userImage);

        DB::table('tbl_users')->insert(['userFullname'=>$fullName,'userUsername'=>$userName,'userPassword'=>$password,'userContact'=>$contactNumber,'userPlace'=>$place,'userImage'=>$userImage]);

        return view('/userRegister');
    }

    //SHOP LOGIN
    public function userLoginCheck(Request $request)
    {
        $username = $request->input('userName');
        $password = $request->input('password');

        $checkLogin = DB::table('tbl_users')->where(['userUsername'=>$username,'userPassword'=>$password])->get();
        if(count($checkLogin)  >0)
        {
            $request->session()->put('loggedUserName',$username);
            return redirect('/userHome');
        }
        else
        {
            $msg="Login Failed !";
        }
        return view('/userLogin',compact('msg'));
    }

    //  USER LOGOUT
    public function Logout(Request $request)
    {
        $request->session()->forget('loggedUserName');
        return redirect('/userLogin');
    }

    public function userdatafetch(Request $request){
        //TO GET USER DATA
        $uname = session()->get('loggedUserName');
        $userData = DB::table('tbl_users')->where(['userUsername'=>$uname])->get();

        //TO GET ITEMS
        $itemsDB = DB::table('tbl_items')->offset(0)->limit(6)->get();

        return view('/userHome', ['userData'=>$userData,'itemsDB'=>$itemsDB]);
    }

    public function itemDataFetch(Request $request)
    {
        $itemid = $request->id;

        //TO GET USER DATA

        $uname =session()->get('loggedUserName');

        $userData = DB::table('tbl_users')->where(['userUsername'=>$uname])->get();

        //TO GET ITEM DATA
        $itemsDB = DB::table('tbl_items')->join('tbl_subcategory','tbl_subcategory.subcatId','=','tbl_items.subcatId')->join('tbl_category','tbl_category.catId','=','tbl_subcategory.catId')->where('itemId','=',$itemid)->get();

        return view('itemView', ['userData'=>$userData,'itemsDB'=>$itemsDB]);
    }

    public function accountDataFetch(Request $request)
    {
        $itemid = $request->id;

        //TO GET USER DATA
        $uname =session()->get('loggedUserName');
        $userData = DB::table('tbl_users')->where(['userUsername'=>$uname])->get();

        //TO GET ITEM DATA
        $itemsDB = DB::table('tbl_items')->join('tbl_subcategory','tbl_subcategory.subcatId','=','tbl_items.subcatId')->join('tbl_category','tbl_category.catId','=','tbl_subcategory.catId')->where('itemId','=',$itemid)->get();

        return view('itemView', ['userData'=>$userData,'itemsDB'=>$itemsDB]);
    }
    
    public function userCheck(Request $request)
    {
        $uname = $request->username;

        //TO GET ITEM DATA
        $checkLogin = DB::table('tbl_users')->where(['userUsername'=>$uname])->get();
        if(count($checkLogin)  >0)
        {
            $userExists=true;
        }
        else
        {
            $userExists=false;
        }
        return view('/user/userForgetPass',['userExists'=>$userExists,'userName'=>$uname]);
    }

    public function changeUserPassword(Request $request)
    {
        $uname = $request->hidUserName;
        $password = $request->p1;
        DB::table('tbl_users')->where(['userUsername'=>$uname])->update(['userPassword'=>$password]);
        return redirect('/userHome');
    }
}
