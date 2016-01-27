<!DOCTYPE html>
<html>
<head>
	<title>jQuery upload</title>
	<script src="js/jquery.js"></script>
</head>
<body>
	 <form method="get" action="" id="form">
	 	<tr>
	 		<td><label for="id">Input id</label></td>
	 		<td><input type="text" name="id" id="id" /></td>
	 	</tr>
	 	<tr>
	 		<td>&nbsp;</td>
	 		<td><input type="submit" name="submit" id="submit" value="Submit" /></td>
	 	</tr>
	 </form>
	 <div>
	 	<table id="display" border="1"> 
	 	</table>
<script>
	$(document).ready(function () {
		$('#id').val('');
		$('#form').submit(function (evt) {
			evt.preventDefault();
			var id = $('#id').val();
			if (id != "") {

				$.ajax({
					url : 'todo-complete.php',
					type : 'GET',
					contentType : 'json',
					success : function(data,status,xhr) {
						var result = JSON.parse(data);
						var append = "";
						
						$.each(result,function (index, value ){
							append += 
								'<tr>' +
									'<td>' + value.dressid + '</td>' +
									'<td>' + value.dressname + '</td>' +
								'</tr>'
						});
						$('#display').append(append);
					}
				});
			}else {
				alert("Please provide id to be searchec");
			}
		});
	});
</script>
</body>
</html>