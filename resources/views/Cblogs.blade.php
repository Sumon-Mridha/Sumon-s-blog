@extends('layouts.app')
@section('content')
 <div class="container">
<hr>
    <div class="row">
        <div class="col-md-8">
           <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" required="">
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" required="">
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" rows="3" name="body" required=""></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default">Post</button>
              </div>
            </form>
        </div>
    </div>

</div> <!-- /container -->
@endsection
