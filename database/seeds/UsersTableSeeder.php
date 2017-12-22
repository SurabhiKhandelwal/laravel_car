<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();
		DB::table('roles')->truncate();
		DB::table('role_users')->truncate();
		$role = [
			'name' => 'Administrator',
			'slug' => 'administrator',
			'permissions' => [
				'admin' => true,
			]
		];
		$adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

		$registeredRole = [
			'name' => 'Registered User',
			'slug' => 'registered',
		];
		$registerRole = Sentinel::getRoleRepository()->createModel()->fill($registeredRole)->save();

		$admin = [
			'email'    => 'surabhi@example.com',
			'password' => 'password@123',
			'first_name' => 'surabhi',
			'last_name' => 'test'
		];
		$users = [
			[
				'email'    => 'register@example.com',
				'password' => 'demo@123',
				'first_name' => 'register',
				'last_name' => 'test'
			]
		];
		$adminUser = Sentinel::registerAndActivate($admin);
		$adminUser->roles()->attach($adminRole);
		foreach ($users as $user)
		{
			$registerUser = Sentinel::registerAndActivate($user);
			$registerUser->roles()->attach($registerRole);
		}
	}
}
