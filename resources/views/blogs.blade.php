@extends('layouts.app')
@section('content')
 <div class="container">

    <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Subject</th>
                <th scope="col">Created</th>
                <th colspan="2" scope="col"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
              <tr>
                <th scope="row">{{ $loop->index+1 }}</th>
                <td><a href="{{ route('blogs.show',$blog->id) }}" role="button">{{ $blog->title }}</a></td>
                <td>{{ $blog->subject }}</td>
                <td>{{ $blog->created_at }}</td>
                <td>
                  <form action="{{ route('blogs.edit',$blog->id) }} " method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </td>
                <td>
                  <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <hr>
        </div>
    </div>

</div> <!-- /container -->
@endsection
