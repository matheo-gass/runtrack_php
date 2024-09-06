<?php
include("../conn.php");
function insert_student(string $email,string $full_name,string $gender,string $birth_date,int $grade_id):void{
	global $conn;
	$sql=$conn->prepare("insert into student (fullname,email,gender,birthdate,grade_id) values(?,?,?,?,?)");
	$sql->execute([$full_name,$email,$gender,$birth_date,$grade_id]);
};
insert_student("matheo.gass@laplateforme.io","Mathéo Gass","male","2007-01-22","5");
