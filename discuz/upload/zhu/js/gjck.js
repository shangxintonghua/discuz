$(function(){
	//
	var scrollTop = 0;
	var timeoutFlag = 0;
	$(window).on('scroll', function(event) {
		if(timeoutFlag) clearTimeout(timeoutFlag);
		timeoutFlag = setTimeout(function(){
			var _scrollTop = $(this).scrollTop()
			if(_scrollTop< scrollTop){
				$('.footer_container').find('.for_fix_wrap').addClass('fixed')
			} else {
				$('.footer_container').find('.for_fix_wrap').removeClass('fixed')
			}
			scrollTop = _scrollTop
			timeoutFlag = 0
		},100)
	});
	$('.gotop').on('click', function(event) {
		event.preventDefault();
		$(window).scrollTop(0)
	});
});
$(function(){
	//专题焦点图
	var bannerAutoFlag = false; //是否自动轮播
	$('.area_left').on('click', '.nav_tip_wrap>div', function(event) {
		var index = $(this).index()
		bannerChange(index)
	}).on('mouseleave', function(event) {
		bannerAutoFlag = false
	}).on('mouseenter', function(event) {
		bannerAutoFlag = true
	}).on('click', '.to_left', function(event) {
		bannerChange(getPrevIndex())
	}).on('click', '.to_right', function(event) {
		bannerChange(getNextIndex())
	})

	function bannerChange(index){
		index = index || 0;
		var $bannerWrap = $('.area_left')
		$bannerWrap.find('.img_item').removeClass('act').eq(index).addClass('act')
		$bannerWrap.find('.nav_tip_wrap>div').removeClass('act').eq(index).addClass('act')
	}

	function getNextIndex(){
		var $bannerWrap = $('.area_left')
		var currIndex = $bannerWrap.find('.img_item.act').index()
		if(currIndex<0 || currIndex+1>=$bannerWrap.find('.img_item').length){
			return 0
		}
		return ++currIndex
	}

	function getPrevIndex(){
		var $bannerWrap = $('.area_left')
		var currIndex = $bannerWrap.find('.img_item.act').index()
		if(currIndex<0 || currIndex-1>=$bannerWrap.find('.img_item').length){
			return $bannerWrap.find('.img_item.act').length-1
		}
		return --currIndex
	}

	window.setInterval(function(){
		if(bannerAutoFlag) return;
		var $tleItems = $('.area_left').find('.nav_tip_wrap>div')
		var nextIndex = $tleItems.filter('.act').index()
		nextIndex++
		if(nextIndex<0 || nextIndex>$tleItems.length-1){
			nextIndex = 0;
		}
		bannerChange(nextIndex)
	}, 5000)
	
})

