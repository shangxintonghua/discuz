 ;(function($, window, document, undefined) {
    var HwLayer = function(ele, opt){
        var self = this;
        self.$element = ele,
        self.defaults = {
            width: 600,
            height: 'auto',
            tapLayer: true,  //是否点击半透明遮罩层时关闭弹出层
            afterClose: function(){}
        },
        self.locked = false,
        self.options = $.extend({}, self.defaults, opt)
    }
    HwLayer.prototype = {
        init: function(){
            var self = this,
                ele = self.$element;

            //点击弹出层
            ele.on('click',function(e){
                e.preventDefault();
                self.showLayer();
            });

            $('.hwLayer-cancel,.hwLayer-close').on('click', function() {
               self.hideLayer();
            });
        },
        //展示弹出层
        showLayer: function(){ 
            var self = this;
            var layerid = self.$element.data('show-layer'); //获取层ID
			
            if(layerid == '' || layerid == undefined){
				//layerid = self.$element[0].id; //自动检测弹出层id
                var msg = '没有设置弹出层内容！';
                //console.log(msg);
                alert(msg);
            }else{
                var layer = $('#'+layerid),
                layerwrap = layer.find('.hw-layer-wrap');
                layer.fadeIn();

                //屏幕居中
                var layer_w,layer_h;
                var w = $(window).width();
                if(w<768){
                    layer_w = w-30;
                }else{
                    layer_w = self.options.width;
                }

                var h = $(window).height();
                if(layerwrap.outerHeight()>h){
                    layer_h = h-40;
                    layerwrap.css('overflow-y','auto');
                }else{
                    if(self.options.height=='auto'){
                        layer_h = layerwrap.outerHeight();
                    }else{
                        layer_h = self.options.height;
                    }
                }

                layerwrap.css({
                    'width': layer_w+'px',
                    'height': layer_h+'px',
                    'margin-top': -layer_h/2+'px',
                    'margin-left': -layer_w/2+'px'
                });
                 //点击或者触控弹出层外的半透明遮罩层，关闭弹出层
                layer.on('click',  function(event) {
                    if (event.target == this && self.options.tapLayer == true){
                        self.hideLayer();
                    }
                });
            }

        },
        //隐藏弹出层
        hideLayer: function(){
            var self = this;
            $('.hw-overlay').fadeOut();
            self.options.afterClose.call(self);
        }
    }
    

    $.fn.hwLayer = function(options) {
        var hwLayer = new HwLayer(this, options);
        return this.each(function () {
            if (typeof(options) == 'string') {
                switch(options){
                    case 'close':
                        hwLayer.hideLayer();
                        break;
					//case 'open':
					//	hwLayer.showLayer();
					//	break;
                }
            }else{
                hwLayer.init();
            }
        });
    };
})(jQuery, window, document);
 
 
 
 
        $(document).ready(function(){
            var skey = getCookie('modi_user');
            if(skey==""){
                
				$("#result").html('<a href="#0" id="form-btn" data-show-layer="hw-layer-login" role="button"><i class="hd_pic"><img src="http://static.modiauto.com.cn/png/201702/7ec86ccb-cc7d-44d0-a2e0-9148f2c335d3.png" alt=""></i><span class="nickname">登录</span></a>');
				
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

$(function(){
	$('#form-btn').hwLayer({
		width: 480,
		tapLayer: false,
		afterClose: function(){
			console.log('close');
		}
	});

	$(".hwLayer-ok").on('click',  function(event) {
		event.preventDefault();
		var user = $('#user').val();
		var pass = $('#password').val();
		if(user==''){
			$('#msg').addClass('text-danger').text('用户名不能为空！');
			var obj = document.getElementById("msg");
					obj.style.display= "";
			return false;
		}

		if(pass==''){
			$('#msg').addClass('text-danger').text('密码不能为空！');
			var obj = document.getElementById("msg");
					obj.style.display= "";
			return false;
		}

		$.ajax({
			url: 'http://id.modiauto.com.cn/zhu.php',
			type: 'POST',
			dataType: 'json',
			data: {user: user,password: pass},
			beforeSend: function(){
				$('#msg').addClass('text-success').text('正在登录...');
				$(".hwLayer-ok").attr('disabled',true);
			},

			success: function(res){
				if(res.code==1){ //登录成功
					$('#result').html('<iframe src=http://id.modiauto.com.cn/bbs.php frameborder=0 width=250 height=70></iframe>');
					
					//$('#result').html('欢迎您，' + res.modi_username + '<img src=http://bbs.modiauto.com.cn/uc_server/avatar.php?uid=' + res.modi_uid + '&size=big>');
					
					
					$('#msg').removeClass('text-danger').addClass('text-success').text('登录成功！');
					$('#hw-layer-login').hwLayer('close');
					
					 
					
				}else{

					//$('#msg').addClass('text-danger').text('用户名或密码错误！');
					alert("用户名或密码错误");
					var obj = document.getElementById("msg");
					//obj.style.display= "";
					
				}
				$(".hwLayer-ok").removeAttr('disabled');

			}

		});

	});

});