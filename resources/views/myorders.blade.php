<html>


<body>
@extends('layouts.app')

@section('content')
<div class = "container">
<div class = "col-md-12">
<h3>Order Details</h3>
<?php $tot=0; ?>
<table class = "table table-hover">
<thead>
<th scope = "col">Order ID</th>
<th scope = "col">Shipping Address</th>
<th scope = "col">Order Status</th>
<th scope = "col">Customer Name</th>
<th scope = "col">Email</th>
</thead>
<tbody>
<?php foreach($orders as $row){?>
<tr class = "table-secondary">
<td><?php echo $row->id?></td>
<td><?php echo $row->addr?></td>
<td><?php echo $row->status?></td>
<td><?php echo $row->cname?></td>
<td><?php echo $row->email?></td>
</tr>
<?php }?>
</tbody>
</table>
<h3>Item Details</h3>
<table class = "table table-hover">
<thead>
<th scope = "col">Product ID</th>
<th scope = "col">Order ID</th>
<th scope = "col">Unit Price</th>
<th scope = "col">Quantity</th>
<th scope = "col">Subtotal</th>
</thead>
<tbody>
<?php foreach($orders as $row){?>
<tr class = "table-secondary">
<td><?php echo $row->productid?></td>
<td><?php echo $row->id?></td>
<td><?php echo $row->price?></td>
<td><?php echo $row->qty?></td>
<td><?php echo $row->total?></td>
</tr>
<tr>
<td><?php $tot=$tot+$row->total;?></td>
</tr>
<?php }?>
<tr>
<td></td>
<td></td>
<td></td><td>Grand Total:</td>
<td>
<?php echo $tot;?></td>
</tr>
</tbody>
</table>
</div>
</div>
@endsection
</body>

</html>