<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function FnB(){
        return view('FoodBeverageView');
    }
    public function BH(){
        return view('BeautyHealthView');
    }
    public function HC(){
        return view('HomeCareView');
    }
    public function BK(){
        return view('BabyKidView');
    }
}