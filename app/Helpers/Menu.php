<?php
namespace App\Helpers;

class Menu
{
	public static function treeView($menus)
    {
    	$tree = '<ul class="nav nav-list" id="menu-sidebar">';

        foreach ($menus as $key => $menu) {
        	$toogle = (!empty($menu['childs'])) ? 'dropdown-toggle' : '';
        	$arrow = (!empty($menu['childs'])) ? '<b class="arrow fa fa-angle-down"></b>' : '';
        	$tree .= '<li class=""><a href="'.$menu['url'].'" class="'.$toogle.'"><i class="menu-icon '.$menu['icon'].'"></i><span class="menu-text"> '.$menu['label'].' </span>'.$arrow.'</a><b class="arrow"></b>';
        	if (!empty($menu['childs'])) {
        		$tree .= self::childView($menu['childs']);
        	}
        	$tree .= '</li>';
        }
        $tree .= '</ul>';
        return $tree;
    }

    static function childView($menus){                 
    	$tree = '<ul class="submenu">';

        foreach ($menus as $key => $menu) {
        	$toogle = (!empty($menu['childs'])) ? 'dropdown-toggle' : '';
        	$arrow = (!empty($menu['childs'])) ? '<b class="arrow fa fa-angle-down"></b>' : '';
        	$tree .= '<li class=""><a href="'.$menu['url'].'" class="'.$toogle.'"><i class="menu-icon '.$menu['icon'].'"></i><span class="menu-text"> '.$menu['label'].' </span>'.$arrow.'</a><b class="arrow"></b>';
        	if (!empty($menu['childs'])) {
        		$tree .= self::childView($menu['childs']);
        	}
        	$tree .= '</li>';
        }
        $tree .= '</ul>';
        return $tree;
    } 
}