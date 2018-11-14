<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 13.11.2018
 * Time: 16:44
 */

namespace App;


class ComponentFactory
{
    public static function get(string $param, array $arr)
    {
        switch ($param) {
            case 'skill_name':
                return new Skill($arr);
            case 'stack_name':
                return new Stack($arr);
            case 'position':
                return new Position($arr);
            case 'direction':
                return new Direction($arr);
            default:
                echo 'unknown';
                exit();
        }
    }
}
