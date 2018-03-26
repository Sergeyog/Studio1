<?php 
if (isset($_POST["action"]))
{
	if ($_POST["action"]=="fetch")
	{
		$folder=array_filter(glob('Users/*'), 'is_dir');
		$output='
			<table class="table table-bordered table-striped">
				<tr>
				<th>Folder Name</th>
				<th>Total File</th>
				</tr>
		';

		if (count($folder)>0) 
		{
			foreach ($folder as $name) 
			{
				$output .='
					<tr>
						<td><button type="button" name="view_files" data-name="'.$name.'" class="view_files btn btn-default btn-xs">'.basename($name).'</button></td>
						<td>'.(count(scandir($name))-2).'</td>
					</tr>
				';
			}
		}
		else
		{
			$output .='
				<tr>
				<td colspan="6">No Folder Found</td>
				</tr>
			';
		}

		$output .='</table>';

		echo $output;
	}

	if ($_POST["action"]=="fetch_files") 
	{
		$file_data = scandir($_POST["folder_name"]);
		$output = '
			<table class="table table-bordered table-striped">
				<tr>
					<th>File List For '.basename($_POST["folder_name"]).'</th>
				</tr>
			
		';
		foreach ($file_data as $file) {
			if ($file === '.' OR $file ==='..') 
			{
				continue;
			}
			else
			{
				//$path = $_POST["#folder_name"] . '/' . $file;
				$output .='
				<tr>
				<td>'.$file.'</td>
				</tr>
				';	
			}
		}
			$output .='</table>';
			echo $output;
	}
}
 ?>