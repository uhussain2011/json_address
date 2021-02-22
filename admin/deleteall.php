<?php 

include_once '../class/address.php';

$form_errors = [];
$data = [];

$rid = $_POST['rid'];


$filePut = (new address)->deleteAll();

$data = [];
if($filePut === false) {
	$data['success'] = false;
	$data['message'] = 'Something Wrong!';
} else {
	$data['success'] = true;
	$data['message'] = 'Records Deleted';
}
echo json_encode($data);exit;