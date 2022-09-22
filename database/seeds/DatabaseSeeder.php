<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // create permissions
        $per1=Permission::create(['name' => 'Admin']);
        Permission::create(['name' => 'Create']);
        Permission::create(['name' => 'Edit']);
        Permission::create(['name' => 'Delete']);
        Permission::create(['name' => 'View']);

        $user= new User;
        $user->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'type' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $user1 = User::find(1);
        $user1->givePermissionTo('Admin');
        

        
    }
}
    