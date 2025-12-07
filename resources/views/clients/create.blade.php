<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>{{ __('services.page_title') }} | {{ __('home.nav_brand') }}</title>
    <meta name="description" content="{{ __('services.page_subtitle') }}">
    <meta name="robots" content="index, follow">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; 
            line-height: 1.7; 
            color: #2d3748;
            font-size: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        /* Navbar - same as home */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 18px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }
        .navbar-brand {
            font-size: 26px;
            font-weight: 700;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: -0.5px;
        }
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 35px;
            list-style: none;
        }
        .navbar-menu a {
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s;
            position: relative;
        }
        .navbar-menu a:hover {
            color: #4facfe;
        }
        .navbar-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            transition: width 0.3s;
        }
        .navbar-menu a:hover::after {
            width: 100%;
        }
        .lang-switcher {
            display: flex;
            gap: 8px;
        }
        .lang-btn {
            background: rgba(79, 172, 254, 0.08);
            color: #4facfe;
            border: 2px solid rgba(79, 172, 254, 0.3);
            padding: 8px 16px;
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
            background: #4facfe;
            color: white;
            border-color: #4facfe;
            transform: translateY(-2px);
        }
        .lang-btn.active {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border-color: transparent;
        }
        
        /* Footer - same as home */
        .footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 50px 0 30px;
            text-align: center;
            margin-top: 80px;
        }
        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }
        .footer a {
            color: #4facfe;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer a:hover {
            color: #00f2fe;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }
        
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
</head>
<body>
    <!-- Skip to content for accessibility -->
    <a href="#main-content" style="position:absolute;left:-9999px;z-index:999;">Skip to content</a>
    
    <!-- Navbar - same as home -->
    <nav class="navbar" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand" aria-label="Homepage">{{ __('home.nav_brand') }}</a>
            <ul class="navbar-menu">
                <li><a href="{{ url('/') }}" aria-label="Homepage">{{ __('home.nav_home') }}</a></li>
                <li><a href="{{ url('/services') }}" aria-label="Our Services">{{ __('home.nav_services') }}</a></li>
                <li><a href="{{ url('/') }}#contact" aria-label="Contact Us">{{ __('home.nav_contact') }}</a></li>
                <li class="lang-switcher">
                    <a href="{{ url('/lang/de') }}" class="lang-btn {{ app()->getLocale() == 'de' ? 'active' : '' }}" aria-label="Switch to German">🇩🇪 Deutsch</a>
                    <a href="{{ url('/lang/fr') }}" class="lang-btn {{ app()->getLocale() == 'fr' ? 'active' : '' }}" aria-label="Switch to French">🇫🇷 Français</a>
                    <a href="{{ url('/lang/sq') }}" class="lang-btn {{ app()->getLocale() == 'sq' ? 'active' : '' }}" aria-label="Switch to Albanian">🇦🇱 Shqip</a>
                    <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}" aria-label="Switch to English">🇬🇧 English</a>
                </li>
            </ul>
        </div>
    </nav>

    <main id="main-content">
        <div class="service-container">
            <div class="service-header">
                <h1>{{ __('services.page_title') }}</h1>
                <p>{{ __('services.page_subtitle') }}</p>
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
    </main>

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

    <!-- Footer - same as home -->
    <footer class="footer" role="contentinfo">
    <div class="container">
        <p>&copy; {{ date('Y') }} {{ __('home.nav_brand') }}. {{ __('home.footer_rights') }}</p>
        <p style="margin-top:10px">
            <a href="{{ route('login') }}" aria-label="Login to admin panel">Login</a> | 
            <a href="{{ route('register') }}" aria-label="Register new account">Register</a>
        </p>
        <div style="margin-top: 20px; font-size: 14px; color: rgba(255,255,255,0.8);">
            <p>{{ __('home.seo_keywords') }}</p>
        </div>
    </div>
</footer>
</body>
</html>