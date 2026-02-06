<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class UserFavorite extends Model
{
    use Hasroles;
    protected $fillable = [
        'user_id',
        'restaurant_id',
    ];
    public function scopeForClients(Builder $query)
    {
        return $query->whereHas('user',function($query){
            $query->role('client');
        });
    }
}