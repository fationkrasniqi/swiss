@extends('layouts.app')

@section('content')
<style>
    .admin-layout {
        display: flex;
        min-height: calc(100vh - 80px);
        background: #f8fafc;
    }
    .admin-sidebar {
        width: 280px;
        background: white;
        border-right: 1px solid #e2e8f0;
        padding: 30px 0;
        position: sticky;
        top: 80px;
        height: calc(100vh - 80px);
        overflow-y: auto;
    }
    .admin-sidebar-header {
        padding: 0 25px 25px;
        border-bottom: 1px solid #e2e8f0;
    }
    .admin-sidebar-header h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
    }
    .admin-menu {
        padding: 20px 0;
    }
    .admin-menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 25px;
        color: #64748b;
        text-decoration: none;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
    }
    .admin-menu-item:hover {
        background: #f8fafc;
        color: #1e293b;
        border-left-color: #e2e8f0;
    }
    .admin-menu-item.active {
        background: #f1f5f9;
        color: #4f46e5;
        border-left-color: #4f46e5;
        font-weight: 600;
    }
    .admin-content {
        flex: 1;
        padding: 30px 40px;
        overflow-y: auto;
    }
    .page-header {
        margin-bottom: 30px;
    }
    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 8px 0;
    }
    .page-subtitle {
        font-size: 15px;
        color: #64748b;
        margin: 0;
    }
    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        padding: 30px;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 8px;
        font-size: 14px;
    }
    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.2s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
    }
    .form-check {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 0;
    }
    .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    .form-check-label {
        font-size: 15px;
        color: #1e293b;
        cursor: pointer;
    }
    .btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        display: inline-block;
    }
    .btn-primary {
        background: #4f46e5;
        color: white;
    }
    .btn-primary:hover {
        background: #4338ca;
    }
    .btn-secondary {
        background: #e2e8f0;
        color: #1e293b;
    }
    .btn-secondary:hover {
        background: #cbd5e1;
    }
    .form-buttons {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }
    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }
    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }
    .help-text {
        font-size: 13px;
        color: #64748b;
        margin-top: 6px;
    }
</style>

<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        <nav class="admin-menu">
            <a href="{{ route('admin.clients.index') }}" class="admin-menu-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Clients
            </a>
            <a href="{{ route('admin.users.index') }}" class="admin-menu-item active">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Users
            </a>
            <a href="{{ route('admin.messages.index') }}" class="admin-menu-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                Messages
            </a>
            <a href="{{ route('admin.cantons.index') }}" class="admin-menu-item">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                Cantons
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="admin-content">
        <div class="page-header">
            <h1 class="page-title">Create New User</h1>
            <p class="page-subtitle">Add a new user to the system</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following errors:</strong>
                <ul style="margin: 8px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <p class="help-text">Minimum 8 characters</p>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" id="is_admin" name="is_admin" class="form-check-input" value="1" {{ old('is_admin') ? 'checked' : '' }}>
                        <label for="is_admin" class="form-check-label">Make this user an admin</label>
                    </div>
                    <p class="help-text">Admins have access to all admin features</p>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Create User</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
