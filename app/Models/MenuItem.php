<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['parent_id', 'text', 'url', 'route', 'icon', 'permission'];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public static function getMenu()
    {
        // Obtén los menús principales (parent_id es null)
        $menus = self::whereNull('parent_id')->get();

        // Para cada menú principal, obtenemos los submenús (si existen)
        foreach ($menus as $menu) {
            $menu->submenus = self::where('parent_id', $menu->id)->get();
        }
        //dd($menus);
        return $menus;
    }
}
