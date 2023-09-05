<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        // data yg di request masukin ke kolom pada table
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->update();

        Alert::success('Congrats', 'Profile Updated');
        return redirect('profile');
    }

}
