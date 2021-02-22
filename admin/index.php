<?php
$pageTitle = "Address";
include_once '../includes/header.php';

include_once '../class/address.php';



?>

<?php

$rid = $_GET['rid'] ?? '1005';

$addresses = (new address)->getAll();

$rowCount = count($addresses);
if ($rowCount == 0) {
	$addresses = [['first_name'=>'','last_name'=>'', 'phone' => '', 'email' => '']];	
}


?>

<style>
.error {color:red;}
.hidden {display:none!important;}
</style>


<div class="ajax_msg alert alert-success" style="display:none" id="success-alert"></div>



<form id="add-address">
	<div class="container">

		<div class="card mt-5">
			<div class="card-header">
				<h4>Address Book</h4>
			</div>

			<div class="card-body">
			<?php foreach($addresses as $k=>$address) { 


				?>
				<div data-curID="<?=($k==0?count($addresses['addresses'])-1:'')?>" class="mt-3 row multipleRow <?=($k==0?'template':'')?> border" >


				<div class="form-group col-md-3">
				<label>First Name</label>
				<small class="firstname-error error"></small>
				<input type="text" name="address[<?=$k?>][firstname]" value="<?=$address['first_name']?>" placeholder="Enter First Name" class="firstname form-control">
				</div>

				<div class="form-group col-md-3">
				<label>Last Name</label>
				<small class="lastname-error error"></small>
				<input type="text" name="address[<?=$k?>][lastname]" value="<?=$address['last_name']?>" placeholder="Enter Last name" class="lastname form-control">
				</div>

				<div class="form-group col-md-3">
				<label>Phone</label>
				<small class="phone-error error"></small>
				<input type="text" name="address[<?=$k?>][phone]" value="<?=$address['phone']?>" placeholder="Enter Phone number" class="phone form-control">
				</div>

				<div class="form-group col-md-3">
				<label>Email</label>
				<small class="email-error error"></small>
				<input type="text" name="address[<?=$k?>][email]" value="<?=$address['email']?>" placeholder="Enter Email" class="email form-control">
				</div>



			

				<button type="button" class="form-control btn btn-info remove-row <?=($k==0?'hidden':'')?>">Remove Row</button>



				</div>
			<?php } ?>
			</div> <!-- card-body -->
			
			<button type="button" class="btn btn-info add-row">+ New Address</button>
		</div>

		<input type="hidden" name="rid" value="<?=$rid?>" class="form-control" autocomplete="off">
		
		<div class="form-group">
			<button type="submit" class="btn btn-info">Submit</button>
			<?php if($rowCount > 0) { ?>
			<button class="deleteall-addresses btn btn-info" data-rid="<?=$rid?>">Delete All</button>
			<?php } ?>
		</div>

	</div>
</form>


<?php include_once '../includes/footer.php';?>