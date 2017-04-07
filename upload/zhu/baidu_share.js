
var bd_div = null;

window._bd_share_config = {
	common : {
		bdText : '',
		bdUrl : '',
		bdPic : '',
		onBeforeClick : function(cmd, config) {
			config.bdText = bd_div.attr("sharetext");
			config.bdDesc = bd_div.attr("sharedesc");
			config.bdUrl = bd_div.attr("shareurl");
			config.bdPic = bd_div.attr("shareimg");
			return config;
		}
	},
	share : [{
		"bdSize" : 30,
		"bdCustomStyle" : "http://common.modiauto.com.cn/css/baidu_share.css"
	}],
};

function baidu_reload()
{
	window._bd_share_main = null;
	window._bd_share_is_recently_loaded = null;
	$(".bdsharebuttonbox").on("click", "a", function(){
		bd_div = $(this).parent();
	});
	
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
}

$(function(){
	baidu_reload();
});


var testurl = window.location.href;
setCookie('modi_tempurl',testurl,365,'/','.modiauto.com.cn');
function setCookie(name, value, expires, path, domain)
{
var liveDate = new Date();

expires = liveDate.setTime(liveDate.getTime() + expires*60*1000);//毫秒

document.cookie = name + "=" + escape (value) +

		((expires) ? "; expires=" + expires : "") +

		((path) ? "; path=" + path : "") +

		((domain) ? "; domain=" + domain : "");

}
		
		

        function getCookie(cookieName){
            var cookieValue="";
            if (document.cookie && document.cookie != '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i];
                    if (cookie.substring(0, cookieName.length + 2).trim() == cookieName.trim() + "=") {
                        cookieValue = cookie.substring(cookieName.length + 2, cookie.length);
                        break;
                    }
                }
            }
            return cookieValue;
        }

$(document).ready(function(){
    var skey = getCookie('modi_user');
    if(skey==""){
        
        $("#result").html('<a href="http://id.modiauto.com.cn" id="form-btn" role="button"><i class="hd_pic"><img src="http://static.modiauto.com.cn/png/201702/7ec86ccb-cc7d-44d0-a2e0-9148f2c335d3.png" alt=""></i><span class="nickname">登录</span></a>');
        
    }else{
        
        $('#result').html('<iframe src=http://id.modiauto.com.cn/bbs.php frameborder=0 width=250 height=70></iframe>');
        
        
        
    }
});
function getCookie(cookieName){
    var cookieValue="";
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            if (cookie.substring(0, cookieName.length + 2).trim() == cookieName.trim() + "=") {
                cookieValue = cookie.substring(cookieName.length + 2, cookie.length);
                break;
            }
        }
    }
    return cookieValue;
}
		