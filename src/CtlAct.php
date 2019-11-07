<?php


namespace CtlAct;


class CtlAct
{
    /**
     * @param $model
     * @param $controller
     * @param array $filteraction
     * @return array
     * 获取所有控制器的方法
     */
    function getaction($model,$controller,$filteraction=[]){
        //需要过滤的action方法
        $filter = ['_initialize','__construct'];
        //添加需要过滤的方法
        if(!empty($filteraction)){
            foreach ($filteraction as $va){
                $filter[] = $va;
            }
        }
        //找到所有action操作方法
        $actions = array();

        $actions[] = get_class_methods($model."/".$controller);
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

    /**
     * @param $path 相对路径
     * @return array
     * 获取控制器controllers
     */
    function getctl($path){
        //查询管理端模块所有控制器
        $pathList = glob($path. '/*.php');
        foreach($pathList as $key => $value) {
            $controllers[] = basename($value, '.php');
        }
        $cro_filter = ['Login'];
        $newctl = array_diff($controllers,$cro_filter);
        return $newctl;
    }

}