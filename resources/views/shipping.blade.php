<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
@extends('layouts.app')

@section('content')
<center>
<h3>Shipping Details</h3>
<div class="col-md-6">
<form action="/confirm" method = "POST">
@csrf
<input type="hidden" name="userID" value="{{ Auth::user()->id }}">
<?php foreach($myitems as $row){?>
<input type="hidden" name="productID" value="<?php echo $row['id']?>">
<input type="hidden" name="price" value="<?php echo $row['price']?>">
<input type="hidden" name="quantity" value="<?php echo $row['quantity']?>">
<input type="hidden" name="subtotal" value="<?php echo $row['subtotal']?>">
<?php } ?>
<?php foreach($usr as $r){?>
    <label for="name">Name :</label>
    <input type="text" name="name" value="<?php echo $r['name']?>">
    
    <br><br>
    <label for="email">Email :</label>
    <input type="text" name="email" value="<?php echo $r['email']?>">
    
    <br>
<?php }?>
<label for="txtshipaddress">Shipping Address</label>
<textarea rows="4" class = "form-control" name = "shippingaddress" placeholder = "Enter Shipping Address"></textarea>
<input type = "submit" name ='btnorderconfirm' class = "btn btn-success" value = "Place Order">
</form>
</center>
@endsection
</div>
</body>


</html>
