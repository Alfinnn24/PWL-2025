<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function About($id,$name)
    {
        return view('UserView')
            ->with('name',$name)
            ->with('id',$id);
    }
}