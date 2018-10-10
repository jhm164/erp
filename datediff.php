<?php

$v= time();
$b=strtotime("2018-10-10");
$c= $b-$v;
//echo $c/(60*60*24);
	           $conn=mysqli_connect("localhost","root","","erp");
	if (!$conn) {
		echo mysql_error();
	}
	$sql="select * from oppintmets";
	$result=mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result))
		{
			$datediff=strtotime($row['date'])-time();
			$res= $datediff/(60*60*24);
		//	echo $res.'\r';
			if ($res<=0) {
				echo "miss/n";
			}else if ($res>=0&&$res<=2) {
				echo "comming/n";
			}else{
				echo "futuer";
			}
		}
?>
