@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-wrapper" style="min-height:60vh; display:flex; align-items:center; justify-content:center;">
        <div class="card form-card" style="max-width:420px; width:100%; padding:28px;">
            <h2 class="form-title">Sign In</h2>

            @if (session('status'))
                <div class="flash flash-success">{{ session('status') }}</div>
            @endif

            @if($errors->any())
                <div class="form-error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf

                <div class="form-group">
                    <div class="input-with-icon">
                        <span class="input-icon">📧</span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email" class="input" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-with-icon">
                        <span class="input-icon">🔒</span>
                        <input id="password" type="password" name="password" required placeholder="Password" class="input" />
                    </div>
                </div>

                <div class="form-group" style="display:flex;align-items:center;justify-content:space-between">
                    <label style="display:flex;align-items:center;gap:8px"><input type="checkbox" name="remember"> <span class="muted">Remember me</span></label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="muted-link">Forgot your password?</a>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
