<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function updatePhoto(Request $request){
    $request->validate([
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $user = Auth::user();

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile/', $filename);
    }
    }     
    
}
