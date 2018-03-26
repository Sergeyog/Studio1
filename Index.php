<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User's List</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h2 align="center">List Folder</h2>
		<div align="left" class="col-md-6">
			<div id="table_left" class="table-responsive">
				
			</div>
		</div>
		<div align="right" class="col-md-6">
			<div id="table_right" class="table-responsive">
				
			</div>
		</div>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){

		load_folder_list();

		function load_folder_list(){
			var action = "fetch";
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{action:action},
				success:function(data){
					$('#table_left').html(data);
				}
			})
		}

		$(document).on('click','.view_files', function(){
			var folder_name = $(this).data("name");
			var action = "fetch_files";

			$.ajax({
				url:"action.php",
				method:"POST",
				data:{action:action, folder_name:folder_name},
				success:function(data)
				{
					$('#table_right').html(data);
				}
			})
		});
	});
</script>