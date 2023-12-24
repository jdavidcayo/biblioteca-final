<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'Administrador']);
        $editorRole = Role::create(['name' => 'Editor']);
        $lectorRole = Role::create(['name' => 'Lector']);

        // Crear permisos
        $crearUsuariosPermission = Permission::create(['name' => 'crear usuarios']);
        $crearEntidadesPermission = Permission::create(['name' => 'crear entidades']);
        $crearEntradasPermission = Permission::create(['name' => 'crear entradas']);


        // Asignar permisos a roles
        $adminRole->givePermissionTo([$crearUsuariosPermission, $crearEntidadesPermission, $crearEntradasPermission,]);
        $editorRole->givePermissionTo([$crearEntradasPermission,]);

        // Crear usuario administrador
        $adminUser = User::create([
            'name' => 'Administrador',
            'email' => 'admin@biblioteca.ieeg.mx',
            'password' => bcrypt('password'),
        ]);

        // Asignar rol de administrador al usuario
        $adminUser->assignRole($adminRole);
    }

}

