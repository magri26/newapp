<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Events\Dispatcher;
use App\Models\MenuItem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Dispatcher $events): void
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
        
            /*$subMenu = Category::all();
    
            foreach($subMenu as $menu){
                $event->menu->addIn('categorias', [
                    'text' => $menu->name,
                    'url' => '#',
                ]);
            }*/
            $menus = MenuItem::all();
            $filteredMenus = $menus->filter(function ($menu) {
                return $menu->parent_id !== null;
            });

            //dd($filteredMenus);
            
            foreach($menus as $menu){
                if($menu->parent_id==null){
                    $event->menu->add([
                        'key' => strtolower($menu->text),
                        'text' => $menu->text,
                        'url' => '#',
                    ]);

                    
                    
                    foreach ($filteredMenus as $filteredMenu) {
                        $event->menu->addIn(strtolower($menu->text), [
                            'key' => strtolower($menu->text).$menu->id,
                            'text' => $filteredMenu->text,
                            'url' => '#',
                        ]);
                    }
                }
                
                
                
            }
            //dd($menus);
        });
    }
}
