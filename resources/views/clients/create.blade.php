<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>{{ __('services.page_title') }} | {{ __('home.nav_brand') }}</title>
    <meta name="description" content="{{ __('services.page_subtitle') }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ __('services.page_title') }} | {{ __('home.nav_brand') }}">
    <meta property="og:description" content="{{ __('services.page_subtitle') }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    
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
            
            /* Background */
            --background-main: #F6F9FC;
            
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
            background: var(--background-main);
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
                radial-gradient(circle at 20% 30%, rgba(18, 72, 126, 0.06) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(247, 149, 203, 0.06) 0%, transparent 40%);
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
            .form-group .input,
            .form-group select {
                width: 100% !important;
                max-width: 100% !important;
                padding: 14px 18px !important;
            }
            .phone-group {
                grid-template-columns: 1fr !important;
                gap: 10px !important;
                width: 100% !important;
            }
            .service-header h1 {
                font-size: 28px !important;
            }
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 60px 0 30px;
            margin-top: 80px;
        }
        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }
        .footer a:hover {
            opacity: 1 !important;
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
        padding: 5px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.12);
        border: 1px solid rgba(18,72,126,0.08);
    }
    .service-logo {
        text-align: center;
        margin-bottom: 30px;
    }
    .service-logo img {
        max-width: 180px;
        height: auto;
    }
    .form-title {
        font-size: 32px;
        font-weight: 700;
        color: #12487E;
        margin-bottom: var(--space-lg);
        text-align: center;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #12487E;
        margin-bottom: 10px;
        font-size: 15px;
    }
    .form-group label i {
        color: #F795CB;
        font-size: 14px;
    }
    .form-group .input,
    .form-group select {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        font-family: inherit;
        outline: none;
    }
    .form-group .input:focus,
    .form-group select:focus {
        border-color: #12487E;
        box-shadow: 0 0 0 4px rgba(18,72,126,0.08);
    }
    .phone-group {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 15px;
        align-items: stretch;
        width: 100%;
    }
    .phone-prefix {
        width: 100%;
    }
    .phone-input-wrapper {
        width: 100%;
        display: flex;
    }
    .phone-number {
        width: 100%;
        min-width: 0;
        font-size: 15px;
        padding: 14px 18px;
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
        gap: 8px;
        padding: 9px 12px;
        background: white;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        font-size: 13px;
    }
    .checkbox-label:hover {
        background: rgba(247,149,203,0.06);
        border-color: #F795CB;
        transform: translateY(-1px);
    }
    .checkbox-label input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #12487E;
        flex-shrink: 0;
    }
    .checkbox-label span {
        font-size: 13px;
        line-height: 1.3;
    }
    .checkbox-label input[type="checkbox"]:checked + span {
        color: #12487E;
        font-weight: 600;
    }
    .btn-submit {
        width: 100%;
        background: linear-gradient(135deg, #12487E 0%, #F795CB 100%);
        color: white;
        padding: 16px 40px;
        border: none;
        border-radius: 50px;
        font-size: 17px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 20px rgba(18,72,126,0.3);
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(18,72,126,0.4);
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
            <a href="{{ url('/') }}" class="navbar-brand" aria-label="Homepage">
                <img src="{{ asset('images/logo.png') }}" alt="{{ __('home.nav_brand') }}" style="max-width: 100px; height: auto;">
            </a>
            <div class="hamburger" id="hamburger" aria-label="Toggle menu" role="button" tabindex="0">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="{{ url('/') }}#home" aria-label="Homepage">{{ __('home.nav_home') }}</a></li>
                <li><a href="{{ url('/services') }}" aria-label="Our Services">{{ __('home.nav_services') }}</a></li>
                <li><a href="{{ route('services.details') }}" aria-label="{{ __('home.nav_services_details') }}">{{ __('home.nav_services_details') }}</a></li>
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
            </div>

            @if(session('status'))
                <div class="success-alert">{{ __('services.success') }}</div>
            @endif

            <div class="service-card">
                <div class="service-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __('home.nav_brand') }}">
                </div>
                <h3 class="form-title">{{ __('services.form_title') }}</h3>
                <form method="POST" action="{{ route('clients.store') }}" id="serviceForm">
                    @csrf
                    <div class="form-group">
                        <label><i class="fas fa-user"></i>{{ __('services.first_name') }}</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" class="input" required />
                        @error('first_name')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-user"></i>{{ __('services.last_name') }}</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="input" required />
                        @error('last_name')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i>{{ __('services.email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="input" required />
                        @error('email')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-phone"></i>{{ __('services.phone') }}</label>
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
                        <label><i class="fas fa-map-marker-alt"></i>{{ __('services.canton') }}</label>
                        <select name="canton" class="input" required>
                            @foreach($cantons as $canton)
                                <option value="{{ $canton }}" @if(old('canton')==$canton)selected @endif>{{ $canton }}</option>
                            @endforeach
                        </select>
                        @error('canton')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-tasks"></i>{{ __('services.services') }}</label>
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
                        <label><i class="fas fa-calendar"></i>{{ __('services.service_date') }}</label>
                        <input type="date" name="service_date" value="{{ old('service_date') }}" class="input" min="{{ date('Y-m-d') }}" />
                        @error('service_date')<div class="form-error">{{ $message }}</div>@enderror
                    </div>
                    
                    <button type="submit" class="btn-submit"><i class="fas fa-paper-plane"></i>{{ __('services.submit') }}</button>
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

    </script>

    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 40px;">
                <!-- Company Info -->
                <div>
                    <h4 style="margin-bottom: 15px; font-size: 18px; font-weight: 700;">{{ __('home.nav_brand') }}</h4>
                    <p style="opacity: 0.9; line-height: 1.6; font-size: 14px;">{{ __('home.seo_description') }}</p>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 style="margin-bottom: 15px; font-size: 18px; font-weight: 700;">Contact</h4>
                    <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
                        <a href="tel:+41791234567" style="color: rgba(255,255,255,0.9); text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-phone"></i> +41 79 123 45 67
                        </a>
                        <a href="mailto:info@janiracare.ch" style="color: rgba(255,255,255,0.9); text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-envelope"></i> info@janiracare.ch
                        </a>
                        <p style="margin: 0; opacity: 0.9; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-map-marker-alt"></i> Zürich, Switzerland
                        </p>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div>
                    <h4 style="margin-bottom: 15px; font-size: 18px; font-weight: 700;">Follow Us</h4>
                    <div style="display: flex; gap: 12px;">
                        <a href="https://www.facebook.com/profile.php?id=61586744824189&locale=sq_AL" target="_blank" style="width: 40px; height: 40px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#1877f2'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/janiracare/" target="_blank" style="width: 40px; height: 40px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#E4405F'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/janira-care-3201833a7" target="_blank" style="width: 40px; height: 40px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#0077b5'" onmouseout="this.style.background='rgba(255,255,255,0.15)'">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 25px; text-align: center;">
                <p style="opacity: 0.9;">&copy; {{ date('Y') }} {{ __('home.nav_brand') }}. {{ __('home.footer_rights') }}</p>
                <p style="margin-top: 10px;">
                    <a href="{{ route('login') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; font-size: 13px;" aria-label="Login to admin panel">Admin Login</a>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>