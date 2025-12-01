@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper" style="min-height:60vh; display:flex; align-items:center; justify-content:center;">
        <div class="card form-card" style="max-width:420px; width:100%; padding:28px;">
            <h2 class="form-title">Create Account</h2>

            <form method="POST" action="{{ route('register') }}" class="form">
                @csrf

                <div class="form-group">
                    <label class="sr-only">Name</label>
                    <div class="input-with-icon">
                        <span class="input-icon"></span>
                        <input type="text" name="name" placeholder="Name" required value="{{ old('name') }}" class="input" />
                    </div>
                    @error('name')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="sr-only">Email</label>
                    <div class="input-with-icon">
                        <span class="input-icon"></span>
                        <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}" class="input" />
                    </div>
                    @error('email')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="sr-only">Password</label>
                    <div class="input-with-icon">
                        <span class="input-icon"></span>
                        <input type="password" name="password" placeholder="Password" required class="input" />
                    </div>
                    @error('password')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="sr-only">Confirm Password</label>
                    <div class="input-with-icon">
                        <span class="input-icon"></span>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="input" />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Register</button>
                </div>
            </form>

            <p class="muted" style="margin-top:12px">Already have an account? <a href="{{ route('login') }}" class="muted-link">Login</a></p>
        </div>
    </div>
</div>
@endsection
