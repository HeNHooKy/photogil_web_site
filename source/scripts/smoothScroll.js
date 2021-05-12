   $('a[href^="#"]').bind("click", function(e){
			    elementClick = $(this).attr("href");
				destination = $(elementClick).offset().top;
				$('body').animate( { scrollTop: destination }, 800 );
			    	$('html').animate( { scrollTop: destination }, 800 );
				return false;
		   });
   $('form[action^="#"]').bind("click", function(e){
			    elementClick = $(this).attr("action");
				destination = $(elementClick).offset().top;
				$('body').animate( { scrollTop: destination }, 800 );
			    	$('html').animate( { scrollTop: destination }, 800 );
				return false;
		   });