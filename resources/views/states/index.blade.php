@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">State</h1>
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
            {{-- Search Bar --}}
            <form method="GET" action="{{ route('states.index') }}">
              <div class="input-group rounded">
                <input type="search" name="search" class="form-control rounded" placeholder="Search Country" aria-label="Search" aria-describedby="search-addon" />
                  <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          {{-- End of Search --}}
          <br>

                <a href="{{ route('states.create') }}" class="btn btn-primary btn-block">
                    Create
                </a>
                <br>
          </div>

          {{-- Table Responsive --}}
            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Country ID</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($states as $state)
                        <tr>
                            <td scope="row"> {{ $state->country->country_id }}</td>
                            <td>{{ $state->name }}</td>
                            <td>
                              <a href="{{ route('states.edit', $state->id )}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                              <form method="POST" action="{{ route('states.destroy', $state->id) }}">
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