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















//die();
/*
$applicantstosend = [
'Products' => $allproducts
];


$overview_encoded = json_encode($applicantstosend);


echo "<pre>";
var_dump($overview_encoded);
echo "</pre>";


if($new==1) {
//INSERT QUERY
$sql = "INSERT INTO auc_adminproduct (rid, products) VALUES (:rid, :products)";
} else {
//UPDATE QUERY
$sql = "UPDATE auc_adminproduct SET products=:products WHERE rid=:rid";
}


$stmt= $db->prepare($sql);
$successcheck = $stmt->execute(['rid' => $rid, 'products' => $overview_encoded]);






if ($successcheck) {

$data['success'] = true;
$data['message'] = $new==1?"Record Created":"Record Update";
} else {
	$data['success'] = false;
$data['message'] = $new==1?"DB INSERT ERROR: auc_adminproduct":"DB Update Error";



}










echo json_encode($data);

*/