<div class="inner">

<h1>Enter your new password below.</h1>


<form action="<?php echo base_url(); ?>processpassword" method="post">
	<input type="hidden" name="user" value="<?php echo $uID; ?>" />
	<table class="update-password">
		<tr>
			<td>Password:</td>
			<td><input type="text" id="pass" name="pass" value="" /></td>
		</tr>		<tr>
			<td>Retype Password:</td>
			<td><input type="text" id="pass2" name="pass2" value="" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="forgotButton" value="Update Password" /></td>
		</tr>
	</table>
</form>

<br />
<br />
<br />
<br />
<br />
<br />
<br />

<script type="text/javascript">
$(document).ready(function() {

	$("#forgotButton").attr('disabled', 'true');

	$("#pass").keyup(function(){		
		a = $("#pass").val();
		b = $("#pass2").val();

		if (a != b) {
			$("#forgotButton").attr('disabled', 'true');
		}

		if (a == b){
			$("#forgotButton").removeAttr('disabled');
		}
	});

	$("#pass2").keyup(function(){		
		a = $("#pass").val();
		b = $("#pass2").val();

		if (a != b) {
			$("#forgotButton").attr('disabled', 'true');
		}

		if (a == b){
			$("#forgotButton").removeAttr('disabled');
		}
	});

});
</script>
</div>