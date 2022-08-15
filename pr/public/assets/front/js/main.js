var isUnderProgress = false;
var basketAjax = 'rightPanels/basket.php';


$(document).ready(function() {
	$('.order').bind('click','',additembasket);
});


function additembasket(val){
	if (isUnderProgress)
	{
		alert('تقاضاي شما در حال اجرا است. لطفا کمي صبر نماييد');
		return false;
	}

	isUnderProgress = true;
	var thisid= $(this).attr('id');
	var pid = thisid.substring(1,thisid.length);
	var count = $('#i' + pid).val();
	addtobasket(pid,count);
}

function addtobasket(pid,count){
	$.post(basketAjax, {'act':'additem','itemid':pid,'count':count}, function(data){
		m = data.split('|');
		//$('#b' + pid).css('background-color','#3BCDE0');
		if (m[0]=='ok') {
			//$('#product' + pid).addClass('addtobasket-ok').unbind('click').bind('click','', removefrombasketclick);
			$('#cart').html(m[1]);	
			//if (count>0) $('#b' + pid).css('background-color','#1EE400');
			alert('کالا به سبد افزوده شد.' +'\n'+ 'جهت پرداخت ميتوانيد از بالاي صفحه سبد خريد را انتخاب کنيد.');
			isUnderProgress = false;
		} else {
			if (m[1]=='') m[1]='ظاهرا در افزودن محصول به سبد خريد مشکلي پيش آمده.';
			isUnderProgress = false;
			alert(m[1]);
			//$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket');
		}					
	});
	
}