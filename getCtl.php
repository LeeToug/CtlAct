<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 15:07
 */

/**
 * @return array
 * TP5获取所有控制器
 */
function getnewctl(){
    //查询管理端模块所有控制器
    $pathList = glob("../application/index/controller". '/*.php');
    foreach($pathList as $key => $value) {
        $controllers[] = basename($value, '.php');
    }
    $cro_filter = ['Menu','Common','Base','Test','School','Login','index'];
    $newctl = array_diff($controllers,$cro_filter);
    return $newctl;
}