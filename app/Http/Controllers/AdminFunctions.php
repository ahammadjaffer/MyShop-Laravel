<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminFunctions extends Controller
{
    public function addCategory(Request $request)
    {
        $Name=$request->txtCategory;
        $catid=$request->txtcathid;
        if(isset($catid)==null)
        {
            DB::table('tbl_category')->insert(['catName'=>$Name]);
        }
        else
        {
            DB::table('tbl_category')->where(['catId'=>$catid])->update(['catName'=>$Name]);
        }
        //return view('AddCategory');
        return redirect('/category');
    }
    public function showCategory($catid=null,$catname=null)
    {
        if(isset($_GET['catid']))
        {
            $catid=$_GET['catid'];
        }
        if(isset($_GET['catname']))
        {
            $catname=$_GET['catname'];
        }
        $catDB=DB::table('tbl_category')->get();

        return view('category', ['category'=>$catDB,'cname'=>$catname,'cid'=>$catid]);
    }

    public function deleteCategory($delId)
    {
        DB::table('tbl_category')->where(['catId'=>$delId])->delete();
        return redirect('/category');
    }


    //SUBCATEGORY
    public function addSubcategory(Request $request)
    {
        $subcat=$request->txtSubCategory;
        $selcatid=$request->selcat;
        $scatid=$request->txtscathid;

        if(isset($scatid)==null)
        {
            DB::table('tbl_subcategory')->insert(['subcatName'=>$subcat,'catId'=>$selcatid]);
        }
        else
        {
            DB::table('tbl_subcategory')->where(['subcatId'=>$scatid])->update(['subcatName'=>$subcat,'catId'=>$selcatid]);
        }
        return redirect('/subcategory');
    }
    public function showsubcategory($scatid=null,$scatname=null)
    {
        $subcatDB=DB::table('tbl_subcategory')->join('tbl_category','tbl_category.catId','=','tbl_subcategory.catId')->get();
        $cat=DB::table('tbl_category')->get();

        if(isset($_GET['catid']))
        {
            $scatid=$_GET['catid'];
        }
        if(isset($_GET['catname']))
        {
            $scatname=$_GET['catname'];
        }
        return view('subcategory', ['subcategory'=>$subcatDB,'cat'=>$cat,'scname'=>$scatname,'scid'=>$scatid]);
    }
    public function deleteSubcategory($delId)
    {
        DB::table('tbl_subcategory')->where(['subcatId'=>$delId])->delete();
        return redirect('/subcategory');
    }

    //ADD STATES
    public function addState(Request $request)
    {
        $state=$request->txtState;

        //id of hidden field
        $stateid=$request->txtshid;
        
        //To add to database
        if((isset($stateid)==""))
        {
            DB::table('tbl_state')->insert(['stateName'=>$state]);
        }
        else
        {
            DB::table('tbl_state')->where(['stateId'=>$stateid])->update(['stateName'=>$state]);
        }
       
        return redirect('/states');
    }
    public function showState($eid=null,$statename=null)
    {

        //to check state edit values
        if(isset($_GET['eid']))
        {
            $eid=$_GET['eid'];

        }

        if(isset($_GET['statename']))
        {
            $statename=$_GET['statename'];
        }

        $showState=DB::table('tbl_state')->get();
        return view('/states', ['stateNames'=>$showState,'editstate'=>$statename,'editId'=>$eid]);

    }
    public function deleteState($did)
    {
        DB::table('tbl_state')->where(['stateId'=>$did])->delete();

        return redirect('/states');
    }


    // To add district
    public function addDist(Request $request)
    {

        $district=$request->txtDistrict;
        $stateid=$request->selState;

        //id of hidden field
        $distid=$request->txtdhid;

        //To add to database
        if((isset($distid)==""))
        {
            DB::table('tbl_district')->insert(['districtName'=>$district,'stateId'=>$stateid]);
        }
        else
        {
            DB::table('tbl_district')->where(['districtId'=>$distid])->update(['districtName'=>$district,'stateId'=>$stateid]);
        }
    
        return redirect('/districts');
    }
    public function showDistrict($deid=null,$distname=null)
    {

        //to check state edit values
        if(isset($_GET['deid']))
        {
            $deid=$_GET['deid'];
        }

        if(isset($_GET['distname']))
        {
            $distname=$_GET['distname'];
        }
        $selStateQuery=DB::table('tbl_state')->get();
        $showDistrict=DB::table('tbl_district')->join('tbl_state','tbl_district.stateId','=','tbl_state.stateId')->get();
        return view('/districts', ['districtNames'=>$showDistrict,'editdist'=>$distname,'editId'=>$deid,'selStateQuery'=>$selStateQuery]);
    }
    public function deleteDistrict($did)
    {
        DB::table('tbl_district')->where(['districtId'=>$did])->delete();

       return redirect('/districts');
    }

    //To add place
    public function addPlace(Request $request)
    {
        $place=$request->txtPlace;
        $distid=$request->selDistrict;
        $stateId=$request->selState;

        //id of hidden field
        $pid=$request->txtphid;

        //To add to database
        if((isset($pid)==""))
        {
            DB::table('tbl_place')->insert(['placeName'=>$place,'districtId'=>$distid,'stateId'=>$stateId]);
        }
        else
        {
            DB::table('tbl_place')->where(['placeId'=>$pid])->update(['placeName'=>$place,'districtId'=>$distid,'stateId'=>$stateId]);
        }
       
        return redirect('/places');
    }
    public function showPlace($peid=null,$placename=null)
    {

        //to check state edit values
        if(isset($_GET['peid']))
        {
            $peid=$_GET['peid'];

        }

        if(isset($_GET['placename']))
        {
            $placename=$_GET['placename'];
        }

        $showPlace=DB::table('tbl_place')->join('tbl_district','tbl_district.districtId','=','tbl_place.districtId')->join('tbl_state','tbl_state.stateId','=','tbl_place.stateId')->get();
        $showDistrict=DB::table('tbl_district')->get();
        $selStateQuery=DB::table('tbl_state')->get();

       return view('/places', ['placeNames'=>$showPlace,'editplace'=>$placename,'editId'=>$peid,'selDistrictQuery'=>$showDistrict,'selStateQuery'=>$selStateQuery]);
    }
    public function deletePlace($did)
    {
        DB::table('tbl_place')->where(['placeId'=>$did])->delete();

        return redirect('/places');
    }

    //SHOP APPROVE, REJECT
    public function shopRegReq()
    {
        //REQUESTED SHOP
        $shops = DB::table('tbl_shops')->where(['shopApproveStatus'=>0])->get();

        //APPROVED SHOPS
        $apprShops = DB::table('tbl_shops')->where(['shopApproveStatus'=>1])->get();

        //REJECTED SHOPS
        $rejcShops = DB::table('tbl_shops')->where(['shopApproveStatus'=>2])->get();

        return view('viewShops', ['shopList'=>$shops,'apprShopList'=>$apprShops,'rejcShopList'=>$rejcShops]);
    }

    public function appShop(Request $request)
    {

        $sid = $request->shopid;

        DB::table('tbl_shops')->where(['shopId'=>$sid])->update(['shopApproveStatus'=>1]);
        return redirect('/viewShops');
    }

    public function rejectShop(Request $request)
    {

        $sid = $request->shopid;

        DB::table('tbl_shops')->where(['shopId'=>$sid])->update(['shopApproveStatus'=>2]);
        return redirect('/viewShops');
    }

}
