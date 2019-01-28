<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Admin extends Controller
{
    public function adminregister(Request $r)
    {
        $name=$r->txtName;
        $uname=$r->txtUsername;
        $pword=$r->txtPassword;
        $cpword=$r->txtConfirmPassword;

        if($cpword!=$pword)
        {
            echo "alert('Password Mismatch !')";
        }

        DB::table('tbl_adminregister')->insert(['adminName'=>$name,'adminuname'=>$uname,'adminpword'=>$pword]);
        return redirect('/adminRegister');
    }

    public function adminlogin(Request $r)
    {
        $uname=$r->txtUsername;
        $pword=$r->txtPassword;

        $checkLogin=DB::table('tbl_adminregister')->where(['adminuname'=>$uname,'adminpword'=>$pword])->get();

        if(count($checkLogin)  >0)
        {
            $r->session()->put('loggedAdminName', $uname);
            echo session()->get('loggedAdminName');
            return redirect('/adminHome');
        }
        else
        {
            $msg="Login Failed Wrong Data Passed";
            return view('/adminLogin',compact('msg'));
        }
    }

    public function adminLogout(Request $r)
    {
        $r->session()->forget('loggedAdminName');
        return redirect('/adminLogin');
    }    
}
