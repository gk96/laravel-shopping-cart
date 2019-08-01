<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

@extends('layouts.app')

@section('content')


<div class = "col-md-8">

<table class = "table table-hover">
<thead>
<th scope = "col">Image</th>
<th scope = "col">Product Name</th>
<th scope = "col">Product Type</th>
<th scope = "col">Code</th>
<th scope = "col">Description</th>
<th scope = "col">Price</th>
<th scope = "col">Stock</th>

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
            <a href="" class="btn btn-primary">Show</a>
            </td>
			
					
					
				
			
		</tr>
	@endforeach
</table>

@endsection