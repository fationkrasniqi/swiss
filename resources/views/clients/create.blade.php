@extends('layouts.app')

@section('content')
<div class="container main-inner" style="padding-top:24px;padding-bottom:24px;">
    <div class="page-header"><h2 style="margin:0;font-size:1.25rem;font-weight:700">Shërbimet për klientë</h2></div>

    @if(session('status'))
        <div class="flash flash-success">{{ session('status') }}</div>
    @endif

    <div class="card form-card" style="max-width:700px;margin:0 auto">
        <h3 class="form-title">Zgjidhni shërbimet tuaja</h3>
        <form method="POST" action="{{ route('clients.store') }}" class="form" id="serviceForm">
            @csrf
            <div class="form-group">
                <label>Emri</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="input" />
                @error('first_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Mbiemri</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="input" />
                @error('last_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="input" />
                @error('email')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Kantoni</label>
                <select name="canton" class="input">
                    @foreach($cantons as $canton)
                        <option value="{{ $canton }}" @if(old('canton')==$canton)selected @endif>{{ $canton }}</option>
                    @endforeach
                </select>
                @error('canton')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Shërbimet</label>
                <div style="display:flex;flex-wrap:wrap;gap:10px">
                    @foreach($services as $i => $service)
                        <label style="display:flex;align-items:center;gap:6px">
                            <input type="checkbox" name="services[]" value="{{ $service }}" @if(is_array(old('services')) && in_array($service, old('services')))checked @endif />
                            <span>{{ $service }}</span>
                        </label>
                    @endforeach
                </div>
                @error('services')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Orët</label>
                <select name="hours" class="input" id="hoursInput">
                    @for($h=1;$h<=12;$h++)
                        <option value="{{ $h }}" @if(old('hours')==$h)selected @endif>{{ $h }} orë</option>
                    @endfor
                </select>
                @error('hours')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>Totali (CHF)</label>
                <input type="text" name="total_price" id="totalPriceInput" class="input" readonly value="{{ old('total_price', 0) }}" />
                @error('total_price')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn-primary">Dërgo kërkesën</button>
            </div>
        </form>
    </div>
</div>
<script>
// Simple price calculation (can be improved)
const baseRate = 30;
const serviceForm = document.getElementById('serviceForm');
const totalPriceInput = document.getElementById('totalPriceInput');
const hoursInput = document.getElementById('hoursInput');
serviceForm.addEventListener('change', function() {
    let checked = Array.from(serviceForm.querySelectorAll('input[type=checkbox][name="services[]"]:checked'));
    let hours = parseInt(hoursInput.value) || 1;
    let price = 0;
    checked.forEach((el, i) => {
        price += Math.round(baseRate * (1 + i * 0.05) * hours);
    });
    if (checked.length === 0) price = baseRate * hours;
    totalPriceInput.value = price;
});
</script>
@endsection
