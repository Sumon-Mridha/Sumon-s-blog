@extends('layouts.app')
@section('content')
 <div class="container">

    <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Sex</th>
                <th scope="col">Phone</th>
                <th scope="col">Age</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Added to System</th>
                <th colspan="2" scope="col"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $loop->index+1 }}</th>
                <td><a href="{{ route('admin.show',$user->id) }}" role="button">{{ $user->name }}</a></td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                  <form action="{{ route('admin.edit',$user->id) }} " method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </td>
                <td>
                  <form action="{{ route('admin.destroy',$user->id) }}" method="POST">
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
