<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create new user on register
     * @param RegisterRequest $request
     * @return User
     */
    public function register($request)
    {
        $user = self::create([
            "name"         => $request->name,
            "email"        => $request->email,
            "password"     => Hash::make($request->password)
        ]);

        $user->currencies()->sync(Currencies::currenciesId());

        return $user;
    }

    /**
     * The currencies that belong to the users.
     */
    public function currencies()
    {
        return $this->belongsToMany(
            Currencies::class, 'users_balance', 'user_id', 'currency_id'
        )->withPivot('balance');
    }
}
