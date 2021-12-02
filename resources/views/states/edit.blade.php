@extends('layouts.main')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update</h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Update State - Form') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('states.update', $state->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>

                                    <select name="country_id" class="form-select" aria-label="Default select menu">
                                        <option selected>Open this select menu</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ $country->id = $state->country_id ? 'selected' : ''}}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $state->name) }}" required >

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update State') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-block btn-danger">Delete
                            <span>
                                {{ $state->name }}
                            </span>
                        </button>
                        </form>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection