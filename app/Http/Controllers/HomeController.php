<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirect()
{
    $usertype = Auth::user()->usertype;

    if ($usertype == '1') {
        return view('admin.home');
    } else {
        // Retrieve all products and pass them to the view
        $data = Product::paginate(3);
        return view('user.home', compact('data')); // Pass data to the view
    }
}



    public function index()
    {
        
        if (Auth::id())
        {
            return redirect('redirect');
        }

        else{
            $data = Product::paginate(3);
            return view('user.home', compact('data')); // Pass data to the view
        }
    }
}
