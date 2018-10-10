<?php

class connection{
var $conn;
var $select="SELECT * FROM  `oppintmets` ";
	function connect(){
	$conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	echo "success";
	$this->conn=$conn;
return $conn;

	}



function select(){

$result = mysqli_query($this->conn, $this->select);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"];
    }
} else {
    echo "0 results";
}

}

}






function insert($date,$details){

$sql="insert into oppintmets(id,date,today,daysleft,details) values(null,'$date',now(),,'$details')";
	if (mysqli_query($this->conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
}




$c=new connection;
$c->connect();
 //echo $c->conn;
 $c->select();

?>