@extends('layouts.app')

@section('content')
<style>
    .dashboard-layout {
        display: flex;
        min-height: calc(100vh - 80px);
        background: #f8fafc;
    }
    .sidebar {
        width: 280px;
        background: white;
        border-right: 1px solid #e2e8f0;
        padding: 30px 0;
        position: sticky;
        top: 80px;
        height: calc(100vh - 80px);
        overflow-y: auto;
    }
    .sidebar-header {
        padding: 0 25px 25px;
        border-bottom: 1px solid #e2e8f0;
    }
    .sidebar-header h2 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
    }
    .sidebar-header p {
        margin: 5px 0 0 0;
        font-size: 13px;
        color: #64748b;
    }
    .sidebar-menu {
        padding: 20px 0;
    }
    .menu-section {
        margin-bottom: 25px;
    }
    .menu-section-title {
        padding: 0 25px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #94a3b8;
        margin-bottom: 8px;
    }
    .menu-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 25px;
        color: #64748b;
        text-decoration: none;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
        cursor: pointer;
    }
    .menu-item:hover {
        background: #f8fafc;
        color: #1e293b;
        border-left-color: #e2e8f0;
    }
    .menu-item.active {
        background: #f1f5f9;
        color: #4f46e5;
        border-left-color: #4f46e5;
        font-weight: 600;
    }
    .menu-icon {
        font-size: 20px;
        width: 24px;
        text-align: center;
    }
    .menu-badge {
        margin-left: auto;
        background: #ef4444;
        color: white;
        padding: 2px 8px;
        border-radius: 10px;
        font-size: 11px;
        font-weight: 700;
    }
    .dashboard-content {
        flex: 1;
        padding: 40px;
        overflow-y: auto;
    }
    .content-section {
        display: none;
    }
    .content-section.active {
        display: block;
    }
    .section-header {
        margin-bottom: 30px;
    }
    .section-header h1 {
        margin: 0;
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
    }
    .section-header p {
        margin: 8px 0 0 0;
        color: #64748b;
        font-size: 15px;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        border-left: 4px solid #e2e8f0;
    }
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .stat-card.blue { border-left-color: #3b82f6; }
    .stat-card.green { border-left-color: #10b981; }
    .stat-card.orange { border-left-color: #f59e0b; }
    .stat-card.purple { border-left-color: #8b5cf6; }
    .stat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        background: #f1f5f9;
    }
    .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    .stat-label {
        color: #64748b;
        font-size: 14px;
        font-weight: 500;
        margin-top: 4px;
    }
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        max-width: 600px;
    }
    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 25px;
    }
    .profile-avatar {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        object-fit: cover;
    }
    .profile-info h3 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
    }
    .profile-info p {
        margin: 4px 0 0 0;
        color: #64748b;
        font-size: 14px;
    }
    .profile-badge {
        display: inline-block;
        background: #4f46e5;
        color: white;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        margin-top: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    .info-item {
        padding: 15px;
        background: #f8fafc;
        border-radius: 10px;
    }
    .info-label {
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }
    .info-value {
        font-size: 16px;
        color: #1e293b;
        font-weight: 600;
    }
    .content-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .content-card h3 {
        margin: 0 0 20px 0;
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
    }
    @media (max-width: 968px) {
        .dashboard-layout {
            flex-direction: column;
        }
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            top: 0;
        }
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    // Remove active class from all menu items
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    // Show selected section
    document.getElementById(sectionId).classList.add('active');
    // Add active class to clicked menu item
    if (event && event.currentTarget) {
        event.currentTarget.classList.add('active');
    } else {
        // If called programmatically, find and activate the menu item
        document.querySelectorAll('.menu-item').forEach(item => {
            if (item.getAttribute('onclick') && item.getAttribute('onclick').includes(sectionId)) {
                item.classList.add('active');
            }
        });
    }
}

// Show cantons section if redirected from update
document.addEventListener('DOMContentLoaded', function() {
    @if(session('show_cantons'))
        showSection('cantons');
    @endif
});
</script>

