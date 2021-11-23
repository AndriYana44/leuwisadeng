<?php

use App\Models\Admin\Menu;
use App\Models\Admin\MenuParent;

if(!function_exists('parentMenu')) {
    function parentMenu() {
        $parent_menu = MenuParent::with(['child'])->orderBy('urutan', 'ASC')->get();
        return $parent_menu;
    }
}

if(!function_exists('linkMenu')) {
    function linkMenu() {
        $link_menu = Menu::where('is_child', 0)->get();
        return $link_menu;
    }
}