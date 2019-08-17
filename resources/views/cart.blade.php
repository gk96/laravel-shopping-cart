<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>


@extends('layouts.app')

@section('content')

<center>
  <?php
  if(count($myitems)==0)
  {
  ?>
  <h3>Cart is Empty</h3>
  <img style = "width: 320px; height: 300px;" src="/images/cartempty.jpg">
  <br><br>
  <a href="{{ url('/menu') }}" class="btn-success" >Continue Shopping</a> 
  <?php }
  else
  {
    ?>
<h3>My Cart</h3>
<div class = "col-md-8">

<table class = "table table-hover">
<thead>
<th scope = "col"></th>
<th scope = "col">Product Name</th>
<th scope = "col">Product Type</th>
<th scope = "col">Description</th>
<th scope = "col">Price</th>
<th scope = "col">Quantity</th>
<th scope = "col">Subtotal</th>
<th scope = "col">Actions</td>
</thead>
<tbody>
<?php $total = 0;
foreach($myitems as $result) {?>

<tr class="table-secondary">
<td><img src="{{ URL::to('/') }}/{{ $result->img }}" class="img-thumbnail" width="75" /></td>
<td><?php echo $result->product_name?></td>
<td><?php echo $result->type?></td>
<td><?php echo $result->description?></td>
<td><?php echo $result->price?></td>
<td><?php echo $result->qty?></td>
<td><?php echo $result->subtotal?></td>
<td>
<form action="\deletecart" method="POST">
<input type="submit" name="btn" value="Remove" class="btn-danger" >
@csrf
<input type="hidden" name="id" value="{{$result->id}}">
<input type="hidden" name="uid" value="{{$result->userid}}">
</form>
</td>
</tr>

<?php 
$total = $total+$result->subtotal;
}?>
<tr class = "table-secondary">
<td colspan = "6" style = "text-align: right;">Total = <?php echo $total?></td>
</tr>


</tbody>

</table>
<form action="/checkout" method="POST">
<input type="submit" name="btn" value="Checkout" class="btn-success" >
@csrf
<input type="hidden" name="id" value="{{ Auth::user()->id }}">
</form>
<br><br>
<a href="{{ url('/menu') }}" class="btn-success" >Continue Shopping</a>

</div> 
<?php
  } 
?>
</center>
  @endsection
