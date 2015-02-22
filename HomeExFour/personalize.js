$(document).ready(function() {
var $color = getCookie('background-color');
var $textcolor = getCookie('text-color');
var $fontsize = getCookie('font-size');


if ($color.length > 0) {
					$('body').css('background',$color);
				}
if ($textcolor.length > 0) {
					$('#demo').css('color',$textcolor);
				}
if ($fontsize.length > 0) {
					$('#demo').css('font-size',$fontsize+"px");
				}



$('#list').change(function(){
var color=$('#list').val();
$('body').css('background',color);
setCookie('background-color',color);
});


$('#fontcolor').change(function(){
var color=$('#fontcolor').val();
$('#demo').css('color',color);
setCookie('text-color',color);
});

$('#size').change(function(){
var size=$('#size').val();
$('#demo').css('font-size',size+"px");
setCookie('font-size',size);
});


});


function getCookie(c_name) {
				if (document.cookie.length>0) {
					c_start=document.cookie.indexOf(c_name + "=");
					if (c_start!=-1) {
						c_start=c_start + c_name.length+1;
						c_end=document.cookie.indexOf(";",c_start);
						if (c_end==-1) {
							c_end=document.cookie.length;
						}
						return unescape(document.cookie.substring(c_start,c_end));
					}
				}
				return "";
			}

			function setCookie(c_name,value,expiredays) {
				var exdate=new Date();
				exdate.setDate(exdate.getDate()+expiredays);
				document.cookie=c_name+ "=" +escape(value)+ ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
			}
