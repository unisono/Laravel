<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 User::truncate();
			 Role::truncate();
			// for ($i = 1; $i <= 10; $i++) {

				$user = User::create([

							'name' => "admin 1",
							'email' =>"admin1@admin.com",
						  'role'=> 1,
						  'password' => bcrypt('123123'),

					]);

			 //}

			$role = Role::create([
					 'name' => 'admin',
					 'display_name'=>'Administrador',
					 'description' =>'Puede administrar'
			 ]);

			 $user->roles()->save($role);

    }
}
