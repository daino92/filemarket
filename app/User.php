<?php

namespace App;

use App\Traits\Roles\HasRoles;
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
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
}
