
$(document).ready(function(){
	
	$('#modalSub').click(function(event){
		event.preventDefault();
		if($('#current_pass').val() == '' || $('#new_password').val() == '' || $('#pass_again').val() == '' ){

			$('#error').css('color','red');
			$('#error').html('All fields are required!');
			
			return false;
		}else if($('#new_password').val() !== $('#pass_again').val()){
			$('#error').css('color','red');
			$('#error').html('Password do not match');
			return false;
		}else{
			var password = $('#current_pass').val();
			var newpass = $('#new_password').val();
			var newagain = $('#pass_again').val();
			$.ajax({
				url:'pass_change.php',
				method:'post',
				data: {password: password, newpass: newpass, newagain: newagain},
				success:function(data){
					alert(data);
				}


			});
		
		}



	});

	$(".info-box-header").click(function(){

		$(".inside").slideToggle("fast");

		$("#toggle").toggleClass(" glyphicon glyphicon-menu-down ,   glyphicon glyphicon-menu-up  ");
	});
});

	function openNav() {
    	document.getElementById("mySidenav").style.width = "250px";
	}

	function closeNav() {
    	document.getElementById("mySidenav").style.width = "0";
	}

	$("#search_user").keyup(function(){
		var user = $(this).val();

		if(user != ''){
			$("#result").html('');
			$.ajax({
				url: "search_user.php",
				method: 'post',
				data: {user:user},
				success:function(data){
					$('#result').html(data);
				}
			});

		}else{
			$('#result').html('User not found');
				}


	});