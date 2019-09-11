@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $blog->title }}</h2>
            <hr>
            <p>{{ $blog->subject }}</p>
            <hr>
            <p>{{ $blog->body }}</p>
        </div>
    </div>
</div> <!-- /container -->
@endsection