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
    .admin-menu-icon {
        font-size: 20px;
        width: 24px;
        text-align: center;
    }
    .admin-content {
        flex: 1;
        padding: 40px;
        overflow-y: auto;
    }
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }
    .admin-header h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #4f46e5;
        color: white;
        padding: 12px 24px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    .btn-back:hover {
        background: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
    .search-bar {
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .search-bar input {
        flex: 1;
        padding: 10px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 15px;
    }
    .search-bar button {
        padding: 10px 24px;
        background: #4f46e5;
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .search-bar button:hover {
        background: #4338ca;
    }
    .search-bar a {
        color: #64748b;
        text-decoration: none;
        padding: 10px 16px;
    }
    .alert-success {
        background: #d1fae5;
        color: #065f46;
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border: 1px solid #6ee7b7;
    }
    .data-table {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        overflow-x: auto;
    }
    .data-table table {
        width: 100%;
        border-collapse: collapse;
    }
    .data-table th {
        text-align: left;
        padding: 12px;
        font-weight: 600;
        color: #1e293b;
        border-bottom: 2px solid #e2e8f0;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .data-table td {
        padding: 12px;
        border-bottom: 1px solid #f1f5f9;
        color: #64748b;
    }
    .data-table tr:hover {
        background: #f8fafc;
    }
    .action-btn {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        margin-right: 6px;
    }
    .action-btn.success {
        background: #10b981;
        color: white;
    }
    .action-btn.success:hover {
        background: #059669;
        transform: translateY(-1px);
    }
    .action-btn.warning {
        background: #f59e0b;
        color: white;
    }
    .action-btn.warning:hover {
        background: #d97706;
        transform: translateY(-1px);
    }
    .action-btn.danger {
        background: #ef4444;
        color: white;
    }
    .action-btn.danger:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }
    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge.admin {
        background: #dbeafe;
        color: #1e40af;
    }
    .badge.user {
        background: #e0e7ff;
        color: #4338ca;
    }
    @media (max-width: 968px) {
        .admin-layout {
            flex-direction: column;
        }
        .admin-sidebar {
            width: 100%;
            height: auto;
            position: relative;
            top: 0;
        }
    }
</style>

<div class="admin-layout">
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="admin-sidebar-header">
            <h2>Admin Panel</h2>
        </div>
        
        <div class="admin-menu">
            <a href="{{ route('dashboard') }}" class="admin-menu-item">
                <span class="admin-menu-icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.clients.index') }}" class="admin-menu-item">
                <span class="admin-menu-icon">🏥</span>
                <span>Clients</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="admin-menu-item">
                <span class="admin-menu-icon">✉️</span>
                <span>Messages</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="admin-menu-item active">
                <span class="admin-menu-icon">👥</span>
                <span>Users</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Users Management</h1>
            <a href="{{ route('dashboard') }}" class="btn-back">
                <span>←</span> Back to Dashboard
            </a>
        </div>

        <div class="search-bar">
            <form method="GET" action="{{ route('admin.users.index') }}" style="display:flex;gap:12px;flex:1;align-items:center">
                <input type="search" name="q" placeholder="Search name or email" value="{{ isset($q) ? e($q) : '' }}">
                <button type="submit">🔍 Search</button>
                @if(isset($q) && $q)
                    <a href="{{ route('admin.users.index') }}">Clear</a>
                @endif
            </form>
            <a href="{{ route('admin.users.create') }}" class="action-btn success" style="white-space:nowrap;">➕ Create User</a>
        </div>

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <div class="data-table">
            <table>
                <thead>
                    <tr style="text-align:left;border-bottom:1px solid #e5e7eb">
                        <th style="padding:10px">ID</th>
                        <th style="padding:10px">Name</th>
                        <th style="padding:10px">Email</th>
                        <th style="padding:10px">Admin</th>
                        <th style="padding:10px">Joined</th>
                        <th style="padding:10px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr style="border-bottom:1px solid #f3f4f6">
                        <td style="padding:10px">{{ $u->id }}</td>
                        <td style="padding:10px">{{ $u->name }}</td>
                        <td style="padding:10px">{{ $u->email }}</td>
                        <td style="padding:10px">{{ $u->is_admin ? 'Yes' : 'No' }}</td>
                        <td style="padding:10px">{{ $u->created_at->format('Y-m-d') }}</td>
                        <td style="padding:10px">
                            @if(auth()->id() !== $u->id)
                                <form method="POST" action="{{ route('admin.users.toggleAdmin', $u->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" style="background:{{ $u->is_admin ? '#f59e0b' : '#10b981' }};color:#fff;padding:6px 10px;border-radius:6px;border:none;margin-right:6px">
                                        {{ $u->is_admin ? 'Demote' : 'Promote' }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.users.destroy', $u->id) }}" onsubmit="return confirm('Delete this user?');" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:#ef4444;color:#fff;padding:6px 10px;border-radius:6px;border:none">Delete</button>
                                </form>
                            @else
                                <span style="color:#6b7280">(you)</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top:12px">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
