<?php
include("../conn.php");
$sql=$conn->prepare("select name from grade");
$sql->execute();
$grades=$sql->fetchAll();
function find_all_student_grades(){
	global $conn;
	global $grades;
	$sql=$conn->prepare("select email,fullname,grade_id from student");
	$sql->execute();
	$res=$sql->fetchAll();
	$fres=array();
	foreach($res as &$r){
		$tp=array(
		"email"=>$r["email"],
		"fullname"=>$r["fullname"],
		"grade_name"=>$grades[intval($r["grade_id"])-1]["name"]
		);
		array_push($fres,$tp);
	}
	return $fres;
}
$students=find_all_student_grades();
echo"<table border=1><tr><th>Étudiant</th><th>e-mail</th><th>Études</th></tr>";
foreach($students as &$student){
	echo"<tr>";
	echo"<td>".$student["fullname"]."</td>";
	echo"<td>".$student["email"]."</td>";
	echo"<td>".$student["grade_name"]."</td>";
	echo"</tr>";
};
