<?php


$servername = "www.joymarket.in";
$username = "twinklef_admin";
$pass = "ec2{L]xJzKwI";
$database = "twinklef_joy";

// echo "DB Connection init";

$conn = new mysqli($servername, $username, $pass, $database);


// check db connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}	


// echo "<br> DB Connected successfully...!!!";


$sqlquery = "SELECT * FROM login";
$result = $conn->query($sqlquery);
$result_rows = array();

if($result->num_rows > 0){
	//loop all rows
	while($row = $result->fetch_assoc()){
		$result_rows[] = array('id' => $row["id"], 'name' => $row["name"], 'email' => $row["email"]);

		// echo "id: " . $row["id"]. " Name: " . $row["name"]. " Email: " . $row["email"]. "<br>";
	}
	echo json_encode($result_rows);
}else{
	echo "0 results";
}

$conn->close(); 

?>