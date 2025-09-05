<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\rooms;

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

    public function logout()
    {
        Auth::logout();
        return $this->home();
    }

    public function create_room()
    {
        return view('admin.create_room');
    }


    public function add_room(Request $request){

        $room = new Rooms();
        $room->room_name = $request->room_name;
        $room->price = $request->price;
        $room->room_type = $request->room_type;
        $room->description = $request->description;
        $room->wifi= $request->free_wifi;
        $image=$request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('room', $imageName);
            $room->image = $imageName;
        }
        $room->save();
        return redirect()->back();
    }
}
