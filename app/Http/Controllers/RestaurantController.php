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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'ville' => 'required|string|max:100',
            'capacity' => 'required|integer|min:1',
            'cuisine' => 'required|string'
        ]);
        $data['user_id'] = Auth::id();
        Restaurant::create($data);
        return back()->with('success','Restaurant créé avec succès');
    }
}