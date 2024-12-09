<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype== '1')
        {
            return view('admin.home');
        }

        else {
            return view('user.home');
        }
    }


    public function index()
    {
        
        if (Auth::id())
        {
            return redirect('redirect');
        }

        else{
            return view('user.home');
        }
    }
}
