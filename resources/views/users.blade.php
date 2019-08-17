<!doctype html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users</title>

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

<
<div class = "container">
<div class = "col-md-12">
<h3>Registered Users</h3>
<?php $tot=0; ?>
<table class = "table table-hover">
<thead>

<th scope = "col">Name</th>
<th scope = "col">Email</th>
<th scope = "col">Type</th>

</thead>
<tbody>
<?php foreach($data as $row){?>
<tr class = "table-secondary">

<td><?php echo $row->name?></td>
<td><?php echo $row->email?></td>
<td><?php echo $row->type?></td>
@if($row->type == 'member')
<!-- <td><a class="btn-danger" href="/deluser?id=">Delete</a></td> -->
@endif
</tr>
<?php }?>


</div>
</div>
@endsection
</body>

</html>
</tr>

</table>

                  
            
					
					
				
			
		