//导购
$(function(){
			var i=0;
			$("#guide .l_icon").click(function(){
				i=parseInt($("#guide").attr("tag"));
				i--;
				if(i<0){i=2;}
				showNum(i);
			});
			$("#guide .r_icon").click(function(){
				i=parseInt($("#guide").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			});
			$("#guide .black_ruond").click(function(){
				i=parseInt($("#guide").attr("tag"));
				showNum(i);
			});
			function showNum(i){
				$("#guide .item_wrap").hide();
				$("#guide .item_wrap:eq("+i+")").show();
				$("#guide .black_ruond").removeClass("red_round");
				$("#guide .black_ruond:eq("+i+")").addClass("red_round");
				$("#guide").attr("tag",i);
			}
			function timeShowPhotos(){
				i=parseInt($("#guide").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			}
			
					  
    });
	
	
//改件推介
$(function(){
			var i=0;
			$("#gjtj .l_icon").click(function(){
				i=parseInt($("#gjtj").attr("tag"));
				i--;
				if(i<0){i=2;}
				showNum(i);
			});
			$("#gjtj .r_icon").click(function(){
				i=parseInt($("#gjtj").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			});
			$("#gjtj .black_ruond").click(function(){
				i=parseInt($("#gjtj").attr("tag"));
				showNum(i);
			});
			function showNum(i){
				$("#gjtj .item_wrap").hide();
				$("#gjtj .item_wrap:eq("+i+")").show();
				$("#gjtj .black_ruond").removeClass("red_round");
				$("#gjtj .black_ruond:eq("+i+")").addClass("red_round");
				$("#gjtj").attr("tag",i);
			}
			function timeShowPhotos(){
				i=parseInt($("#gjtj").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			}
			
					  
    });
	
//口碑
$(function(){
			var i=0;
			$("#kb .l_icon").click(function(){
				i=parseInt($("#kb").attr("tag"));
				i--;
				if(i<0){i=2;}
				showNum(i);
			});
			$("#kb .r_icon").click(function(){
				i=parseInt($("#kb").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			});
			$("#kb .black_ruond").click(function(){
				i=parseInt($("#kb").attr("tag"));
				showNum(i);
			});
			function showNum(i){
				$("#kb .item_wrap").hide();
				$("#kb .item_wrap:eq("+i+")").show();
				$("#kb .black_ruond").removeClass("red_round");
				$("#kb .black_ruond:eq("+i+")").addClass("red_round");
				$("#kb").attr("tag",i);
			}
			function timeShowPhotos(){
				i=parseInt($("#kb").attr("tag"));
				i++;
				if(i>2){i=0;}
				showNum(i);
			}
			var intervalR;  
			
			
					  
    });
	
$(function(){ 
	$('.atlas_li').hover(function() {
	    $(this).addClass('on');
	    var wl = $(this).find('img').attr('width');
	    if (wl < 190) {
	        $(this).find('.in').css('left', '0')
	    } else {
	        $(this).find('.in').css('left', -wl / 4)
	    }
	},
	function() {
	    $(this).animate({
	        height: "120px"
	    },
	    100).removeClass('on');
	    $(this).find('.in').css('left', '0')
	});
})

$(function(){
  $('.buy').click(function(){
    if($('.pop_model').is(':hidden')){
      $('.pop_model').show();
      $('.buy');
    }
    else{
      $('.pop_model').hide();
      $('.buy');
    }
  })
})

$(function () {
	 $('.review_wraper').on('click', 'h2', function(event) {
		var index = $(this).index()
		$(this).addClass('act').siblings().removeClass('act')
		$('.review_wraper').find('.tab_pl').removeClass('act').eq(index).addClass('act')
	})
})


/*
(function(){

	
	$.fn.smint = function( options ) {

		// adding a class to users div
		$(this).addClass('smint')

		var settings = $.extend({
            'scrollSpeed '  : 500
            }, options);


		return $('.smint a').each( function() {

            
			if ( settings.scrollSpeed ) {

				var scrollSpeed = settings.scrollSpeed

			}


			///////////////////////////////////

			// get initial top offset for the menu 
			var stickyTop = $('.smint').offset().top;	

			// check position and make sticky if needed
			var stickyMenu = function(){
				
				// current distance top
				var scrollTop = $(window).scrollTop(); 
							
				// if we scroll more than the navigation, change its position to fixed and add class 'fxd', otherwise change it back to absolute and remove the class
				if (scrollTop > stickyTop) { 
					$('.smint').css({ 'position': 'fixed', 'top':0 }).addClass('fxd');

					} else {
						$('.smint').css({ 'position': 'absolute', 'top':stickyTop }).removeClass('fxd'); 
					}   
			};
					
			// run function
			stickyMenu();
					
			// run function every time you scroll
			$(window).scroll(function() {
				 stickyMenu();
			});

			///////////////////////////////////////
    
        
        	$(this).on('click', function(e){


				// gets the height of the users div. This is used for off-setting the scroll so th emenu doesnt overlap any content in the div they jst scrolled to
				var selectorHeight = $('.smint').height();   

        		// stops empty hrefs making the page jump when clicked
				e.preventDefault();

				// get id pf the button you just clicked
		 		var id = $(this).attr('id');
				
				// gets the distance from top of the div class that matches your button id minus the height of the nav menu. This means the nav wont initially overlap the content.
				var goTo =  $('div.'+ id).offset().top -selectorHeight;
				
				// Scroll the page to the desired position!
				$("html, body").animate({ scrollTop: goTo }, scrollSpeed);

			});	

            

		});

	}

*/

$(function(){

var txt0=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt1=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt2=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt3=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt4=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt5=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt6=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
$("#doPoint2 table tr td span small").each(function(index){
  $(this).mouseover(function(){
    id=index+1;
	var obj=$(this).parent().parent().next().children("em");
	if(id<=5){
		obj.html(txt1[id-1]);
	}else if(id>5 && id<=10){
	  id=id-5;
	  obj.html(txt2[id-1]);
	}else if(id>10 && id<=15){
	  id=id-10;
	  obj.html(txt3[id-1]);
	}else if(id>15 && id<=20){
	  id=id-15;
	  obj.html(txt4[id-1]);
	}else if(id>20 && id<=25){
	  id=id-20;
	  obj.html(txt5[id-1]);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  obj.html(txt6[id-1]);
	}
    $(this).parent().removeClass();
    $(this).parent().addClass("star"+id);
	$(this).parent().parent().next().children("strong").html(id+"分");
  });
  var Point1=5;
  var Point2=5;
  var Point3=5;
  var Point4=5;
  var Point5=5;
  var Point6=5;
  $(this).click(function(){
    id=index+1;
	if(id<=5){
	  $("#pointV1").val(id);
	}else if(id>5 && id<=10){
	  id=id-5;
	  $("#pointV2").val(id);
	}else if(id>10 && id<=15){
	  id=id-10;
	  $("#pointV3").val(id);
	}else if(id>15 && id<=20){
	  id=id-15;
	  $("#pointV4").val(id);
	}else if(id>20 && id<=25){
	  id=id-20;
	  $("#pointV5").val(id);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  $("#pointV6").val(id);
	}
	$(this).parent().attr("v",id);
  });
  $(this).parent().mouseout(function(){
    var ids=$(this).attr("v");
	id=index+1;
	var obj=$(this).parent().next().children("em");
	if(id<=5){
		obj.html(txt1[ids-1]);
	}else if(id>5 && id<=10){
	  id=id-5;
	  obj.html(txt2[ids-1]);
	}else if(id>10 && id<=15){
	  id=id-10;
	  obj.html(txt3[ids-1]);
	}else if(id>15 && id<=20){
	  id=id-15;
	  obj.html(txt4[ids-1]);
	}else if(id>20 && id<=25){
	  id=id-20;
	  obj.html(txt5[ids-1]);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  obj.html(txt6[ids-1]);
	}
	$(this).parent().next().children("strong").html(ids+"分");
    $(this).removeClass();
    $(this).addClass("star"+ids);
  });
});
});

$(function(){

var txt0=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt1=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt2=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt3=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt4=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt5=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
var txt6=["(特别差)","(很差)","(一般般)","(很好)","(非常好)"];
$("#doPoint table tr td span small").each(function(index){
  $(this).mouseover(function(){
    id=index+1;
	var obj=$(this).parent().parent().next().children("em");
	if(id<=5){
		obj.html(txt1[id-1]);
	}else if(id>5 && id<=10){
	  id=id-5;
	  obj.html(txt2[id-1]);
	}else if(id>10 && id<=15){
	  id=id-10;
	  obj.html(txt3[id-1]);
	}else if(id>15 && id<=20){
	  id=id-15;
	  obj.html(txt4[id-1]);
	}else if(id>20 && id<=25){
	  id=id-20;
	  obj.html(txt5[id-1]);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  obj.html(txt6[id-1]);
	}
    $(this).parent().removeClass();
    $(this).parent().addClass("star"+id);
	$(this).parent().parent().next().children("strong").html(id+"分");
  });
  var Point1=5;
  var Point2=5;
  var Point3=5;
  var Point4=5;
  var Point5=5;
  var Point6=5;
  $(this).click(function(){
    id=index+1;
	if(id<=5){
	  $("#pointV1").val(id);
	}else if(id>5 && id<=10){
	  id=id-5;
	  $("#pointV2").val(id);
	}else if(id>10 && id<=15){
	  id=id-10;
	  $("#pointV3").val(id);
	}else if(id>15 && id<=20){
	  id=id-15;
	  $("#pointV4").val(id);
	}else if(id>20 && id<=25){
	  id=id-20;
	  $("#pointV5").val(id);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  $("#pointV6").val(id);
	}
	$(this).parent().attr("v",id);
  });
  $(this).parent().mouseout(function(){
    var ids=$(this).attr("v");
	id=index+1;
	var obj=$(this).parent().next().children("em");
	if(id<=5){
		obj.html(txt1[ids-1]);
	}else if(id>5 && id<=10){
	  id=id-5;
	  obj.html(txt2[ids-1]);
	}else if(id>10 && id<=15){
	  id=id-10;
	  obj.html(txt3[ids-1]);
	}else if(id>15 && id<=20){
	  id=id-15;
	  obj.html(txt4[ids-1]);
	}else if(id>20 && id<=25){
	  id=id-20;
	  obj.html(txt5[ids-1]);
	}
	else if(id>25 && id<=30){
	  id=id-25;
	  obj.html(txt6[ids-1]);
	}
	$(this).parent().next().children("strong").html(ids+"分");
    $(this).removeClass();
    $(this).addClass("star"+ids);
  });
});
});