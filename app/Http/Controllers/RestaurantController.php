<?php
namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants=Restaurant::all();
        return view('restaurant.index',compact('restaurants'));
    }  
    public function create(){
        return view('restaurant.create');
    }
    public function store(Request $request){
        if(Auth::user()->role != 'restaurateur'){
            return back()->with('error','Accès refusé');
        }
        Restaurant::create($request->validated());
    }
}