/**
 * Created by guosheng on 2017/4/6.
 */
$(document).ready(function () {
    $("#sub").submit(function () {
        if($("#username").val()===""||$("#password").val()==""){
            alert("账号密码不能为空");
            return false;
        }
        return true;

    })
})
