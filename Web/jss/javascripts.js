jQuery(document).ready(function($){
	    
	$(".btnrating").on('click',(function(e) {
	
	var previous_value = $("#selected_rating").val();
	
	var selected_value = $(this).attr("data-attr");
	$("#selected_rating").val(selected_value);
	
	$(".selected-rating").empty();
	$(".selected-rating").html(selected_value);
	
	for (i = 1; i <= selected_value; ++i) {
	$("#rating-star-"+i).toggleClass('btn-warning');
	$("#rating-star-"+i).toggleClass('btn-default');
	}
	
	for (ix = 1; ix <= previous_value; ++ix) {
	$("#rating-star-"+ix).toggleClass('btn-warning');
	$("#rating-star-"+ix).toggleClass('btn-default');
	}
	
	}));

	$(function () {
        $("#customCheck1").click(function () {
            if ($(this).is(":checked")) {
                $("#map").show();
                $("#list-not-map").hide();
            } else {
                $("#map").hide();
                $("#list-not-map").show();
            }
        });
    });
	
	$(function() {
		'use strict';
	  
		var body = $('#signup-verivy');
	  
		function goToNextInput(e) {
		  var key = e.which,
			t = $(e.target),
			sib = t.next('input');
	  
		  if (key != 9 && (key < 48 || key > 57)) {
			e.preventDefault();
			return false;
		  }
	  
		  if (key === 9) {
			return true;
		  }
	  
		  if (!sib || !sib.length) {
			sib = body.find('input').eq(0);
		  }
		  sib.select().focus();
		}
	  
		function onKeyDown(e) {
		  var key = e.which;
	  
		  if (key === 9 || (key >= 48 && key <= 57)) {
			return true;
		  }
	  
		  e.preventDefault();
		  return false;
		}
		
		function onFocus(e) {
		  $(e.target).select();
		}
	  
		body.on('keyup', 'input', goToNextInput);
		body.on('keydown', 'input', onKeyDown);
		body.on('click', 'input', onFocus);
	  
	  })

	  $(document).ready(function(){
		// Prepare the preview for profile picture
			$("#wizard-picture").change(function(){
				readURL(this);
			});
		});
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		
				reader.onload = function (e) {
					$('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

	  $(document).ready(function(){
		$("#searchSuki").on("keyup", function(){
			var value= $(this).val().toLowerCase();
			$("#tableSuki tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
			});
		});
	  });

	  $(document).ready(function(){
		$("#searchFinance").on("keyup", function(){
			var value= $(this).val().toLowerCase();
			$("#tableFinance tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
			});
		});
	  });
	  
	  var d = new Date();
  	  var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];

	  $(document).ready(function(){
		
		document.getElementById("monthFinanceView").innerHTML = `${months[d.getMonth()]} ${d.getFullYear()}`;
	  });

	  $(document).ready(function(){
		  
		document.getElementById("currentMonthFinanceView").innerHTML = `${months[d.getMonth()]}`;
	  });

	  $(document).ready(function(){

		document.getElementById("previousMonthFinanceView").innerHTML = `${months[d.getMonth()-1]}`;
	  });
	  
	  function cleaning(){
		document.getElementById("servingStatus1").innerHTML = `CLEANING`;
		document.getElementById("empty").innerHTML = `-- : --`;
	  }
	
	
});