<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $routes =['roles','permissions','users'];
       $oters =[];
       $permissions = ['index','create','store','show','edit','update','destroy'];
       foreach($routes as $route){
        foreach($permissions as $permission){
            Permission::create([
                'name'=>$route.'.'.$permission
            ]);
        }
       }

       foreach($oters as $oter){
        Permission::create([
            'name'=>$oter
        ]);
    }

    }
}
