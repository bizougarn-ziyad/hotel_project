<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype=Auth()->user()->User_type;

            if ($usertype === 'admin') {
                return view('admin.index');
            }
            else if($usertype === 'user'){
                return view('home.index');
            } else {
                return redirect()->back();
            }

        }
    }
    public function home()
    {
        return view('home.index');
    }
}
