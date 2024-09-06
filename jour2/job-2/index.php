<?php
include("../conn.php");
//$conn=new PDO("mysql:host=localhost;dbname=lp_official;charset=utf8","lpf","lpf");
function find_all_students():array{
	global $conn;
	$sql=$conn->prepare("select * from student");
	$sql->execute();
	return $sql->fetchAll();
}
echo"
<table border=1><tr>
<th>Étudiant</th>
<th>Genre</th>
<th>Date de naissance</th>
<th>Année d'études</th>
<th>e-mail</th></tr>
";
$students=find_all_students();

$months=array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
foreach($students as &$student){
	echo"<tr><td>".$student["fullname"]."</td>";
	$gender="";
	if($student["gender"]=="male"){
		$gender="Homme";
	}else{
		$gender="Femme";
	};
	echo"<td>".$gender."</td>";
	$bd_vals=explode("-",$student["birthdate"]);
	echo"<td>".$bd_vals[2]." ".$months[intval($bd_vals[1])-1]." ".$bd_vals[0]."</td>";
	$state="";
	$sql=$conn->prepare("select name from grade where id = ?");
	$sql->execute([$student["grade_id"]]);
	$state=$sql->fetch()["name"];
	echo"<td>".$state."</td>";
	echo"<td><a href=mailto:".$student["email"].">".$student["email"]."</a></td>";
	echo"</td>";
}
echo"</table>";
