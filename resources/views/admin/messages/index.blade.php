@extends('layouts.app')

@section('content')
<div class="container main-inner">
    <div class="page-header"><h2 style="margin:0">Admin — Messages</h2></div>

    @if(session('status'))
        <div class="flash flash-success">{{ session('status') }}</div>
    @endif

    <div class="card" style="overflow:auto">
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr style="text-align:left;border-bottom:1px solid #e5e7eb">
                    <th style="padding:10px">ID</th>
                    <th style="padding:10px">From</th>
                    <th style="padding:10px">Email</th>
                    <th style="padding:10px">Message</th>
                    <th style="padding:10px">Received</th>
                    <th style="padding:10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $m)
                <tr style="border-bottom:1px solid #f3f4f6">
                    <td style="padding:10px">{{ $m->id }}</td>
                    <td style="padding:10px">{{ $m->first_name }} {{ $m->last_name }}</td>
                    <td style="padding:10px">{{ $m->email }}</td>
                    <td style="padding:10px;max-width:600px">{{ Str::limit($m->message, 200) }}</td>
                    <td style="padding:10px">{{ $m->created_at->format('Y-m-d H:i') }}</td>
                    <td style="padding:10px">
                        <form method="POST" action="{{ route('admin.messages.destroy', $m->id) }}" onsubmit="return confirm('Delete this message?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:#ef4444;color:#fff;padding:6px 10px;border-radius:6px;border:none">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:12px">{{ $messages->links() }}</div>
    </div>
</div>
@endsection
