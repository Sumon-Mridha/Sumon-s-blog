@extends('layouts.app')
@section('content')
<div class="jumbotron">
    <div class="container">
        <center>
            <h1 class="display-3">Welcome to Sumon's Bolg</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </center>
    </div>
</div>
 <div class="container">
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4">
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->subject }}</p>
            <p><a class="btn btn-secondary" href="{{ route('blogs.show',$blog->id) }}" role="button">View details &raquo;</a></p>
        </div>
        @endforeach
    </div>
    <hr>
</div> <!-- /container -->
@endsection



     