@php 
    $msgCount = \App\Models\ContactMessage::count(); 
    $clientCount = \App\Models\Client::count();
    $userCount = \App\Models\User::count();
@endphp

<div class="dashboard-layout">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>Dashboard</h2>
            <p>{{ Auth::user()->name }}</p>
        </div>
        
        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Main</div>
                <div class="menu-item active" onclick="showSection('overview')">
                    <span class="menu-icon">📊</span>
                    <span>Overview</span>
                </div>
                <div class="menu-item" onclick="showSection('profile')">
                    <span class="menu-icon">👤</span>
                    <span>My Profile</span>
                </div>
            </div>
            
            @if(auth()->user() && auth()->user()->is_admin)
            <div class="menu-section">
                <div class="menu-section-title">Management</div>
                <a href="{{ route('admin.users.index') }}" class="menu-item">
                    <span class="menu-icon">👥</span>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.clients.index') }}" class="menu-item">
                    <span class="menu-icon">🏥</span>
                    <span>Clients</span>
                    @if($clientCount > 0)
                        <span class="menu-badge">{{ $clientCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.messages.index') }}" class="menu-item">
                    <span class="menu-icon">✉️</span>
                    <span>Messages</span>
                    @if($msgCount > 0)
                        <span class="menu-badge">{{ $msgCount }}</span>
                    @endif
                </a>
                <div class="menu-item" onclick="showSection('cantons')">
                    <span class="menu-icon">🗺️</span>
                    <span>Cantons</span>
                </div>
            </div>
            @endif
            
            <div class="menu-section">
                <div class="menu-section-title">Quick Actions</div>
                <a href="{{ url('/') }}" class="menu-item">
                    <span class="menu-icon">🏠</span>
                    <span>Home Page</span>
                </a>
                <div class="menu-item" onclick="showSection('settings')">
                    <span class="menu-icon">⚙️</span>
                    <span>Settings</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="dashboard-content">
        <!-- Overview Section -->
        <div id="overview" class="content-section active">
            <div class="section-header">
                <h1>Welcome back, {{ Auth::user()->name }}</h1>
                <p>Here's your dashboard overview</p>
            </div>

        <!-- Stats Grid -->
        @if(auth()->user() && auth()->user()->is_admin)
            <div class="stats-grid">
                <div class="stat-card blue">
                    <div class="stat-header">
                        <div>
                            <h2 class="stat-number">{{ $userCount }}</h2>
                            <p class="stat-label">Total Users</p>
                        </div>
                        <div class="stat-icon">📊</div>
                    </div>
                </div>
                <div class="stat-card green">
                    <div class="stat-header">
                        <div>
                            <h2 class="stat-number">{{ $clientCount }}</h2>
                            <p class="stat-label">Active Clients</p>
                        </div>
                        <div class="stat-icon">👥</div>
                    </div>
                </div>
                <div class="stat-card orange">
                    <div class="stat-header">
                        <div>
                            <h2 class="stat-number">{{ $msgCount }}</h2>
                            <p class="stat-label">Messages</p>
                        </div>
                        <div class="stat-icon">✉️</div>
                    </div>
                </div>
                <div class="stat-card purple">
                    <div class="stat-header">
                        <div>
                            <h2 class="stat-number">4.9</h2>
                            <p class="stat-label">Rating Score</p>
                        </div>
                        <div class="stat-icon">⭐</div>
                    </div>
                </div>
            </div>
        @endif
        </div>

        <!-- Profile Section -->
        <div id="profile" class="content-section">
            <div class="section-header">
                <h1>My Profile</h1>
                <p>Manage your account information</p>
            </div>

            <div class="profile-card">
                <div class="profile-header">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="profile-avatar">
                    @else
                        <div class="profile-avatar" style="background: #4f46e5; display: flex; align-items: center; justify-content: center; color: white; font-size: 32px; font-weight: 700;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="profile-info">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->email }}</p>
                        @if(auth()->user() && auth()->user()->is_admin)
                            <span class="profile-badge">Administrator</span>
                        @else
                            <span class="profile-badge">User</span>
                        @endif
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Full Name</div>
                        <div class="info-value">{{ Auth::user()->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Account Type</div>
                        <div class="info-value">{{ auth()->user()->is_admin ? 'Administrator' : 'User' }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Member Since</div>
                        <div class="info-value">{{ Auth::user()->created_at->format('M d, Y') }}</div>
                    </div>
                </div>

                <div style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #e2e8f0;">
                    <a href="{{ route('profile.show') }}" style="display: inline-block; background: #4f46e5; color: white; padding: 12px 24px; border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.2s ease;">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Cantons Section -->
        <div id="cantons" class="content-section">
            <div class="section-header">
                <h1>Manage Cantons Pricing</h1>
                <p>Set hourly rates for each Swiss canton</p>
            </div>

            <div class="content-card">
                <style>
                    .cantons-table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    .cantons-table th {
                        background: #f8fafc;
                        color: #475569;
                        font-weight: 600;
                        text-align: left;
                        padding: 12px 16px;
                        border-bottom: 2px solid #e2e8f0;
                        font-size: 14px;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                    }
                    .cantons-table td {
                        padding: 16px;
                        border-bottom: 1px solid #f1f5f9;
                        color: #334155;
                    }
                    .cantons-table tr:hover {
                        background: #fafbfc;
                    }
                    .canton-name {
                        font-weight: 600;
                        color: #1e293b;
                    }
                    .price-input-group {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                    }
                    .price-input-group input {
                        width: 100px;
                        padding: 8px 12px;
                        border: 2px solid #e2e8f0;
                        border-radius: 8px;
                        font-size: 14px;
                        font-weight: 600;
                    }
                    .price-input-group input:focus {
                        outline: none;
                        border-color: #4f46e5;
                    }
                    .btn-update-canton {
                        background: #10b981;
                        color: white;
                        padding: 8px 16px;
                        border: none;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.2s ease;
                        font-size: 13px;
                    }
                    .btn-update-canton:hover {
                        background: #059669;
                        transform: translateY(-1px);
                    }
                    .alert-success-canton {
                        background: #d1fae5;
                        color: #065f46;
                        border: 1px solid #6ee7b7;
                        padding: 16px 20px;
                        border-radius: 12px;
                        margin-bottom: 24px;
                        font-weight: 500;
                    }
                </style>

                @if(session('canton_status'))
                    <div class="alert-success-canton">
                        ✅ {{ session('canton_status') }}
                    </div>
                @endif

                @php
                    $cantons = \App\Models\Canton::orderBy('name')->get();
                @endphp

                <table class="cantons-table">
                    <thead>
                        <tr>
                            <th>Canton</th>
                            <th>Price per Hour (CHF)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cantons as $canton)
                        <tr>
                            <td class="canton-name">{{ $canton->name }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.cantons.update', $canton->id) }}" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <div class="price-input-group">
                                        <input 
                                            type="number" 
                                            name="price_per_hour" 
                                            value="{{ $canton->price_per_hour }}" 
                                            step="0.01"
                                            min="0"
                                            max="999"
                                            required>
                                        <span style="font-weight: 600; color: #64748b;">CHF</span>
                                    </div>
                            </td>
                            <td>
                                    <button type="submit" class="btn-update-canton">
                                        💾 Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Settings Section -->
        <div id="settings" class="content-section">
            <div class="section-header">
                <h1>Settings</h1>
                <p>Manage your preferences and account settings</p>
            </div>

            <div class="content-card">
                <h3>Account Settings</h3>
                <p style="color: #64748b; margin-bottom: 20px;">Update your account information, password, and security preferences</p>
                
                <a href="{{ route('profile.show') }}" style="display: inline-block; background: #4f46e5; color: white; padding: 12px 24px; border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.2s ease;">
                    Go to Profile Settings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
