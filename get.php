<?php
header( "Content-type: text/html; charset=utf-8" );
date_default_timezone_set( PRC );

$post_string = '%7B%22resource_id%22%3A%20%2253747e31-b6e5-4e79-8578-0699a627a798%22%7D';
$remote_server = 'http://data.sjtu.edu.cn/api/3/action/datastore_search';
$context = array(
	'http'=>array(
		'method'=>'POST',
		'header'=>'Authorization: a6c2ce2d-9e11-4be0-9ffb-ffe4966ed9e2',
		'content'=>$post_string 
		)
	);
$stream_context = stream_context_create( $context );
$data = json_decode(file_get_contents( $remote_server, FALSE, $stream_context ), true);
$fire = $data["result"]["records"][0]["fire"];

// echo json_encode( array(
// 	"result" => $fire)
// );
echo $fire;

?>