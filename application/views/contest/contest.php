<!DOCTYPE html>
<html>
<head><title> Contest </title></head>
<body>
<a href="../">Home</a></br /></br />
<a href="/contest/details">Create a new entry</a><br /></br />
<?php
	if(!empty($posts)){ 
		echo "<table>
				<tr><td><a><b>".$lang['name']."</b></a></td>";
		echo "<td><a style='padding-left:5em'><b>".$lang['email']."</a></b></td></tr>";
			foreach($posts as $value){
				echo "<tr>
						<td><a>".$value["name"]."</a></td>";
				echo 	"<td><a style='padding-left:5em'>".$value["email"]."</a></td>";
				echo 	"<td><a href = '../contest/details/".$value["id"]."' style='padding-left:5em'><u>Edit</u></a></td>
					  </tr>";
			}
		echo "</table> <br />";
	}
	else{
		echo "There are no entries currently.";
	}
?>
</body>
</html>
