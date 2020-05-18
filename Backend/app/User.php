<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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

		public function create($request)
		{
			$user = new User;
			$user->name = $request->name;
			$user->username = $request->username;
			$user->email = $request->email;
			$user->password = $request->password;
			$user->save();
			return $user;
		}
		public function change_data($request,$id)
		{
        $user = User::findOrFail($id);
				if ($user)
				{
            if ($request->name) { $user->name = $request->name; }
            if ($request->username) { $user->username = $request->username; }
            if ($request->email) { $user->email = $request->email; }
            if ($request->password) { $user->password = $request->password; }
            $user->save();
						return $user;
				}
				else return null;
		}
    public function libraries() {
        return $this->hasMany('App\Library');
    }
}
