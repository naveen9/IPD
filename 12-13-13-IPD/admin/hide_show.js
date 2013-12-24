
$(document).ready(function(){
	
		 $("#pu").click(function(){
		 $("#pay").hide();
		 $("#acc").hide();
		 $("#roster").hide();
		 $("#pro").hide();
		 $("#pur").show();
		 $("#pu").css({"background-color":"white","color":"black"});
		 $("#pr").css({"background-color":"#004F9D","color":"white"});
		 $("#pa").css({"background-color":"#004F9D","color":"white"});
		 $("#ac").css({"background-color":"#004F9D","color":"white"});
		 $("#ro").css({"background-color":"#004F9D","color":"white"});
  });
  
 
    $("#pa").click(function(){
		 $("#pur").hide();
		 $("#pro").hide();
		 $("#acc").hide();
		 $("#roster").hide();
		 $("#pay").show();
	 	 $("#pu").css({"background-color":"#004F9D","color":"white"});
		 $("#pr").css({"background-color":"#004F9D","color":"white"});
		 $("#ac").css({"background-color":"#004F9D","color":"white"});
		 $("#ro").css({"background-color":"#004F9D","color":"white"});
		 $("#pa").css({"background-color":"white","color":"black"});
  });
  
  $("#ac").click(function(){
		 $("#pur").hide();
		 $("#pro").hide();
		 $("#acc").show();
		 $("#roster").hide();
		 $("#pay").hide();
	 	 $("#pu").css({"background-color":"#004F9D","color":"white"});
		 $("#pr").css({"background-color":"#004F9D","color":"white"});
		 $("#ac").css({"background-color":"white","color":"black"});
		 $("#ro").css({"background-color":"#004F9D","color":"white"});
		 $("#pa").css({"background-color":"#004F9D","color":"white"});
  });
   $("#ro").click(function(){
		 $("#pur").hide();
		 $("#pro").hide();
		 $("#acc").hide();
         $("#roster").show();
		 $("#pay").hide();
	 	 $("#pu").css({"background-color":"#004F9D","color":"white"});
		 $("#pr").css({"background-color":"#004F9D","color":"white"});
		 $("#ac").css({"background-color":"#004F9D","color":"white"});
		 $("#ro").css({"background-color":"white","color":"black"});
		 $("#pa").css({"background-color":"#004F9D","color":"white"});
  });
  
     $("#pr").click(function(){
   	 $("#pur").hide();
	 $("#pro").hide();
	 $("#acc").hide();
	 $("#roster").hide();
	 $("#pro").show();
	 $("#pu").css({"background-color":"#004F9D","color":"white"});
	 $("#pr").css({"background-color":"white","color":"black"});
	 $("#pa").css({"background-color":"#004F9D","color":"white"});
	 $("#ac").css({"background-color":"#004F9D","color":"white"});
	 $("#ro").css({"background-color":"#004F9D","color":"white"});
  });

$("#co_open").click(function(){
	$("#cor_panel").show();
	});
	$("#co_1").click(function(){
	$("#cor_panel").hide();
	});

});


function validateNumbersOnly(e) {
            var unicode = e.charCode ? e.charCode : e.keyCode;
            if ((unicode == 8) || (unicode == 9) || (unicode > 47 && unicode < 58)) {
                return true;
            }
            else {

                window.alert("This field accepts only Numbers");
                return false;
            }
        }
