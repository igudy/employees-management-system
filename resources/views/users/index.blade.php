@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
      <div class="card">

        {{-- Session from usercontroller.php, for successfully created user --}}
        @if(session()->has('message'))
          <div class="alert alert-success">
            {{ session('message') }}
          </div>
        @endif

        <div class="card-body">
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-block">
                    Create
                </a>

                <br>
            <div class="input-group rounded">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
              <span class="input-group-text" id="search-addon">
                <i class="fas fa-search"></i>
              </span>
            </div>
            </div>


            {{-- <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}

            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Username</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row"> {{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              <a href="{{ route('users.edit', $user->id )}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                              <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
      </div>
@endsection