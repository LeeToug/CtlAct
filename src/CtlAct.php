<?php


namespace CtlAct;


class CtlAct
{
    /**
     * @param $model
     * @param $controller
     * @param array $filteraction
     * @return array
     * tp5获取所有控制器的方法
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
        //这里要添加助手方法controller（）
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

    /**
     * @return array
     * 获取所有控制器
     */
    function getctl(){
        //查询管理端模块所有控制器
        $pathList = glob("../application/index/controller". '/*.php');
        foreach($pathList as $key => $value) {
            $controllers[] = basename($value, '.php');
        }
        $cro_filter = ['Login'];
        $newctl = array_diff($controllers,$cro_filter);
        return $newctl;
    }
}