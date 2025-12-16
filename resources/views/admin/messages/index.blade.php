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
    }
    .action-btn.danger {
        background: #ef4444;
        color: white;
    }
    .action-btn.danger:hover {
        background: #dc2626;
        transform: translateY(-1px);
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
            <a href="{{ route('admin.messages.index') }}" class="admin-menu-item active">
                <span class="admin-menu-icon">✉️</span>
                <span>Messages</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="admin-menu-item">
                <span class="admin-menu-icon">👥</span>
                <span>Users</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <div class="admin-header">
            <h1>Messages Management</h1>
            <a href="{{ route('dashboard') }}" class="btn-back">
                <span>←</span> Back to Dashboard
            </a>
        </div>

        @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
        @endif

        <div class="data-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>From</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Received</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td><strong>{{ $m->first_name }} {{ $m->last_name }}</strong></td>
                        <td>{{ $m->email }}</td>
                        <td style="max-width:600px">{{ Str::limit($m->message, 200) }}</td>
                        <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.messages.destroy', $m->id) }}" onsubmit="return confirm('Delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn danger">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="margin-top:20px">{{ $messages->links() }}</div>
        </div>
    </div>
</div>
@endsection
