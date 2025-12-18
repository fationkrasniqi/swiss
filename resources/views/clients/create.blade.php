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
        /* ============================================
           SWISS HEALTHCARE DESIGN SYSTEM
           Inspired by Swiss medical precision & warmth
           Background: Artistic canton map concept
        ============================================ */
        
        :root {
            /* Swiss Medical Color Palette */
            --swiss-blue: #5B8FB9;
            --medical-teal: #76A89D;
            --sage-green: #9AB3A0;
            --warm-beige: #D4C5B0;
            --light-gold: #E5D4B8;
            --off-white: #F8F6F3;
            --soft-gray: #B4B8BF;
            --text-primary: #2C3E50;
            --text-secondary: #6B7C8E;
            
            /* Typography Scale - Optimized for elderly users */
            --font-base: 18px;
            --font-lg: 22px;
            --font-xl: 28px;
            --font-2xl: 38px;
            --font-hero: 52px;
            
            /* Spacing - Organic rhythm */
            --space-xs: 8px;
            --space-sm: 16px;
            --space-md: 28px;
            --space-lg: 42px;
            --space-xl: 68px;
            
            /* Shadows - Soft & subtle */
            --shadow-sm: 0 2px 12px rgba(91, 143, 185, 0.08);
            --shadow-md: 0 4px 24px rgba(91, 143, 185, 0.12);
            --shadow-lg: 0 8px 40px rgba(91, 143, 185, 0.15);
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; font-size: var(--font-base); }
        body { 
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.75;
            color: var(--text-primary);
            background: var(--off-white);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* ============================================
           VIBRANT MEDICAL BACKGROUND
           Hospital colors - doctor theme with energy
        ============================================ */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -2;
            background: 
                /* Medical blue zones */
                radial-gradient(circle at 10% 20%, rgba(41, 128, 185, 0.12) 0%, transparent 30%),
                radial-gradient(circle at 90% 25%, rgba(52, 152, 219, 0.10) 0%, transparent 35%),
                /* Medical green/teal zones */
                radial-gradient(circle at 75% 70%, rgba(26, 188, 156, 0.14) 0%, transparent 32%),
                radial-gradient(circle at 25% 80%, rgba(22, 160, 133, 0.11) 0%, transparent 38%),
                /* Fresh mint accents */
                radial-gradient(circle at 50% 50%, rgba(46, 204, 113, 0.08) 0%, transparent 45%),
                /* Warm medical orange/coral */
                radial-gradient(circle at 85% 85%, rgba(230, 126, 34, 0.09) 0%, transparent 28%),
                /* Professional purple accents */
                radial-gradient(circle at 15% 75%, rgba(155, 89, 182, 0.10) 0%, transparent 33%);
            pointer-events: none;
        }
        
        /* Soft medical ambient glow - no lines */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            opacity: 0.3;
            background: 
                radial-gradient(ellipse at 30% 40%, rgba(41, 128, 185, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 70% 60%, rgba(26, 188, 156, 0.06) 0%, transparent 50%);
            pointer-events: none;
        }
        
        @keyframes medicalPulse {
            0%, 100% { 
                transform: scale(1.1) rotate(1deg) translateY(0);
                opacity: 0.65;
            }
            50% { 
                transform: scale(1.12) rotate(1deg) translateY(-10px);
                opacity: 0.72;
            }
        }
        
        /* Navbar - Responsive with Hamburger Menu */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            padding: 12px 0;
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
            padding: 0 20px;
        }
        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: -0.5px;
            z-index: 1001;
        }
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
            z-index: 1001;
            padding: 8px;
        }
        .hamburger span {
            width: 25px;
            height: 3px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
        }
        .navbar-menu a {
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
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
            gap: 6px;
        }
        .lang-btn {
            background: rgba(79, 172, 254, 0.08);
            color: #4facfe;
            border: 1.5px solid rgba(79, 172, 254, 0.3);
            padding: 6px 12px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s;
            cursor: pointer;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", Roboto, Helvetica, Arial, sans-serif;
        }
        .lang-btn .flag {
            font-size: 14px;
            display: inline-block;
            margin-right: 3px;
        }
        .lang-btn:hover {
            background: #4facfe;
            color: white;
            border-color: #4facfe;
            transform: translateY(-1px);
        }
        .lang-btn.active {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border-color: transparent;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }
            .navbar-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                gap: 30px;
                box-shadow: -5px 0 20px rgba(0,0,0,0.1);
                transition: right 0.4s ease;
                padding: 20px;
            }
            .navbar-menu.active {
                right: 0;
            }
            .navbar-menu a {
                font-size: 18px;
                width: 100%;
                text-align: center;
                padding: 12px 0;
            }
            .lang-switcher {
                flex-direction: column;
                width: 100%;
                gap: 10px;
            }
            .lang-btn {
                width: 100%;
                justify-content: center;
                padding: 10px 15px;
                font-size: 15px;
            }
            .navbar-brand {
                font-size: 18px;
            }
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
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 var(--space-md);
        }
        
    .service-container {
        max-width: 920px;
        margin: var(--space-xl) auto;
        padding: var(--space-md);
    }
    .service-header {
        text-align: center;
        color: var(--text-primary);
        margin-bottom: var(--space-lg);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--space-md);
    }
    .service-header h1 {
        font-size: var(--font-hero);
        font-weight: 600;
        margin-bottom: var(--space-sm);
        color: var(--swiss-blue);
        letter-spacing: -0.5px;
    }
    .service-header p {
        font-size: var(--font-lg);
        color: var(--text-secondary);
        line-height: 1.7;
    }
    .service-card {
        background: white;
        border-radius: 28px;
        padding: var(--space-xl);
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(91, 143, 185, 0.08);
    }
    .form-title {
        font-size: var(--font-2xl);
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: var(--space-lg);
        text-align: center;
    }
    .form-group {
        margin-bottom: var(--space-md);
    }
    .form-group label {
        display: block;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: var(--space-xs);
        font-size: var(--font-lg);
    }
    .form-group .input,
    .form-group select {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid rgba(91, 143, 185, 0.15);
        border-radius: 16px;
        font-size: var(--font-base);
        transition: all 0.3s ease;
        font-family: inherit;
    }
    .form-group .input:focus,
    .form-group select:focus {
        outline: none;
        border-color: var(--swiss-blue);
        box-shadow: 0 0 0 3px rgba(91, 143, 185, 0.08);
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
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: var(--space-sm);
        padding: var(--space-md);
        background: rgba(91, 143, 185, 0.03);
        border-radius: 20px;
        border: 2px solid rgba(91, 143, 185, 0.08);
    }
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: white;
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        box-shadow: var(--shadow-sm);
    }
    .checkbox-label:hover {
        background: rgba(118, 168, 157, 0.06);
        border-color: var(--medical-teal);
        transform: translateY(-1px);
    }
    .checkbox-label input[type="checkbox"] {
        width: 22px;
        height: 22px;
        cursor: pointer;
        accent-color: var(--swiss-blue);
    }
    .checkbox-label input[type="checkbox"]:checked + span {
        color: var(--swiss-blue);
        font-weight: 600;
    }
    .btn-submit {
        width: 100%;
        background: var(--swiss-blue);
        color: white;
        padding: 16px 44px;
        border: none;
        border-radius: 42px;
        font-size: var(--font-lg);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: var(--shadow-md);
        margin-top: var(--space-md);
    }
    .btn-submit:hover {
        background: var(--medical-teal);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
    .form-error {
        color: #c53030;
        font-size: 15px;
        margin-top: var(--space-xs);
    }
    .success-alert {
        background: rgba(154, 179, 160, 0.12);
        color: #2d5f3d;
        padding: var(--space-sm) var(--space-md);
        border-radius: 18px;
        margin-bottom: var(--space-md);
        border: 1.5px solid rgba(154, 179, 160, 0.3);
        text-align: center;
        font-weight: 500;
        font-size: var(--font-base);
    }
</style>
</head>
<body>
    <!-- Skip to content for accessibility -->
    <a href="#main-content" style="position:absolute;left:-9999px;z-index:999;">Skip to content</a>
    
    <!-- Navbar - Responsive with Hamburger -->
    <nav class="navbar" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand" aria-label="Homepage">{{ __('home.nav_brand') }}</a>
            <div class="hamburger" id="hamburger" aria-label="Toggle menu" role="button" tabindex="0">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="navbar-menu" id="navbarMenu">
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
    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const navbarMenu = document.getElementById('navbarMenu');
    
    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navbarMenu.classList.toggle('active');
    });
    
    // Close menu when clicking on a link
    navbarMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', function() {
            hamburger.classList.remove('active');
            navbarMenu.classList.remove('active');
        });
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!hamburger.contains(e.target) && !navbarMenu.contains(e.target)) {
            hamburger.classList.remove('active');
            navbarMenu.classList.remove('active');
        }
    });
    
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
            <a href="{{ route('login') }}" aria-label="Login to admin panel">Login</a>
        </p>
        <div style="margin-top: 20px; font-size: 14px; color: rgba(255,255,255,0.8);">
            <p>{{ __('home.seo_keywords') }}</p>
        </div>
    </div>
</footer>
</body>
</html>