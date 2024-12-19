<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_items')->insert([
            [
                'parent_id' => null,
                'text' => 'Dashboard',
                'url' => '/dashboard',
                'route' => null,
                'icon' => 'fas fa-tachometer-alt',
                'permission' => null,
            ],
            [
                'parent_id' => null,
                'text' => 'Reports',
                'url' => null,
                'route' => 'reports.index', // Puedes usar un nombre de ruta aquí si lo tienes
                'icon' => 'fas fa-chart-bar',
                'permission' => 'view-reports',
            ],
            [
                'parent_id' => 2, // Asociado al menú "Reports"
                'text' => 'Sales',
                'url' => '/reports/sales',
                'route' => null,
                'icon' => 'fas fa-dollar-sign',
                'permission' => 'view-sales',
            ],
            [
                'parent_id' => 2, // Asociado al menú "Reports"
                'text' => 'Users',
                'url' => '/reports/users',
                'route' => null,
                'icon' => 'fas fa-users',
                'permission' => 'view-users',
            ],
        ]);
    }
}
