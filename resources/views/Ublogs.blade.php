@extends('layouts.app')
@section('content')
 <div class="container">
<hr>
    <div class="row">
        <div class="col-md-8">
           <form action="{{ route('blogs.update',$blog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{ $blog->user_id }}">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$blog->title}}" required="">
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="{{$blog->subject}}" required="">
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" rows="3" name="body" required="">{{$blog->body}}</textarea>
              </div>
              @isset($blog)
              <div class="form-group">
                <button type="submit" class="btn btn-default">Update</button>
              </div>
              @endisset
            </form>
        </div>
    </div>

</div> <!-- /container -->
@endsection
