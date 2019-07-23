<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 14:49
 */

/**
 * @param $model
 * @param $controller
 * @param array $filteraction
 * @return array
 * tp5获取所有控制器的方法
 */
function getaction($model,$controller,$filteraction=[]){
    //需要过滤的action方法
    $filter = ['_initialize','__construct','getValidate','getCode','beforeAction','fetch','display','assign','engine','validateFailException'
        ,'validate','success','error','result','redirect','getResponseType','test'];
    //添加需要过滤的方法
    if(!empty($filteraction)){
        foreach ($filteraction as $va){
            $filter[] = $va;
        }
    }
    //找到所有action操作方法
    $actions = array();
    $actions[] = get_class_methods(\controller($model."/".$controller));
    //过滤掉定义的操作方法
    $attr = array();
    foreach ($actions as $key=>$val){
        foreach ($val as $v){
            if(!in_array($v,$filter)){
                $attr[] = $v;
            }
        }
    }

    return $attr;
}