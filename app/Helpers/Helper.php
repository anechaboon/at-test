<?php
namespace App\Helpers;

class Helper
{
    public static function activeMenu($menu){
        return ($menu==session('active-Menu'))?'active':'';
    }
}
?>