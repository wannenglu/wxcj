var fontAuto = {
	FA:function(json){//width表示网页的宽度
		this.init(json);
	}
}
fontAuto.FA.prototype = {
	faFun:function(json){
		var winW = $(window).width();//屏幕的宽度
		if(winW >= json.width){
			$("html").css({fontSize:"625%"});
		}
		else{
			$("html").css({fontSize:(winW/json.width*625)+"%"});
		}
	},
	init:function(json){
		this.faFun(json);//触发一次字体设置
		var obj = this;
		$(window).resize(function(){
			obj.faFun(json);
		});
	}
}
var fa = new fontAuto.FA({
	width:640
});







































