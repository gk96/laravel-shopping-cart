<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>


@extends('layouts.app')
@section('content')
<br>
<div class="container-fixed">
<div class="row" style = "margin-left:20px;"> 
@foreach($data as $result)
<div class="card col-md-3" style = "margin-top: 30px;">
<div class="card-body">
<h5 class="card-title">{{$result->name}}</h5>
<h6 class="card-subtitle text-muted">{{$result->type}}</h6>
</div>
<center>
<img style = "width: 220px; height: 300px;" src="{{ $result->img }}" alt = "watch">
</center>
<div class="card-body">
<p class="card-text">{{$result->desc}}</p>
@if($result->stock > 0)
<p class="card-text" style = "color: green;"><strong>In Stock.</strong></p>

@else
<p class="card-text" style = "color: red;"><strong>Out of Stock.</strong></p>
@endif
<p class="card-text"><h3><strong> Rs. {{$result->price}}</strong></h3></p>
@if($result->stock > 0)
<a href="/product?pid={{$result->id}}" class="btn btn-primary">View</a>
@else
<a href="#" class="btn btn-primary" disabled>View</a>
@endif
</div>
</div>
@endforeach
</div>
</div>
  @endsection
