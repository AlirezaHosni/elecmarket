		//#### PRODUCTS Only
	
		
		
		
		
		function removefrombasketclickTakhfif () {
			ajaxAction='delProduct';
			pid= $(this).attr("id");
			pid = pid.substring(7,pid.length);
			$('#product' + pid).removeClass('addtobasket-ok-takhfif').removeClass('addtobasket-takhfif').removeClass('inthebasket-takhfif').addClass('addtobasket-load');				
			
			$.post(basketAjax, {'act':'delitem','itemid':pid, 'val':'Takhfif'}, function(data){
				m = data.split('|');
				if (m[0]=='ok') {
					$('#product' + pid).removeClass('inthebasket-takhfif').addClass('addtobasket-takhfif').removeClass('addtobasket-ok').removeClass('addtobasket-ok-takhfif').removeClass('addtobasket-load').bind('click', '', addtobasketclickTakhfif);
					refreshbasket(m[1]);						
				} else {
					alert('Ø¸Ø§Ù‡Ø±Ø§ Ø¯Ø± Ø­Ø°Ù Ø§Ø² Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø´Ú©Ù„ÙŠ Ù¾ÙŠØ´ Ø¢Ù…Ø¯Ù‡. Ù„Ø·ÙØ§ Ø¯Ùˆ Ø¨Ø§Ø±Ù‡ Ø³Ø¹ÙŠ Ú©Ù†ÙŠØ¯');
					$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket-ok-takhfif');						
				}					
			});
			return false;			
	}
	
	function incProductNumTakhfif(){
		ajaxAction='delProduct';
		pid= $(this).attr("id");
		pid = pid.substring(7,pid.length);
		$.post(basketAjax, {'act':'additem','itemid':pid, 'val':'Takhfif'}, function(data){
			m = data.split('|');
			if (m[0]=='ok') refreshbasket(m[1]);						
			else alert(m[1]);
		});
		return false;					
	}
	
	function decProductNumTakhfif(){
		ajaxAction='delProduct';
		pid= $(this).attr("id");
		pid = pid.substring(7,pid.length);
		$.post(basketAjax, {'act':'decitem','itemid':pid, 'val':'Takhfif'}, function(data){
			m = data.split('|');
			if (m[0]=='ok') refreshbasket(m[1]);
			else alert(m[1]);				
		});
		return false;	
	}
	
	function incProductNum(){
		ajaxAction='delProduct';
		pid= $(this).attr("id");
		pid = pid.substring(7,pid.length);
		$.post(basketAjax, {'act':'additem','itemid':pid, 'val':''}, function(data){
			m = data.split('|');
			if (m[0]=='ok') refreshbasket(m[1]);						
			else alert(m[1]);
		});
		return false;		
	}

	
	function decProductNum(){
		ajaxAction='delProduct';
		pid= $(this).attr("id");
		pid = pid.substring(7,pid.length);
		
		$.post(basketAjax, {'act':'decitem','itemid':pid, 'val':''}, function(data){
			m = data.split('|');
			if (m[0]=='ok') refreshbasket(m[1]);
			else alert(m[1]);				
		});
		return false;	
	}
	
	
	
	
	
	function clearBasket(){

		ajaxAction='clearBasket';
		if (confirm('Ø¢ÙŠØ§ Ø§Ø² Ø®Ø§Ù„ÙŠ Ú©Ø±Ø¯Ù† Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø·Ù…Ø¦Ù† Ù‡Ø³ØªÙŠØ¯ ØŸ ')){
			$.post(basketAjax, {'act':'clear'}, function(data){
				m = data.split('|');
				if (m[0]=='ok') {
					refreshbasket(m[1]);
					$('.addtobasket-ok').addClass('addtobasket').removeClass('addtobasket-ok').removeClass('addtobasket-load').bind('click', '', addtobasketclick);
				} else {
					alert('Ø¸Ø§Ù‡Ø±Ø§ Ø¯Ø± Ø§ÙØ²ÙˆØ¯Ù† Ù…Ø­ØµÙˆÙ„ Ø¨Ù‡ Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø´Ú©Ù„ÙŠ Ù¾ÙŠØ´ Ø¢Ù…Ø¯Ù‡. Ù„Ø·ÙØ§ Ø¯Ùˆ Ø¨Ø§Ø±Ù‡ Ø³Ø¹ÙŠ Ú©Ù†ÙŠØ¯');
				}
			});
		}
		return false;
	}
	
	var pid =0;
	function refreshAddProduct(){
		 $('#product' + pid).removeClass('addtobasket-load');
		 $('#product' + pid).addClass('addtobasket');
	}
	
	function refreshDelProduct(){
		 $('#product' + pid).removeClass('addtobasket-load');
		 $('#product' + pid).addClass('addtobasket-ok');
	}
	//####
	
	function addtobasketclick () {

			ajaxAction='addProduct';
			pid= $(this).attr("id");
			pid = pid.substring(7,pid.length);
			$(this).removeClass('addtobasket');				
			$(this).addClass('addtobasket-load');
			
			$.post(basketAjax, {'act':'additem','itemid':pid}, function(data){
				m = data.split('|');
				if (m[0]=='ok') {
					$('#product' + pid).addClass('addtobasket-ok').unbind('click').bind('click','', removefrombasketclick);
					refreshbasket(m[1]);
				} else {
					if (m[1]=='') $m[1]='Ø¸Ø§Ù‡Ø±Ø§ Ø¯Ø± Ø§ÙØ²ÙˆØ¯Ù† Ù…Ø­ØµÙˆÙ„ Ø¨Ù‡ Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø´Ú©Ù„ÙŠ Ù¾ÙŠØ´ Ø¢Ù…Ø¯Ù‡.';
					alert(data);
					$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket');
				}					
			});
			return false;			
	}
	
	function addtobasketclickTakhfif () {

			ajaxAction='addProduct';
			pid= $(this).attr("id");
			pid = pid.substring(7,pid.length);
			$(this).removeClass('addtobasket');				
			$(this).addClass('addtobasket-load');
			
			$.post(basketAjax, {'act':'additem','itemid':pid,'val':'Takhfif'}, function(data){
				m = data.split('|');
				if (m[0]=='ok') {
					$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket-ok-takhfif').unbind('click').bind('click','', removefrombasketclickTakhfif );
					refreshbasket(m[1]);
				} else {
					if (m[1]=='') $m[1]='Ø¸Ø§Ù‡Ø±Ø§ Ø¯Ø± Ø§ÙØ²ÙˆØ¯Ù† Ù…Ø­ØµÙˆÙ„ Ø¨Ù‡ Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø´Ú©Ù„ÙŠ Ù¾ÙŠØ´ Ø¢Ù…Ø¯Ù‡.';
					alert(m[1]);
					$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket');
				}					
			});
			return false;			
	}
	
	function removefrombasketclick () {
			ajaxAction='delProduct';
			pid= $(this).attr("id");
			pid = pid.substring(7,pid.length);
			$('#product' + pid).removeClass('addtobasket-ok').removeClass('addtobasket').removeClass('inthebasket').addClass('addtobasket-load');				
			
			$.post(basketAjax, {'act':'delitem','itemid':pid, 'val':''}, function(data){
				m = data.split('|');
				if (m[0]=='ok') {
					$('#product' + pid).removeClass('inthebasket').addClass('addtobasket').removeClass('addtobasket-ok').removeClass('addtobasket-load').bind('click', '', addtobasketclick);
					refreshbasket(m[1]);						
				} else {
					alert('Ø¸Ø§Ù‡Ø±Ø§ Ø¯Ø± Ø­Ø°Ù Ø§Ø² Ø³Ø¨Ø¯ Ø®Ø±ÙŠØ¯ Ù…Ø´Ú©Ù„ÙŠ Ù¾ÙŠØ´ Ø¢Ù…Ø¯Ù‡. Ù„Ø·ÙØ§ Ø¯Ùˆ Ø¨Ø§Ø±Ù‡ Ø³Ø¹ÙŠ Ú©Ù†ÙŠØ¯');
					$('#product' + pid).removeClass('addtobasket-load').addClass('addtobasket-ok');						
				}					
			});
			return false;			
	}
	
	function paybtnclick(event){
		event.preventDefault();
		document.location.href = 'index.php?page=payment';
	}
	
	function savebtnclick(event){
		event.preventDefault();
		document.location.href = 'index.php?page=payment&redirect=savebasket';
	}
	
	function loginbtnclick(){
		formnum = $(this).parents('form');
		u = formnum.find('input[name=usern]');
		p = formnum.find('input[name=passw]');
		c = formnum.find('input[name=m_security_code]');
		
		
		u2 = u.val();
		p2 = p.val();
			if (u2=='' || u2=='Ù†Ø§Ù… Ú©Ø§Ø±Ø¨Ø±ÙŠ' || u2.length<4)	{
				alert('Ù†Ø§Ù… Ú©Ø§Ø±Ø¨Ø±ÛŒ Ù…Ø¹ØªØ¨Ø± Ù†ÛŒØ³Øª');
				u.parent().css('background-position','0px -54px');
				return false
			}
			if (p2=='' || p2=='Ú©Ù„Ù…Ù‡ Ø¹Ø¨ÙˆØ±' || p2.length<4){
				alert('Ú©Ù„Ù…Ù‡ Ø¹Ø¨ÙˆØ± Ù…Ø¹ØªØ¨Ø± Ù†ÛŒØ³Øª');
				p.parent().css('background-position','0px -54px');
				return false
			}
			if (c!=null && c.val()==''){
				alert('Ù„Ø·ÙØ§ Ú©Ø¯ Ø§Ù…Ù†ÛŒØªÛŒ Ø±Ø§ ÙˆØ§Ø±Ø¯ Ù†Ù…Ø§ÛŒÛŒØ¯.');
				c.parent().css('background-position','0px -54px');
				return false
			}
		$(this).parents('form').submit();
		
	}
		
	function pdover(){
		a = $(this).find('a[class!=thumbn]')
		if (a.attr('pos')!='fixed') 
			a.animate({top : 0}, 'fast','swing');
	}
	
	function pdout(){
		a = $(this).find('a[class!=thumbn]')
		if (a.attr('pos')!='fixed')
			a.animate({
				top : -30
			  }, 'fast', function() {
				// Animation complete.
			  });
	}
	
	function rooldownbtns(){
		pid = $(this).attr('id');
		lev = pid.substring(6,7);
		sid = pid.substring(7,pid.length);
		sid = '#catsubbtns' + sid;
		
		$(document).find('.invisiblediv[lev='+lev+']').not(sid).slideUp('slow');
		$(sid).slideToggle('slow');
		return false;
	}
	
	function showhelp(){
		$('#semat_question').fadeIn('fast');
	}
	
	function hidehelp(){
		$('#semat_question').fadeOut('slow');
	}
	
	function setCookie(c_name,value,exdays)
	{
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	}
	
	function getCookie(c_name)
	{
		var i,x,y,ARRcookies=document.cookie.split(";");
		for (i=0;i<ARRcookies.length;i++)
		{
		  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		  x=x.replace(/^\s+|\s+$/g,"");
		  if (x==c_name)
			{
			return unescape(y);
			}
		  }
	}
	
	function checkCookie()
	{
		var showalert=getCookie("alert");
		 if (showalert==null || showalert=="")
		  {
			$('#alert').show();
		  }
		else
		  {
			$('#alert').hide();
		  }
	}
	
	function dosetCookie(){
		setCookie('alert','hide',3);
		$('#alert').hide();
	}
	
	function dooptionselectchange(){
		 mval = $(this).val();
			
		 if (mval=='') return false;
		 
		 if (mval==100) {
			selid = $(this).attr('id');
			document.location='index.php?page=eshop&ptyp=' + selid;
		 } 
		 mdet = mval.split('|');
		 //alert('#prdet'+ mdet[0]);
		 var takhfif=0;
		 var obj = $('#prpic'+ mdet[0]).find('.addtobasket');
		 if (obj.attr('id')==undefined || obj.attr('id')=='') obj = $('#prpic'+ mdet[0]).find('.addtobasket-ok');
		 if (obj.attr('id')==undefined || obj.attr('id')=='') obj = $('#prpic'+ mdet[0]).find('.addtobasket_fake');
		 if (obj.attr('id')==undefined || obj.attr('id')=='') {takhfif=1; obj = $('#prpic'+ mdet[0]).find('.addtobasket-takhfif');}
		 if (obj.attr('id')==undefined || obj.attr('id')=='') {takhfif=1; obj = $('#prpic'+ mdet[0]).find('.addtobasket-ok-takhfif')};
		 
		 
		 if (takhfif==1) {
			 txt = '<b>Ú©Ø¯ Ú©Ø§Ù„Ø§ </b> : '+ mdet[1] +'<br/>' +
					'<b>Ú¯Ø±ÙˆÙ‡</b> : Ú¯Ø±ÙˆÙ‡ '+ mdet[2] +'<br/>' +
					'<b>Ù‚ÙŠÙ…Øª</b> : <strike>'+mdet[3] +' Ø±ÛŒØ§Ù„</strike><br/>'+
					'<font color="white"><b>Ù‚ÛŒÙ…Øª :</b></font><font color="red">0 Ø±ÛŒØ§Ù„</font><br/>';
			 if (mdet[6]==1)	 txt =txt +  mdet[4];
			 txt =txt + mdet[5]+'<br/>';
			 $('#prdet'+ mdet[0]).html(txt);
			 $('#prpic'+ mdet[0]).find('.addtobasket-takhfif').attr('id','product' +mdet[1]);
			 $('#prpic'+ mdet[0]).find('.addtobasket-ok-takhfif').attr('id','product' +mdet[1]);
			 $('#prpic'+ mdet[0]).css('background-image','url(uploads/products/small/ps'+mdet[1]+'.jpg)');
			 $('#product' + mdet[1]).removeClass().addClass('addtobasket-takhfif').unbind('click');
			 if(mdet[6]==1) $('#product' + mdet[1]).bind('click', '', addtobasketclickTakhfif);
			  else $('#product' + mdet[1]).attr('href')='index.php?page=eshop&file=psignin';
		 } else {
			 txt = '<b>Ú©Ø¯ Ú©Ø§Ù„Ø§ </b> : '+ mdet[1] +'<br/>' +
					'<b>Ú¯Ø±ÙˆÙ‡</b> : Ú¯Ø±ÙˆÙ‡ '+ mdet[2] +'<br/>' +
					'<b>Ù‚ÙŠÙ…Øª</b> : '+mdet[3] +' Ø±ÙŠØ§Ù„<br/>' ;
			 if (mdet[6]==1)	 txt =txt +  mdet[4];
			 txt =txt + mdet[5]+'<br/>';
			 $('#prdet'+ mdet[0]).html(txt);
			 $('#prpic'+ mdet[0]).find('.addtobasket').attr('id','product' +mdet[1]);
			 $('#prpic'+ mdet[0]).find('.addtobasket-ok').attr('id','product' +mdet[1]);
			 $('#prpic'+ mdet[0]).find('.addtobasket-load').attr('id','product' +mdet[1]);	
			 $('#prpic'+ mdet[0]).css('background-image','url(uploads/products/small/ps'+mdet[1]+'.jpg)');
			 $('#product' + mdet[1]).removeClass().addClass('addtobasket').unbind('click');
			 if(mdet[6]==1) $('#product' + mdet[1]).bind('click', '', addtobasketclick);
			  else $('#product' + mdet[1]).attr('href')='index.php?page=eshop&file=psignin';
		 }
		 //removeClass('inthebasket').addClass('addtobasket').removeClass('addtobasket-ok').removeClass('addtobasket-load')
		 
		
		 $('a').aToolTip({fixed: true});
		 
	}
	
	function slidedownbtns(event){
		event.preventDefault();
		idclk = $(this).next().attr('id');
		$('.slidform').not('#' + idclk).slideUp('300');	
		$(this).next().slideDown('300');			
		return false;
	}

	


	
	$(document).ready(function() {

		$('#clearbasket').bind('click','',clearBasket);
		$('.addtobasket').bind('click', '', addtobasketclick);
		$('.addtobasket-takhfif').bind('click', '', addtobasketclickTakhfif);
		$('.inthebasket').addClass('addtobasket').addClass('addtobasket-ok').bind('click','', removefrombasketclick);
		$('.inthebasket-takhfif').addClass('addtobasket-takhfif').addClass('addtobasket-ok-takhfif').bind('click','', removefrombasketclickTakhfif);
		$('#paybasket').bind('click','', paybtnclick);
		$('#savebasket').bind('click','', savebtnclick);
		$('#alert_close').bind('click','', dosetCookie);
		$('.loginbtn').bind('click','', loginbtnclick);
		$('.product').hover(pdover,pdout);
		$('.user_semat_cl').hover(showhelp,hidehelp);
		$('.cat_lnk_open').bind('click','',rooldownbtns);
		$('.selectbox').bind('change','',dooptionselectchange);
		$('.panel_div').bind('click','',slidedownbtns);
		checkCookie();
	});
	