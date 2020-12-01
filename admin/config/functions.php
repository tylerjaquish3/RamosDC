<?php
date_default_timezone_set('America/Los_Angeles');

function loadStates()
{
	echo '<option value="" disabled selected>Select state</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>';
}

function checkIfSet($variable)
{
	if(isset($variable)){
		return escape($variable);
	}
	else{
		return null;
	}
}

//escapes all foreign characters from user's input
function escape($str)
{
	$search=array("\\","\0","\n","\r","\x1a","'",'"');
	$replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
	return str_replace($search,$replace,$str);
}

function rand_str($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890') 
{
	$chars_length = (strlen($chars) - 1); // Length of character list
	$string = $chars[rand(0, $chars_length)]; // Start our string
	for ($i = 1; $i < $length; $i = strlen($string)) { // Generate random string
		$r = $chars[rand(0, $chars_length)]; // Grab a random character from our list
		$string .=  $r; // Make sure the same two characters don’t appear next to each other
	}

	return $string;
}

function contentQuery($table, $whereClause) 
{
	include 'datalogin.php';

	$sql = "SELECT * FROM ".$table." WHERE ".$whereClause." LIMIT 1";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		return $row['content_text'];
	}
}

function checklistQuery($table, $start, $stop) 
{
	include 'datalogin.php';

	$sql = "SELECT * FROM ".$table." WHERE id >= ".$start." AND id <= ".$stop;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		echo "<li>".$row['content_text']."</li>";
	}
}

function treatmentQuery($table, $id)
{
	include 'datalogin.php';

	$sql = "SELECT * FROM ".$table;
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		if($row[0] == $id) {
			return $row['content_text'];
		}
	}
}

function hoursQuery($id)
{
	include 'datalogin.php';

	$sql = "SELECT * FROM office_hours";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		if($row[0] == $id) {
			return $row['content_text'];
		}
	}
}

function getUser($id)
{
	include 'datalogin.php';

	$sql = "SELECT * FROM admin WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		return $row['fullname'];
	}
}

function getUserActivity($id)
{
	include 'datalogin.php';

	$sql = "SELECT * FROM admin WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		$date = date_create($row['updated_at']);
	}

	return date_format($date, 'M j, Y g:i A');
}

?>
