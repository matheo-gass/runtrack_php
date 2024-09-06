<?php
include("../conn.php");
$rooms_ids=array();
$sql=$conn->prepare("select * from grade");
$sql->execute();
$fgrades=array();
$grades=$sql->fetchAll();
foreach($grades as &$grade){
	$tp=array(
	"id"=>$grade["id"],
	"room_id"=>$grade["room_id"]
	);
	array_push($fgrades,$tp);
}
echo json_encode($fgrades);
function find_full_rooms(){
	global $conn;
	$res=array();
	$sql=$conn->prepare("select * from room");
	$sql->execute();
	$rooms=$sql->fetchAll();
	foreach($rooms as &$room){
		$sql=$conn->prepare("select * from student where grade_id = ?");
		$sql->execute([$room["id"]]);
		$tp=array(
			"name"=>$room["name"],
			"capacity"=>$room["capacity"],
			"is_full"=>"f"
		);
		array_push($res,$tp);
	};
	return $res;
}
$rooms=find_full_rooms();
echo"<table border=1><tr><th>Salle</th><th>Capacité</th><th>Pleine</th></tr>";
foreach($rooms as &$room){
	echo"<tr>";
	echo"<td>".$room["name"]."</td>";
	echo"<td>".$room["capacity"]."</td>";
	echo"<td>".$room["is_full"]."</td>";
	echo"</td>";
}
