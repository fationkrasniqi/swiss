@extends('layouts.app')

@section('content')
<div class="container main-inner" style="padding-top:24px;padding-bottom:24px;">
    <div class="page-header"><h2 style="margin:0;font-size:1.25rem;font-weight:700">Contact Admin</h2></div>

    @if(session('status'))
        <div class="flash flash-success">{{ session('status') }}</div>
    @endif

    <div class="card form-card" style="max-width:700px;margin:0 auto">
        <h3 class="form-title">Tell us about your company</h3>
        <form method="POST" action="{{ route('contact.store') }}" class="form">
            @csrf
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="input" />
                @error('first_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="input" />
                @error('last_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="input" />
                @error('email')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Message about your company</label>
                <textarea name="message" rows="6" class="input" style="height:auto">{{ old('message') }}</textarea>
                @error('message')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary">Send to Admin</button>
            </div>
        </form>
    </div>
</div>
@endsection
