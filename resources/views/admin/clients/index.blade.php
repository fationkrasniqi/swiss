@extends('layouts.app')

@section('content')
<div class="container main-inner">
    <div class="page-header"><h2 style="margin:0">Admin — Clients</h2></div>

    <div class="card" style="overflow:auto">
        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr style="text-align:left;border-bottom:1px solid #e5e7eb">
                    <th style="padding:10px">ID</th>
                    <th style="padding:10px">Name</th>
                    <th style="padding:10px">Email</th>
                    <th style="padding:10px">Canton</th>
                    <th style="padding:10px">Services</th>
                    <th style="padding:10px">Hours</th>
                    <th style="padding:10px">Total (CHF)</th>
                    <th style="padding:10px">Requested</th>
                       <th style="padding:10px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $c)
                <tr style="border-bottom:1px solid #f3f4f6">
                    <td style="padding:10px">{{ $c->id }}</td>
                    <td style="padding:10px">{{ $c->first_name }} {{ $c->last_name }}</td>
                    <td style="padding:10px">{{ $c->email }}</td>
                    <td style="padding:10px">{{ $c->canton }}</td>
                    <td style="padding:10px">{{ $c->services }}</td>
                    <td style="padding:10px">{{ $c->hours }}</td>
                    <td style="padding:10px">{{ $c->total_price }}</td>
                    <td style="padding:10px">{{ $c->created_at->format('Y-m-d H:i') }}</td>
                       <td style="padding:10px">
                               <div style="display:flex;gap:6px;align-items:center">
                                   <form method="POST" action="{{ route('admin.clients.sendEmail', $c->id) }}" style="display:inline">
                                       @csrf
                                       <input type="hidden" name="email" value="{{ $c->email }}">
                                       <input type="hidden" name="name" value="{{ $c->first_name }} {{ $c->last_name }}">
                                       <button type="submit" class="btn" style="background:#2563eb;color:#fff;padding:6px 10px;border-radius:6px">Send Email</button>
                                   </form>
                                   <a href="{{ route('admin.clients.download', $c->id) }}" class="btn" style="background:#111827;color:#fff;padding:6px 10px;border-radius:6px;text-decoration:none">Download PDF</a>
                               </div>
                       </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin-top:12px">{{ $clients->links() }}</div>
    </div>
</div>
@endsection
