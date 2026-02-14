<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('services_details.page_title') }} | {{ __('home.nav_brand') }}</title>
    <meta name="description" content="{{ __('services_details.page_subtitle') }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ __('services_details.page_title') }} | {{ __('home.nav_brand') }}">
    <meta property="og:description" content="{{ __('services_details.page_subtitle') }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/simple.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    <style>
        body { margin: 0; background: #F6F9FC; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* Navbar (same as home) */
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
            width: 100%;
            max-width: min(1200px, 100%);
            position: relative;
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
        .navbar-logo { height: 50px; width: auto; display: block; }
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 4px;
            cursor: pointer;
            z-index: 1001;
            padding: 8px;
            position: relative;
            background: transparent;
            border: none;
        }
        .hamburger span {
            width: 25px;
            height: 3px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 3px;
            transition: all 0.3s ease;
        }
        .hamburger.active span:nth-child(1) { transform: rotate(45deg) translate(8px, 8px); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: rotate(-45deg) translate(7px, -7px); }
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
        .navbar-menu a:hover { color: #4facfe; }
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
        .navbar-menu a:hover::after { width: 100%; }
        .lang-switcher { display: flex; gap: 6px; }
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

        /* Services details styles */
        .services-details-wrapper { padding: 26px 0 10px; }
        .services-details-header { text-align: center; margin-bottom: 28px; }
        .services-details-hero {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 20px;
            align-items: center;
            background: linear-gradient(135deg, rgba(18,72,126,0.05), rgba(247,149,203,0.08));
            border: 1px solid rgba(18,72,126,0.08);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
        }
        .services-details-hero img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 10px 24px rgba(18,72,126,0.12);
        }
        .services-details-title { font-size: 1.8rem; color: #12487E; font-weight: 700; margin-bottom: 8px; }
        .services-details-subtitle { font-size: 1rem; color: #666; max-width: 820px; margin: 0 auto; line-height: 1.6; }
        .services-details-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-top: 20px;
        }
        .services-details-card {
            background: #fff;
            border: 1px solid #eef2f7;
            border-radius: 14px;
            padding: 18px 18px 14px;
            box-shadow: 0 6px 16px rgba(18,72,126,0.06);
            position: relative;
            overflow: hidden;
        }
        .services-details-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, rgba(247,149,203,0.25) 0%, rgba(247,149,203,0) 70%);
        }
        .services-details-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(18,72,126,0.08);
            color: #12487E;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .services-details-card h3 { margin: 0 0 10px; color: #12487E; font-size: 1.1rem; font-weight: 700; }
        .services-details-card ul { margin: 0; padding-left: 18px; color: #4a5568; line-height: 1.55; font-size: 0.95rem; }
        .services-details-footer { margin-top: 22px; text-align: center; color: #4a5568; font-size: 0.95rem; }
        .services-details-cta {
            margin-top: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #12487E 0%, #F795CB 100%);
            color: white;
            padding: 12px 28px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(18,72,126,0.25);
            transition: all 0.3s ease;
        }
        .services-details-cta:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(18,72,126,0.35); }
        .services-details-extra {
            margin-top: 28px;
            background: #fff;
            border: 1px solid #eef2f7;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 8px 18px rgba(18,72,126,0.06);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px;
            text-align: left;
        }
        .services-details-extra .extra-card {
            background: linear-gradient(135deg, rgba(18,72,126,0.04), rgba(247,149,203,0.06));
            border: 1px dashed rgba(18,72,126,0.12);
            border-radius: 12px;
            padding: 14px 14px 12px;
        }
        .services-details-extra .extra-title {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #12487E;
            font-weight: 700;
            margin-bottom: 6px;
            font-size: 0.98rem;
        }
        .services-details-extra p { margin: 0; color: #5a6473; font-size: 0.9rem; line-height: 1.5; }

        /* Footer (same as home) */
        .footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 50px 0 30px;
            text-align: center;
            margin-top: 80px;
        }
        .footer .container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }
        .footer a { color: #4facfe; text-decoration: none; transition: color 0.3s; }
        .footer a:hover { color: #00f2fe; }

        /* Back to top */
        .back-to-top {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #fff;
            color: #12487E;
            border: 2px solid rgba(18,72,126,0.12);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(18,72,126,0.15);
        }

        @media (max-width: 1100px) {
            .services-details-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 900px) {
            .services-details-hero { grid-template-columns: 1fr; }
            .services-details-hero img { height: 200px; }
        }
        @media (max-width: 700px) {
            .services-details-grid { grid-template-columns: 1fr; }
            .services-details-extra { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .hamburger { display: flex; margin-left: auto; margin-right: 40px; }
            .navbar .container { overflow: visible; }
            .navbar-menu {
                position: fixed;
                top: 0;
                right: -280px;
                width: 280px;
                max-width: 85vw;
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
                overflow-y: auto;
                visibility: hidden;
                opacity: 0;
                pointer-events: none;
            }
            .navbar-menu.active {
                right: 0;
                visibility: visible;
                opacity: 1;
                pointer-events: auto;
            }
            .navbar-menu a { font-size: 18px; width: 100%; text-align: center; padding: 12px 0; }
            .lang-switcher { flex-direction: column; width: 100%; gap: 10px; }
            .lang-btn { width: 100%; justify-content: center; padding: 10px 15px; font-size: 15px; text-align: center; }
            .navbar-brand { font-size: 18px; }
        }
    </style>
</head>
<body>
    <header role="banner">
        <nav class="navbar" role="navigation" aria-label="Main navigation">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand" aria-label="Homepage">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __('home.nav_brand') }}" class="navbar-logo">
                </a>
                <div class="hamburger" id="hamburger" aria-label="Toggle menu" role="button" tabindex="0">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="navbar-menu" id="navbarMenu">
                    <li><a href="{{ url('/#home') }}" aria-label="{{ __('home.nav_home') }}">{{ __('home.nav_home') }}</a></li>
                    <li><a href="{{ url('/services') }}" aria-label="{{ __('home.nav_services') }}">{{ __('home.nav_services') }}</a></li>
                    <li><a href="{{ route('services.details') }}" aria-label="{{ __('home.nav_services_details') }}">{{ __('home.nav_services_details') }}</a></li>
                    <li><a href="{{ url('/#contact') }}" aria-label="{{ __('home.nav_contact') }}">{{ __('home.nav_contact') }}</a></li>
                    <li class="lang-switcher">
                        <a href="{{ url('/lang/de') }}" class="lang-btn {{ app()->getLocale() == 'de' ? 'active' : '' }}" aria-label="Switch to German">🇩🇪 Deutsch</a>
                        <a href="{{ url('/lang/fr') }}" class="lang-btn {{ app()->getLocale() == 'fr' ? 'active' : '' }}" aria-label="Switch to French">🇫🇷 Français</a>
                        <a href="{{ url('/lang/sq') }}" class="lang-btn {{ app()->getLocale() == 'sq' ? 'active' : '' }}" aria-label="Switch to Albanian">🇦🇱 Shqip</a>
                        <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}" aria-label="Switch to English">🇬🇧 English</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main-content" role="main" class="services-details-wrapper">
        <div class="container">
            <div class="services-details-hero">
                <div>
                    <div class="services-details-header">
                        <h1 class="services-details-title">{{ __('services_details.page_title') }}</h1>
                        <p class="services-details-subtitle">{{ __('services_details.page_subtitle') }}</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('images/service2.png') }}" alt="{{ __('services_details.page_title') }}">
                </div>
            </div>

            @php
                $categories = __('services_details.categories');
                $icons = [
                    'fas fa-hands-wash',
                    'fas fa-syringe',
                    'fas fa-people-carry-box',
                    'fas fa-house',
                    'fas fa-clock',
                    'fas fa-heart-circle-plus',
                ];
            @endphp
            <div class="services-details-grid">
                @foreach($categories as $index => $category)
                    <div class="services-details-card">
                        <div class="services-details-icon"><i class="{{ $icons[$index] ?? 'fas fa-notes-medical' }}" aria-hidden="true"></i></div>
                        <h3>{{ $category['title'] }}</h3>
                        <ul>
                            @foreach($category['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>

            <div class="services-details-footer">
                {{ __('services_details.footer_note') }}
                <div style="margin-top:12px;">
                    <a href="{{ route('clients.create') }}" class="services-details-cta">
                        <i class="fas fa-calendar-check" aria-hidden="true"></i>
                        {{ __('home.services_cta') }}
                    </a>
                </div>
                <div style="margin-top:16px;">
                    <img src="{{ asset('images/service1.png') }}" alt="{{ __('services_details.page_title') }}" style="width: 100%; max-width: 720px; border-radius: 14px; box-shadow: 0 10px 24px rgba(18,72,126,0.12);">
                </div>
            </div>

            <div class="services-details-extra">
                <div class="extra-card">
                    <div class="extra-title"><i class="fas fa-check-circle" aria-hidden="true"></i> {{ __('services_details.extra_1_title') }}</div>
                    <p>{{ __('services_details.extra_1_text') }}</p>
                </div>
                <div class="extra-card">
                    <div class="extra-title"><i class="fas fa-heart" aria-hidden="true"></i> {{ __('services_details.extra_2_title') }}</div>
                    <p>{{ __('services_details.extra_2_text') }}</p>
                </div>
                <div class="extra-card">
                    <div class="extra-title"><i class="fas fa-clock" aria-hidden="true"></i> {{ __('services_details.extra_3_title') }}</div>
                    <p>{{ __('services_details.extra_3_text') }}</p>
                </div>
            </div>
        </div>
    </main>

    <button class="back-to-top" id="backToTop" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" aria-label="Back to top">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

    <footer class="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 40px;">
                <div>
                    <h4 style="margin-bottom: 15px; font-size: 18px; font-weight: 700;">{{ __('home.nav_brand') }}</h4>
                    <p style="opacity: 0.9; line-height: 1.6; font-size: 14px;">{{ __('home.seo_description') }}</p>
                </div>
                <div>
                    <h4 style="margin-bottom: 15px; font-size: 18px; font-weight: 700;">Contact</h4>
                    <div style="display: flex; flex-direction: column; gap: 10px; font-size: 14px;">
                        <a href="tel:+41714227777" style="color: rgba(255,255,255,0.9); text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-phone"></i> +41 71 422 77 77
                        </a>
                        <a href="mailto:info@janiracare.ch" style="color: rgba(255,255,255,0.9); text-decoration: none; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-envelope"></i> info@janiracare.ch
                        </a>
                        <p style="margin: 0; opacity: 0.9; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-map-marker-alt"></i> Zürich, Switzerland
                        </p>
                    </div>
                </div>
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
                <p itemprop="copyrightNotice" style="opacity: 0.9;">&copy; {{ date('Y') }} {{ __('home.nav_brand') }}. {{ __('home.footer_rights') }}</p>
                <p style="margin-top: 10px;">
                    <a href="{{ route('login') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; font-size: 13px;" aria-label="Login to admin panel">Admin Login</a>
                </p>
            </div>
        </div>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navbarMenu = document.getElementById('navbarMenu');
        if (hamburger && navbarMenu) {
            // Ensure closed by default on load
            hamburger.classList.remove('active');
            navbarMenu.classList.remove('active');
            hamburger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                hamburger.classList.toggle('active');
                navbarMenu.classList.toggle('active');
            });
            navbarMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('active');
                    navbarMenu.classList.remove('active');
                });
            });
            document.addEventListener('click', function(e) {
                if (!hamburger.contains(e.target) && !navbarMenu.contains(e.target)) {
                    hamburger.classList.remove('active');
                    navbarMenu.classList.remove('active');
                }
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    hamburger.classList.remove('active');
                    navbarMenu.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>
