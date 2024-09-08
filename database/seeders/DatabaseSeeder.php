<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Product;
use App\Enums\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       $this->Admin();
    // $this->Product();
        \App\Models\Product::factory(20)->create();
 

    }

    
    public function Product(){
        
        $product = Product::create([
            'name' => 'Product-Test',
            'image' => 'https://picsum.photos/id/2/400/400',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure non tempore a facere error 
                                est exercitationem magni facilis! Minus pariatur aperiam quod facilis omnis.",
            'price' => 2000,
            'type' => 'Test-Category',
            'user_id' => 1 ,
        ]);
    }
    public function Admin(){
        collect(UserRoles::cases())->map(function($role){
            Role::create([
                'name' => $role->value
            ]);
        });


        $adminRole = Role::where('name', UserRoles::CUSTOMER->value)->first();


        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);

        $admin->assignRole($adminRole);
    }
}
