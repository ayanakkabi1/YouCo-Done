<?php
<?php
namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\UserFavorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
class UserFavoriteController extends Controller{
    use HasRoles;
       public function addFavorite(Request $request){
            $user = Auth::user();
            if(!$user->hasRole('client')){
                return back()->with('error','Seuls les clients peuvent ajouter des favoris');
            }

            $request->validate([
                'restaurant_id' => ['required', 'integer', 'exists:restaurants,id'],
            ]);

            $restaurant_id = $request->input('restaurant_id');

            $exists = UserFavorite::where('user_id', $user->id)
            ->where('restaurant_id', $restaurant_id)
            ->exists();
            
        if ($exists) {
            return back()->with('info', 'Ce restaurant est déjà dans vos favoris');
        }
        UserFavorite::create([
            'user_id' => $user->id,
            'restaurant_id' => $restaurant_id
        ]);
        return back()->with('success', 'Restaurant ajouté aux favoris !');
       }
}