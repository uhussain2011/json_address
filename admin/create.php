<?php 
include_once '../class/address.php';

$form_errors = [];
$data = [];

$productsData = $_POST['address'];
$rid = $_POST['rid'];

$applicantstosend = [];

$allproducts = [];
foreach ($productsData as $products) {
$allproducts[] = [
'first_name' => $products['firstname'] ?? '',
'last_name' => $products['lastname'] ?? '',
'phone' => floatval($products['phone']??''),
'email' => $products['email'] ?? ''
];

}




$filePut = (new address)->update($allproducts);

$data = [];
if($filePut === false) {
	$data['success'] = false;
	$data['message'] = 'Something Wrong!';
} else {
	$data['success'] = true;
	$data['message'] = 'Record Saved';
}
echo json_encode($data);exit;














