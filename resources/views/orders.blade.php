<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Orders</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            /* .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            } */
            /* .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            } */
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    
    @extends('layouts.admin')
    
    @section('content') 
   
        <div class="flex-center position-ref full-height">
       
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                
               
            @endif  
            <center>
         <div class = "col-md-12">
        <div class="btn" style="margin-top: 20px;text-align: right;"> <a href= "/adminadd" >Add Products</a></div>
        <!-- <div class="btn" style="margin-top: 20px;text-align: right;"> <a href= "/orders" >Order Table</a></div> -->
<table class = "table table-hover">
<thead>
<th scope = "col">Image</th>
<th scope = "col">Product Name</th>
<th scope = "col">Product Type</th>
<th scope = "col">Code</th>
<th scope = "col">Description</th>
<th scope = "col">Price</th>
<th scope = "col">Stock</th>
<th scope = "col">Actions</th>

</thead>
<tbody>
	
    extends('layouts.app')

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
<th scope = "col">Unit Price</th>
<th scope = "col">Quantity</th>
<th scope = "col">Subtotal</th>
</thead>
<tbody>
<?php foreach($data3 as $row){?>
<tr class = "table-secondary">
<td><?php echo $row->orderid?></td>
<td><?php echo $row->addr?></td>
<td><?php echo $row->status?></td>
<td><?php echo $row->cname?></td>
<td><?php echo $row->email?></td>
<td><?php echo $row->price?></td>
<td><?php echo $row->qty?></td>
<td><?php echo $row->total?></td>
</tr>
<?php }?>
</tbody>
</table>

</div>
</div>
@endsection
</body>

</html>
			
					
					
				
			
		</tr>

</table>

                  
            </div>
            
           
            @endsection    
            </div>
            </center>
        
    </body>
   
</html>