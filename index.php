<?php
include_once '../includes/header3.php';
include_once 'dbconfig.php';
//include_once($_SERVER['DOCUMENT_ROOT']."/Apps/SystemTools/Application_Framework/Application.php");

?>

<?php

$rid = $_GET['rid'] ?? '1005';


/*VIEW PAGE SELECT STUFF START */

$spc_vehicles = "(select * from auc_adminproduct where rid = '" .$rid. "')";




$spcvehicle = dbquery2("dealerhub", $spc_vehicles);
$display_vehicle = $spcvehicle['RecordSet'] ?? '';


$products['Products'] = [['Name'=>'','NetValue'=>'', 'VatRate' => '']];
$new = true;
if ($spcvehicle['ConnectionInfo']['RecordCount'] > 0) {
	$products = json_decode($display_vehicle[0]['products'], true);
	$new = false;
}

//echo "<pre>"; var_dump($spcvehicle); echo "</pre>"; 
?>

<style>
.error {color:red;}
.hidden {display:none!important;}
</style>


<div class="ajax_msg alert alert-success" style="display:none" id="success-alert"></div>



<form id="add-product">
	<div class="container">

		<div class="card mt-5">
			<div class="card-header">
				<h4>Product(s)</h4>
			</div>

			<div class="card-body">
			<?php foreach($products['Products'] as $k=>$product) { ?>
				<div data-curID="<?=($k==0?count($products['Products'])-1:'')?>" class="mt-3 row multipleRow <?=($k==0?'template':'')?> border" >


				<div class="form-group col-md-4">
				<label>Name</label>
				<small class="name-error error"></small>
				<input type="text" name="product[<?=$k?>][name]" value="<?=$product['Name']?>" class="name form-control">
				</div>

				<div class="form-group col-md-4">
				<label>VAT Rate</label>
				<small class="vatrate-error error"></small>
				<input type="text" name="product[<?=$k?>][vatrate]" value="<?=$product['VatRate']?>" class="vatrate form-control">
				</div>

				<div class="form-group col-md-4">
				<label>Net Value</label>
				<small class="netvalue-error error"></small>
				<input type="text" name="product[<?=$k?>][netvalue]" value="<?=$product['NetValue']?>" class="netvalue form-control">
				</div>

				<button type="button" class="form-control btn btn-info remove-row <?=($k==0?'hidden':'')?>">Remove Row</button>
				</div>
			<?php } ?>
			</div> <!-- card-body -->
			
			<button type="button" class="btn btn-info add-row">+ Product</button>
		</div>

		<input type="hidden" name="rid" value="<?=$rid?>" class="form-control" autocomplete="off">
		<input type="hidden" name="new" value="<?=($new?'1':'0')?>" />

		<div class="form-group">
			<button type="submit" class="btn btn-info"><?=($new?'Submit':'Update')?></button>
			<?php if(!$new) { ?>
			<button class="deleteall-products btn btn-info" data-rid="<?=$rid?>">Delete All</button>
			<?php } ?>
		</div>

	</div>
</form>


<?php include_once '../includes/footer.php';?>