<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	 use Notifiable;

	 /**
		* The attributes that are mass assignable.
		*
		* @var array
		*/
	 protected $fillable = [
			 'name', 'email', 'role', 'password',
	 ];

	 /**
		* The attributes that should be hidden for arrays.
		*
		* @var array
		*/
	 protected $hidden = [
			 'password', 'remember_token',
	 ];







			function roles(){
				return $this->belongsToMany(Role::class,'assigned_roles');
			}
	 /**
		* @param array $roles
		* @return bool
		*/
	 public function hasRole(array $roles)
	 {


	 	 return $this->roles->pluck('name')->intersect($roles)->count();

			/*foreach ($roles as $role) {



			//return $this->roles->pluck('name')->contains($role); //forma posible de hacelo


				/* foreach ($this->roles as $userRole) {

						if ($userRole->name === $role) {
							 return true;
						}
				 }
			}
			return false;*/
	 }
}
