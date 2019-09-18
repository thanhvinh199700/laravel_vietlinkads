<?php namespace App\Services;

use App\Models\Menus;
use DB;

class MenuService {

    public function getMenus() {
        $menu = DB::table('menus')->get();
        return $menu;
    }

    public function postMenus(array $data, $menu) {
        $menu::create([
            'menu_name' => $data['inputMenuName'],
            'menu_link' => $data['inputLink'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }

    public function getFormEdit($menu_id) {
        $menus = Menus::find($menu_id);
        return $menus;
    }

    public function updateMenu(array $data, $menu) {
        $menu->update([
            'menu_name' => $data['inputMenuName'],
            'menu_link' => $data['inputMenuLink'],
            'status' => $data['radioStatus'],
            'trash' => $data['radioTrash'],
        ]);
    }
    public function deleteMenu($menu){
        $menu->delete();
    }

}
