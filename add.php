<?php
header( "Content-type: text/html; charset=utf-8" );
date_default_timezone_set( PRC );

$fire = $_POST['fire'];

$post_string = '%7B%22records%22%3A%20%5B%7B%22ID%22%3A%201%2C%20%22fire%22%3A%20'.$fire.'%7D%5D%2C%20%22force%22%3A%20true%2C%20%22method%22%3A%20%22update%22%2C%20%22resource_id%22%3A%20%2253747e31-b6e5-4e79-8578-0699a627a798%22%7D';
$remote_server = 'http://data.sjtu.edu.cn/api/3/action/datastore_upsert';
$context = array(
	'http'=>array(
		'method'=>'POST',
		'header'=>'Authorization: a6c2ce2d-9e11-4be0-9ffb-ffe4966ed9e2',
		'content'=>$post_string 
		)
	);
$stream_context = stream_context_create( $context );
$data = file_get_contents( $remote_server, FALSE, $stream_context );

echo json_encode( array(
		"result" => "200")
);

?>