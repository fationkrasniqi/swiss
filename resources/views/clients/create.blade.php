@extends('layouts.app')

@section('content')
<style>
    body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
    .service-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
    }
    .service-header {
        text-align: center;
        color: white;
        margin-bottom: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
    .service-header h1 {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 12px;
        text-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .service-header p {
        font-size: 18px;
        opacity: 0.95;
    }
    .lang-switcher {
        display: flex;
        gap: 10px;
    }
    .lang-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.4);
        padding: 8px 18px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s;
        cursor: pointer;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", Roboto, Helvetica, Arial, sans-serif;
    }
    .lang-btn .flag {
        font-size: 18px;
        display: inline-block;
        margin-right: 4px;
    }
    .lang-btn:hover {
        background: white;
        color: #667eea;
        border-color: white;
        transform: translateY(-2px);
    }
    .lang-btn.active {
        background: white;
        color: #667eea;
        border-color: white;
    }
    .service-card {
        background: white;
        border-radius: 24px;
        padding: 50px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }
    .form-title {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 30px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 28px;
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 10px;
        font-size: 15px;
    }
    .form-group .input,
    .form-group select {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        font-family: inherit;
    }
    .form-group .input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    .phone-group {
        display: flex;
        gap: 14px;
        align-items: stretch;
    }
    .phone-prefix {
        width: 150px;
        flex-shrink: 0;
    }
    .phone-number {
        flex: 1;
        min-width: 0;
    }
    .phone-input-wrapper {
        flex: 1;
        display: flex;
    }
    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 14px;
        padding: 16px;
        background: #f7fafc;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
    }
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        background: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid transparent;
    }
    .checkbox-label:hover {
        background: #edf2f7;
        border-color: #667eea;
    }
    .checkbox-label input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .checkbox-label input[type="checkbox"]:checked + span {
        color: #667eea;
        font-weight: 600;
    }
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 16px 40px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        margin-top: 20px;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
    }
    .form-error {
        color: #e53e3e;
        font-size: 14px;
        margin-top: 6px;
    }
    .success-alert {
        background: #c6f6d5;
        color: #22543d;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        border: 2px solid #9ae6b4;
        text-align: center;
        font-weight: 500;
    }
</style>

<div class="service-container">
    <div class="service-header">
        <h1>{{ __('services.page_title') }}</h1>
        <p>{{ __('services.page_subtitle') }}</p>
        <div class="lang-switcher">
            <a href="{{ url('/lang/de') }}" class="lang-btn {{ app()->getLocale() == 'de' ? 'active' : '' }}">🇩🇪 Deutsch</a>
            <a href="{{ url('/lang/fr') }}" class="lang-btn {{ app()->getLocale() == 'fr' ? 'active' : '' }}">🇫🇷 Français</a>
            <a href="{{ url('/lang/sq') }}" class="lang-btn {{ app()->getLocale() == 'sq' ? 'active' : '' }}">🇦🇱 Shqip</a>
            <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">🇬🇧 English</a>
        </div>
    </div>

    @if(session('status'))
        <div class="success-alert">{{ __('services.success') }}</div>
    @endif

    <div class="service-card">
        <h3 class="form-title">{{ __('services.form_title') }}</h3>
        <form method="POST" action="{{ route('clients.store') }}" id="serviceForm">
            @csrf
            <div class="form-group">
                <label>{{ __('services.first_name') }}</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="input" required />
                @error('first_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.last_name') }}</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="input" required />
                @error('last_name')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="input" required />
                @error('email')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label>{{ __('services.phone') }}</label>
                <div class="phone-group">
                    <select name="phone_prefix" class="input phone-prefix" required>
                        <option value="+41" {{ old('phone_prefix', '+41') == '+41' ? 'selected' : '' }}>🇨🇭 +41</option>
                        <option value="+43" {{ old('phone_prefix') == '+43' ? 'selected' : '' }}>🇦🇹 +43</option>
                        <option value="+49" {{ old('phone_prefix') == '+49' ? 'selected' : '' }}>🇩🇪 +49</option>
                        <option value="+33" {{ old('phone_prefix') == '+33' ? 'selected' : '' }}>🇫🇷 +33</option>
                        <option value="+39" {{ old('phone_prefix') == '+39' ? 'selected' : '' }}>🇮🇹 +39</option>
                    </select>
                    <br>
                    <div class="phone-input-wrapper">
                        <input type="tel" name="phone_number" value="{{ old('phone_number') }}" class="input phone-number" placeholder="{{ __('services.phone_placeholder') }}" pattern="[0-9\s]{8,15}" required id="phoneInput" style="width: 100%;" />
                    </div>
                </div>
                @error('phone_prefix')<div class="form-error">{{ $message }}</div>@enderror
                @error('phone_number')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            
            <div class="form-group">
                <label>{{ __('services.canton') }}</label>
                <select name="canton" class="input" required>
                    @foreach($cantons as $canton)
                        <option value="{{ $canton }}" @if(old('canton')==$canton)selected @endif>{{ $canton }}</option>
                    @endforeach
                </select>
                @error('canton')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.services') }}</label>
                <div class="checkbox-grid">
                    @foreach($services as $i => $service)
                        <label class="checkbox-label">
                            <input type="checkbox" name="services[]" value="{{ $service }}" @if(is_array(old('services')) && in_array($service, old('services')))checked @endif />
                            <span>{{ $service }}</span>
                        </label>
                    @endforeach
                </div>
                @error('services')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.hours') }}</label>
                <select name="hours" class="input" id="hoursInput">
                    @for($h=1;$h<=12;$h++)
                        <option value="{{ $h }}" @if(old('hours')==$h)selected @endif>{{ $h }} {{ trans_choice('services.hours_text', $h) }}</option>
                    @endfor
                </select>
                @error('hours')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.service_date') }}</label>
                <input type="date" name="service_date" value="{{ old('service_date') }}" class="input" min="{{ date('Y-m-d') }}" />
                @error('service_date')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label>{{ __('services.total') }}</label>
                <input type="text" name="total_price" id="totalPriceInput" class="input" readonly value="{{ old('total_price', 0) }}" style="background: #f7fafc; font-weight: 600; font-size: 18px; color: #667eea;" />
                @error('total_price')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            
            <button type="submit" class="btn-submit">📩 {{ __('services.submit') }}</button>
        </form>
    </div>
</div>
<script>
// Phone number auto-formatting
const phoneInput = document.getElementById('phoneInput');
if (phoneInput) {
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            let formatted = '';
            for (let i = 0; i < value.length && i < 10; i++) {
                if (i === 2 || i === 5 || i === 7) formatted += ' ';
                formatted += value[i];
            }
            e.target.value = formatted;
        }
    });
}

// Simple price calculation
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
