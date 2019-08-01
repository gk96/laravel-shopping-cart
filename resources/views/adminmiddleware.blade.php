<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>

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
	@foreach($data as $r)
		<tr>
			<td><img src="{{ URL::to('/') }}/{{ $r->img }}" class="img-thumbnail" width="75" /></td>
			<td>{{ $r->name }}</td>
			<td>{{ $r->type }}</td>
            <td>{{ $r->code }}</td>
            <td>{{ $r->desc }}</td>
            <td>{{ $r->price }}</td>

            <td>{{ $r->stock }}</td>
           
			<td>
            <form action="\prodel" method="POST">
            <input type="submit" name="btn" value="Delete" class="btn-danger" >
            @csrf
            <input type="hidden" name="id" value="{{$r->id}}">
            </form>
            </td>

            <td>
            <form action="\proedit" method="POST">
            <input type="submit" name="btn" value="Edit" class="btn-success" >
            @csrf
            <input type="hidden" name="id" value="{{$r->id}}">
            </form>
            <!-- <a href="" class="btn btn-primary">Show</a> -->
            </td>
			
					
					
				
			
		</tr>
	@endforeach
</table>

                  
            </div>
            
           
            @endsection    
            </div>
            </center>
        
    </body>
   
</html>