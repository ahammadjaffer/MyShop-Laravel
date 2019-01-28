<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShopFunctions extends Controller
{
    public function showState()
    {
        $showState=DB::table('tbl_state')->get();

        return view('/shopRegister', ['selStateQuery'=>$showState]);
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

    //SHOP REGISTRATION
    public function shopRegister(Request $request)
    {
        $shopName = $request->txtshopName;
        $ownerName = $request->txtOwnername;
        $userName = $request->txtUserName;
        $password = $request->txtPassword;
        $contactNumber = $request->txtnumber;
        $place = $request->selPlace;
        $shopProof = $request->file('shopProof')->getClientOriginalName();
        $destination = base_path() . '/public/uploads';
        $request->file('shopProof')->move($destination, $shopProof);

        $checkLogin = DB::table('tbl_shops')->where(['shopUsername'=>$userName])->get();
        if(count($checkLogin)  >0)
        {
            $msg="UserName already exists !";
            return view('/shopRegister',compact('msg'));
        }
        else
        {
            DB::table('tbl_shops')->insert(['shopName'=>$shopName,'shopOwner'=>$ownerName,'shopUsername'=>$userName,'shopPassword'=>$password,'shopContact'=>$contactNumber,'shopPlace'=>$place,'ShopProof'=>$shopProof,'shopApproveStatus'=>0]);
        }

        
        return view('/shopRegister');
    }

    //SHOP LOGIN
    public function shopLoginCheck(Request $request)
    {
        $username = $request->input('userName');
        $password = $request->input('password');

        $checkLogin = DB::table('tbl_shops')->where(['shopUsername'=>$username,'shopPassword'=>$password,'shopApproveStatus'=>1])->get();
        if(count($checkLogin)  >0)
        {
            $request->session()->put('loggedShopName',$username);
            return redirect('/shopHome');
        }
        else
        {
            $msg="Login Failed !";
        }
        return view('/shopLogin',compact('msg'));
    }

    //CATEGORY
    public function showCategory()
    {
        $catDB=DB::table('tbl_category')->get();

        return view('/addItem', ['category'=>$catDB]);
    }

    //SUBCATEGORY
    public function showSubCategory(Request $request)
    {
        $subcatDB=DB::table('tbl_subcategory')->where('catId',$request->cat_Id)->pluck('subcatName','subcatId');

        return response()->json($subcatDB);
    }

    //SHOP LOGOUT
    public function shopLogout(Request $request)
    {
        $request->session()->forget('loggedShopName');
        return redirect('/shopLogin');
    }


    //ITEM TO DATABASE
    public function itemToDb(Request $request)
    {
        $sname=session()->get('loggedShopName');
        $shopid = DB::table('tbl_shops')->where(['shopUsername'=>$sname])->get();

        $itemName = $request->itemName;
        $subcatId = $request->selSubCat;
        $itemDetails = $request->itemDetails;
        $itemPrice = $request->itemPrice;
        $itemStock = $request->itemStock;
        $itemImage = $request->file('itemImage')->getClientOriginalName();
        $itemPath = base_path() . '/public/uploads/items';
        $request->file('itemImage')->move($itemPath, $itemImage);

        foreach ($shopid as $sid) {
            $sId = $sid->shopId;
            DB::table('tbl_items')->insert(['itemName'=>$itemName,'shopId'=>$sId,'subcatId'=>$subcatId,'itemDetails'=>$itemDetails,'itemPrice'=>$itemPrice,'itemStock'=>$itemStock,'itemImage'=>$itemImage]);

         }
    
        return redirect('/addItem');
    }

    public function itemView(Request $request)
    {
             $sname=session()->get('loggedShopName');
             $shopid = DB::table('tbl_shops')->where(['shopUsername'=>$sname])->get();
             
             foreach ($shopid as $sid) {
                $sId = $sid->shopId;
                $items = DB::table('tbl_items')->where(['shopId'=>$sId])->get();
             }

        
        return view('/viewItem', ['DBitems'=>$items]);

    }
}
