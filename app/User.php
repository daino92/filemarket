<?php

namespace App;

use App\Traits\Roles\HasRoles;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'stripe_id', 'stripe_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function  saleValueThisMonth()
    {
        $now = Carbon::now();

        return $this->sales()->whereBetween('created_at', [
            $now->startOfMonth(),
            $now->copy()->endOfMonth()
        ])->get()->sum('sale_price');
    }

    public function  saleValueOverLifetime()
    {
        return $this->sales->sum('sale_price');
    }

    public function isAdmin() {
        if ($this->hasRole('admin')) {
            return true;
        }
    }

    public function isTheSameAs(User $user) {
        return $this->id === $user->id;
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function sales() {
        return $this->hasMany(Sale::class);
    }
}
