@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h1>Login</h1>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }} 
                </div>
            @endif
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label" >Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Passsword">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            
        </div>
    </div>
</div>