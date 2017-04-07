<?php
/**
 * Created by PhpStorm.
 * User: guosheng
 * Date: 2017/4/7
 * Time: 12:18
 */
/**
 * @param $suffix 要跳转的路径
 * @description:利用echo函数实现javascript的页面跳转
 */
function javascriptSkip($suffix){
    echo "<script type='text/javascript' >";
    echo "location='$suffix'";
    echo "</script>";
}