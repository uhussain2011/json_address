<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(isset($pageTitle)) echo $pageTitle?></title>
  

<link rel="stylesheet" href="../css/bootstrap.css" crossorigin="anonymous">
 <link rel="stylesheet" href="../css/bootstrap.css.map" crossorigin="anonymous">


   <link rel="stylesheet" href="../css/app.css">

   <script src="../js/jquery-3.5.0.js"></script>

<script src="../js/bootstrap.min.js"></script>




</head>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../carfinance/index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
         <a class="nav-link" href="index.php"> Add Addresses </a>
      </li>
    
    
  
    </ul>

  </div>
</nav>



<div class="ajax_msg alert alert-success" style="display:none" id="success-alert"></div>