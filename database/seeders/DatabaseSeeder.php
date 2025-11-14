<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Crear usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@bodysculpture.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $admin->assignRole('admin');

        // Crear usuario cliente de ejemplo
        $customer = User::firstOrCreate(
            ['email' => 'cliente@example.com'],
            [
                'name' => 'Cliente Ejemplo',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        $customer->assignRole('customer');

        // Crear categorías
        $categories = [
            ['name' => 'Bicicletas', 'description' => 'Bicicletas fijas y de spinning'],
            ['name' => 'Pesas', 'description' => 'Pesas, mancuernas y barras'],
            ['name' => 'Máquinas', 'description' => 'Equipos de gimnasio profesionales'],
            ['name' => 'Accesorios', 'description' => 'Bandas, colchonetas, guantes y más'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat['name']], $cat);
        }

        // Crear marcas
        $brands = [
            ['name' => 'ProForm'],
            ['name' => 'NordicTrack'],
            ['name' => 'Bowflex'],
            ['name' => 'Weider'],
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate(['name' => $brand['name']], $brand);
        }
    }
}
