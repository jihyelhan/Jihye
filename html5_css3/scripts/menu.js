//<![CDATA[
    $(document).ready(function () {
	  $("#mainMenu>li>a")
		  .mouseover(function () {
			$(this).parent().siblings().find('ul').hide();
			// $(this).next().show(1000);			
			// $(this).next().css("display","block");
			
			// $(this).next().slideDown(1000);
				$(this).next().fadeIn(1000);
		 })
		  .mouseout(function () {
			// $(this).next().hide();			
		 })
		  .focus(function () {
		$(this).mouseover();			
		 })
		  .blur(function () {
		$(this).mouseout();	 
	  });
	} );
	//]]> 