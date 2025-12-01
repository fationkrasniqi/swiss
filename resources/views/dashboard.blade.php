@extends('layouts.app')

@section('content')
    <div class="container main-inner" style="padding-top:24px;padding-bottom:24px;">
        <div class="page-header"> <h2 style="margin:0;font-size:1.25rem;font-weight:700">{{ __('Dashboard') }}</h2> </div>

        <div style="display:flex;gap:16px;margin-top:16px;flex-wrap:wrap">
            <div style="flex:1;min-width:280px">
       
            </div>

            <div style="width:320px;min-width:220px">
                @auth
                <div class="card" style="padding:12px;">
                    <h3 style="margin:0 0 8px 0;font-size:1rem;font-weight:600">Your profile</h3>
                    <div style="display:flex;align-items:center;gap:10px">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width:54px;height:54px;border-radius:9999px;object-fit:cover">
                        @endif
                        <div>
                            <div style="font-weight:600">{{ Auth::user()->name }}</div>
                            <div style="color:#6b7280;font-size:0.9rem">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div style="margin-top:12px;display:flex;gap:8px">
                        <a href="{{ route('profile.show') }}" class="btn" style="padding:8px 10px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none">Profile</a>
                        @if(auth()->user() && auth()->user()->is_admin)
                            <a href="{{ route('admin.users.index') }}" class="btn" style="padding:8px 10px;background:#10b981;color:#fff;border-radius:6px;text-decoration:none">Manage users</a>
                            @php $msgCount = \App\Models\ContactMessage::count(); @endphp
                            @php $clientCount = \App\Models\Client::count(); @endphp
                            <a href="{{ route('admin.messages.index') }}" class="btn" style="padding:8px 10px;background:#f59e0b;color:#fff;border-radius:6px;text-decoration:none">Messages @if($msgCount>0) ({{ $msgCount }}) @endif</a>
                            <a href="{{ route('admin.clients.index') }}" class="btn" style="padding:8px 10px;background:#6366f1;color:#fff;border-radius:6px;text-decoration:none">Clients @if($clientCount>0) ({{ $clientCount }}) @endif</a>
                        @endif
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
