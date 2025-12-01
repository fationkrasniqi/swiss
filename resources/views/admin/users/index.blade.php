@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main-inner">
        <div class="page-header">
            <h2 style="margin:0">Admin — Users</h2>
            <form method="GET" action="{{ route('admin.users.index') }}" style="display:inline-block;margin-left:16px">
                <input type="search" name="q" placeholder="Search name or email" value="{{ isset($q) ? e($q) : '' }}" style="padding:6px 8px;border:1px solid #d1d5db;border-radius:6px">
                <button type="submit" style="margin-left:6px;padding:6px 10px;background:#2563eb;color:#fff;border-radius:6px;border:none">Search</button>
                @if(isset($q) && $q)
                    <a href="{{ route('admin.users.index') }}" style="margin-left:8px;color:#6b7280">Clear</a>
                @endif
            </form>
        </div>

        @if(session('status'))
            <div class="flash flash-success" style="margin:12px 0;padding:10px;border-radius:6px;background:#ecfeff;color:#064e3b">{{ session('status') }}</div>
        @endif

        <div class="card" style="overflow:auto">
            <table style="width:100%;border-collapse:collapse">
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
