<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>{{ __('home.seo_title') }}</title>
    <meta name="description" content="{{ __('home.seo_description') }}">
    <meta name="keywords" content="{{ __('home.seo_keywords') }}">
    <meta name="author" content="{{ __('home.nav_brand') }}">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ __('home.seo_title') }}">
    <meta property="og:description" content="{{ __('home.seo_description') }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url('/') }}">
    <meta name="twitter:title" content="{{ __('home.seo_title') }}">
    <meta name="twitter:description" content="{{ __('home.seo_description') }}">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://images.unsplash.com">
    
    <!-- Stylesheets -->
    <link href="{{ asset('css/simple.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    
    <!-- JSON-LD Schema Markup -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalBusiness",
      "name": "{{ __('home.nav_brand') }}",
      "description": "{{ __('home.seo_description') }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "image": "{{ asset('images/og-image.jpg') }}",
      "priceRange": "CHF",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "CH"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "127"
      },
      "medicalSpecialty": ["Geriatrics", "ElderCare", "HomeCare"],
      "availableService": [
        {
          "@type": "MedicalProcedure",
          "name": "{{ __('home.service_elderly_care') }}"
        },
        {
          "@type": "MedicalProcedure",
          "name": "{{ __('home.service_hygiene') }}"
        }
      ]
    }
    </script>
    <style>
        /* ============================================
           SWISS HEALTHCARE DESIGN SYSTEM
           Inspired by Swiss medical precision & warmth
           Background: Artistic canton map concept
        ============================================ */
        
        * {
            box-sizing: border-box;
        }
        
        body {
            width: 100%;
            max-width: 100vw;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        
        :root {
            /* Logo / brand colors */
            --brand-blue: #12487E; /* primary */
            --brand-pink: #F795CB; /* accent */
            --brand-white: #FFFFFF;

            /* Compatibility aliases used throughout the CSS */
            --swiss-blue: var(--brand-blue);
            --medical-teal: var(--brand-pink);

            /* Common tokens */
            --text-primary: #0f1724;
            --text-secondary: #6b7280;
            --warm-beige: rgba(247,149,203,0.06);
            --shadow-md: 0 8px 24px rgba(18,72,126,0.06);
            --shadow-lg: 0 20px 60px rgba(18,72,126,0.10);

            --gradient-brand: linear-gradient(135deg, var(--brand-blue) 0%, var(--brand-pink) 100%);
            --gradient-cta: linear-gradient(90deg, var(--brand-blue) 0%, var(--brand-pink) 100%);
        }

        /* Branding overrides to adopt logo colors across commonly used components */
        .navbar-brand {
            background: var(--gradient-brand);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-hero-main {
            background: var(--gradient-cta) !important;
            box-shadow: 0 10px 30px rgba(18,72,126,0.12);
            color: var(--brand-white);
        }

        .btn-hero-ghost {
            background: rgba(255,255,255,0.06);
            color: var(--brand-white);
            border: 1px solid rgba(18,72,126,0.08);
        }

        .hero .btn-primary {
            background: var(--brand-white);
            color: var(--brand-blue);
            border-color: transparent;
        }

        .hero-decor {
            background: radial-gradient(circle at 30% 30%, rgba(18,72,126,0.14), rgba(247,149,203,0.04));
        }

        .footer {
            background: var(--gradient-brand);
        }

        .service-icon {
            background: rgba(18,72,126,0.06);
        }

        .contact-card .icon-circle {
            background: var(--brand-blue);
        }

        .back-to-top {
            background: var(--brand-white);
            color: var(--brand-blue);
            border: 2px solid rgba(18,72,126,0.12);
        }

        .team-badge {
            background: var(--brand-pink);
            color: var(--brand-white);
        }

        .review-arrow {
            border-color: var(--brand-blue);
            color: var(--brand-blue);
        }

        .review-arrow:hover {
            background: var(--brand-blue);
            color: var(--brand-white);
        }

        .lang-btn {
            border: 1.5px solid rgba(18,72,126,0.12);
            color: var(--brand-blue);
            background: rgba(18,72,126,0.04);
        }

        .lang-btn.active {
            background: var(--brand-blue);
            color: var(--brand-white);
        }

        /* Small utility: make any leftover hard-coded gradients lean on brand variables */
        .bg-brand-gradient {
            background: var(--gradient-brand) !important;
        }
        
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
        
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        html { 
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
            font-size: var(--font-base);
        }
        
        body { 
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.75;
            color: var(--text-primary);
            background: var(--off-white);
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
        
        /* Medical stethoscope circular shapes */
        .section::after {
            content: '';
            position: absolute;
            width: 380px;
            height: 380px;
            border-radius: 45% 55% 52% 48% / 50% 58% 42% 50%;
            background: radial-gradient(circle, rgba(26, 188, 156, 0.08), rgba(52, 152, 219, 0.05) 50%, transparent);
            z-index: -1;
            animation: doctorFloat 28s ease-in-out infinite;
        }
        
        .section:nth-child(odd)::after {
            top: -100px;
            right: 8%;
            background: radial-gradient(circle, rgba(41, 128, 185, 0.09), rgba(155, 89, 182, 0.06) 50%, transparent);
        }
        
        .section:nth-child(even)::after {
            bottom: -100px;
            left: 5%;
            animation-delay: -14s;
            background: radial-gradient(circle, rgba(46, 204, 113, 0.08), rgba(230, 126, 34, 0.05) 50%, transparent);
        }
        
        @keyframes doctorFloat {
            0%, 100% { 
                transform: translateY(0) rotate(0deg) scale(1);
                border-radius: 45% 55% 52% 48% / 50% 58% 42% 50%;
            }
            25% { 
                transform: translateY(-25px) rotate(8deg) scale(1.05);
                border-radius: 50% 50% 48% 52% / 55% 45% 60% 40%;
            }
            50% { 
                transform: translateY(-15px) rotate(-5deg) scale(1.08);
                border-radius: 58% 42% 50% 50% / 48% 52% 45% 55%;
            }
            75% { 
                transform: translateY(-30px) rotate(10deg) scale(1.03);
                border-radius: 42% 58% 55% 45% / 52% 48% 58% 42%;
            }
        }
        
        /* ============================================
           NAVIGATION - Responsive with Hamburger
        ============================================ */
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
                margin-left: auto;
            }
            .navbar .container {
                overflow: visible;
            }
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
        
        /* ============================================
           HERO SECTION - Warm & trustworthy
           Background with organic hand-drawn feel
        ============================================ */
        .hero { 
            position: relative;
            min-height: 680px;
            overflow: hidden;
            padding: var(--space-xl) 0;
        }
        
        /* Artistic medical illustration overlay */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 30%, rgba(91, 143, 185, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 60%, rgba(118, 168, 157, 0.10) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 80%, rgba(212, 197, 176, 0.12) 0%, transparent 50%);
            z-index: 1;
        }
        
        /* Swiss cross subtle pattern */
        .hero::after {
            content: '';
            position: absolute;
            top: 10%;
            right: 8%;
            width: 180px;
            height: 180px;
            background: 
                linear-gradient(90deg, transparent 45%, rgba(91, 143, 185, 0.04) 45%, rgba(91, 143, 185, 0.04) 55%, transparent 55%),
                linear-gradient(0deg, transparent 45%, rgba(91, 143, 185, 0.04) 45%, rgba(91, 143, 185, 0.04) 55%, transparent 55%);
            border-radius: 50%;
            z-index: 1;
            animation: gentleFloat 8s ease-in-out infinite;
        }
        
        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
            50% { transform: translateY(-15px) rotate(5deg); opacity: 0.6; }
        }
        
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 2s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        
        .hero-slide.active {
            opacity: 1;
        }
        
        /* Warm medical overlay - not aggressive */
        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(
                    128deg, 
                    rgba(91, 143, 185, 0.72) 0%, 
                    rgba(118, 168, 157, 0.68) 48%,
                    rgba(154, 179, 160, 0.70) 100%
                );
            mix-blend-mode: multiply;
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
            min-height: 680px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 var(--space-md);
        }
        
        .hero h1 { 
            font-size: var(--font-hero);
            margin-bottom: var(--space-md);
            font-weight: 600;
            line-height: 1.15;
            text-shadow: 0 2px 12px rgba(44, 62, 80, 0.25);
            letter-spacing: -0.5px;
        }
        
        .hero p { 
            font-size: var(--font-xl);
            margin-bottom: var(--space-lg);
            max-width: 720px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.96;
            line-height: 1.65;
        }

        /* Hero - modern glass CTA and layout */
        .hero { position: relative; overflow: hidden; }
        .hero-content { position: relative; z-index: 2; padding: 80px 0; }
        .hero-copy h1 { margin:8px 0 8px 0; font-size:42px; line-height:1.05; color: #fff; }
        .hero-copy p { color: rgba(255,255,255,0.92); max-width: 640px; }

        .btn-hero-main { background: linear-gradient(90deg,#667eea,#4facfe); color: white; padding:14px 26px; border-radius:12px; font-weight:700; text-decoration:none; display:inline-block; box-shadow: 0 10px 30px rgba(79,172,254,0.18); }
        .btn-hero-main:focus { outline: 3px solid rgba(79,172,254,0.22); }
        .btn-hero-ghost { background: rgba(255,255,255,0.12); color: #fff; padding:12px 18px; border-radius:10px; text-decoration:none; font-weight:600; border:1px solid rgba(255,255,255,0.08); }

        .hero-decor { position:absolute; right:-120px; bottom:-80px; width:520px; height:520px; background: radial-gradient(circle at 30% 30%, rgba(79,172,254,0.14), rgba(79,172,254,0.04)); transform: rotate(-12deg) scale(1.02); filter: blur(6px); pointer-events:none; }

        @media (max-width: 900px) {
            .hero-grid { grid-template-columns: 1fr; }
            .hero-copy h1 { font-size: 32px; }
            .hero-decor { display:none; }
        }

        /* ============================================
           PRIMARY CTA BUTTON - Friendly pill shape
        ============================================ */
        .hero .btn-primary {
            background: white;
            color: var(--swiss-blue);
            padding: 18px 48px;
            border-radius: 48px;
            text-decoration: none;
            font-weight: 600;
            font-size: var(--font-lg);
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-lg);
            border: 2px solid transparent;
        }
        
        .hero .btn-primary:hover { 
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 48px rgba(91, 143, 185, 0.25);
            border-color: var(--warm-beige);
        }

        /* ============================================
           LAYOUT CONTAINERS
        ============================================ */
        .container { 
            max-width: min(1280px, 100%);
            width: 100%;
            margin: 0 auto;
            padding: 0 var(--space-md);
        }

        /* ============================================
           SECTIONS - Organic spacing & separators
        ============================================ */
        .section { 
            padding: var(--space-xl) var(--space-md);
            position: relative;
        }
        
        /* Wave separator between sections */
        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(
                90deg,
                transparent 0%,
                rgba(91, 143, 185, 0.08) 15%,
                rgba(118, 168, 157, 0.10) 50%,
                rgba(91, 143, 185, 0.08) 85%,
                transparent 100%
            );
        }
        
        .section:first-of-type::before {
            display: none;
        }
        
        .section-title { 
            text-align: center;
            font-size: var(--font-2xl);
            margin-bottom: var(--space-sm);
            color: var (--text-primary);
            font-weight: 600;
            letter-spacing: -0.3px;
        }
        
        .section-subtitle {
            text-align: center;
            font-size: var(--font-lg);
            color: var(--text-secondary);
            margin-bottom: var(--space-lg);
            max-width: 820px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
        }

        /* ============================================
           SERVICE CARDS - Floating with depth
        ============================================ */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 30px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .service-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-radius: 16px;
            padding: 24px 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            border: 2px solid rgba(18, 72, 126, 0.08);
            position: relative;
            overflow: hidden;
            text-align: center;
            max-width: 350px;
            margin: 0 auto;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #12487E 0%, #F795CB 100%);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .service-card:hover::before {
            transform: scaleX(1);
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(18, 72, 126, 0.12);
            border-color: rgba(18, 72, 126, 0.2);
            background: #ffffff;
        }
        
        .service-icon {
            font-size: 36px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 70px;
            margin-left: auto;
            margin-right: auto;
            background: linear-gradient(135deg, rgba(18, 72, 126, 0.1) 0%, rgba(247, 149, 203, 0.1) 100%);
            border-radius: 50%;
            color: #12487E;
            position: relative;
            z-index: 1;
            box-shadow: 0 2px 8px rgba(18, 72, 126, 0.08);
        }
        
        .service-card:hover .service-icon {
            background: linear-gradient(135deg, #12487E 0%, #F795CB 100%);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(18, 72, 126, 0.15);
        }
        
        .service-card h3 {
            font-size: 17px;
            margin-bottom: 8px;
            color: #12487E;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        
        .service-card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 13px;
            position: relative;
            z-index: 1;
            margin: 0;
        }

        /* ============================================
           GALLERY - Gentle rounded aesthetic
        ============================================ */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
            gap: var(--space-md);
            margin-top: var(--space-lg);
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 24px;
            height: 420px;
            background: rgba(91, 143, 185, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--soft-gray);
            font-size: var(--font-base);
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            border: 1px solid rgba(91, 143, 185, 0.10);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.6s ease;
        }
        
        .gallery-item:hover {
            box-shadow: var(--shadow-md);
            border-color: rgba(118, 168, 157, 0.15);
        }
        
        .gallery-item:hover img {
            transform: scale(1.08);
        }
        
        /* ============================================
           FILTER BUTTONS - Swiss precision
        ============================================ */
        .filter-btn {
            background: white;
            border: 2px solid rgba(18, 72, 126, 0.2);
            color: #12487E;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 13px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        
        .filter-btn:hover {
            background: #12487E;
            color: white;
            border-color: #12487E;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(18, 72, 126, 0.2);
        }
        
        .filter-btn.active {
            background: linear-gradient(135deg, #12487E 0%, #F795CB 100%);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(18, 72, 126, 0.25);
        }
        
        /* ============================================
           BACK TO TOP - Soft & accessible
        ============================================ */
        .back-to-top {
            position: fixed;
            bottom: var(--space-lg);
            right: var(--space-lg);
            background: var(--swiss-blue);
            color: white;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 2px solid white;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
        }
        
        .back-to-top:hover {
            background: var(--medical-teal);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 10px 32px rgba(118, 168, 157, 0.35);
        }
        
        .back-to-top.show {
            display: flex;
        }
        
        /* ============================================
           LIGHTBOX - Elegant presentation
        ============================================ */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(44, 62, 80, 0.94);
            backdrop-filter: blur(8px);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        
        .lightbox.active {
            display: flex;
        }
        
        .lightbox img {
            max-width: 92%;
            max-height: 92%;
            object-fit: contain;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
        }
        
        .lightbox-close {
            position: absolute;
            top: 32px;
            right: 42px;
            color: white;
            font-size: 42px;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.12);
            border: none;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10000;
        }
        
        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.22);
            transform: rotate(90deg);
        }

        /* ============================================
           CONTACT FORM - Accessible & clear
        ============================================ */
        .contact-section {
            background: rgba(91, 143, 185, 0.03);
        }
        
        .contact-form {
            background: white;
            padding: var(--space-lg);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(91, 143, 185, 0.08);
        }
        
        .form-group {
            margin-bottom: var (--space-md);
        }
        
        .form-group label {
            display: block;
            margin-bottom: var(--space-xs);
            font-weight: 600;
            color: var(--text-primary);
            font-size: var(--font-lg);
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid rgba(91, 143, 185, 0.15);
            border-radius: 16px;
            font-size: var(--font-base);
            transition: all 0.3s ease;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--swiss-blue);
            box-shadow: 0 0 0 3px rgba(91, 143, 185, 0.08);
        }
        
        .form-group textarea {
            min-height: 160px;
            resize: vertical;
            line-height: 1.6;
        }
        
        .btn-submit {
            background: var(--swiss-blue);
            color: white;
            padding: 16px 44px;
            border: none;
            border-radius: 42px;
            font-size: var(--font-lg);
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-md);
        }
        
        .btn-submit:hover {
            background: var(--medical-teal);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* ============================================
           FOOTER - same as services
        ============================================ */
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

        /* ============================================
           ALERTS - Clear feedback
        ============================================ */
        .alert {
            padding: var(--space-sm) var(--space-md);
            border-radius: 18px;
            margin-bottom: var(--space-md);
            text-align: center;
            font-size: var(--font-base);
        }
        
        .alert-success {
            background: rgba(154, 179, 160, 0.12);
            color: #2d5f3d;
            border: 1.5px solid rgba(154, 179, 160, 0.3);
        }

        /* ============================================
           REVIEW CARDS - Trust indicators
        ============================================ */
        .reviews-slider {
            position: relative;
            min-height: 320px;
            overflow: hidden;
        }
        
        .review-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            transform: translateX(60px);
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }
        
        .review-slide.active {
            opacity: 1;
            transform: translateX(0);
            pointer-events: auto;
        }
        
        .review-card {
            background: white;
            padding: var(--space-lg);
            border-radius: 28px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(118, 168, 157, 0.12);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            max-width: 680px;
            margin: 0 auto;
        }
        
        .review-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: var(--medical-teal);
        }
        
        .review-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 2px solid var(--swiss-blue);
            color: var(--swiss-blue);
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 10;
            box-shadow: var (--shadow-md);
        }
        
        .review-arrow:hover {
            background: var(--swiss-blue);
            color: white;
            transform: translateY(-50%) scale(1.08);
        }
        
        .review-arrow-prev {
            left: -72px;
        }
        
        .review-arrow-next {
            right: -72px;
        }
        
        .review-dots {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: var(--space-lg);
        }
        
        .review-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(91, 143, 185, 0.25);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .review-dot.active {
            background: var(--medical-teal);
            width: 36px;
            border-radius: 8px;
        }
        
        .review-dot:hover {
            background: var(--swiss-blue);
        }
        
        @media (max-width: 1024px) {
            .review-arrow-prev {
                left: 12px;
            }
            .review-arrow-next {
                right: 12px;
            }
        }

        /* ============================================
           TEAM CARDS - Human touch
        ============================================ */
        .team-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(91, 143, 185, 0.08);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
        }
        
        .team-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--swiss-blue);
        }
        
        .team-photo {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
            background: rgba(91, 143, 185, 0.05);
        }
        
        .team-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .team-card:hover .team-photo img {
            transform: scale(1.08);
        }
        
        .team-info {
            padding: var(--space-md) var(--space-sm);
        }
        
        .team-info h3 {
            font-size: var(--font-xl);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }
        
        .team-role {
            font-size: var(--font-base);
            font-weight: 600;
            color: var(--medical-teal);
            margin-bottom: var(--space-sm);
        }
        
        .team-bio {
            font-size: var(--font-base);
            color: var (--text-secondary);
            line-height: 1.7;
        }

        /* Alternative team card style */
        .team-card-advanced {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            border: 1px solid rgba(91, 143, 185, 0.08);
        }
        
        .team-card-advanced:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
        }
        
        .team-badge {
            background: var(--medical-teal);
            color: white;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            border-radius: 24px;
            margin-bottom: var(--space-sm);
        }
        
        .team-photo-advanced {
            width: 100%;
            height: 320px;
            overflow: hidden;
            background: rgba(91, 143, 185, 0.05);
        }
        
        .team-photo-advanced img {
            width: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        
        .team-card-advanced:hover .team-photo-advanced img {
            transform: scale(1.08);
        }
        
        .team-info-advanced {
            padding: var(--space-md) var(--space-sm);
        }
        
        .team-info-advanced h3 {
            font-size: var(--font-xl);
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 var(--space-xs) 0;
        }
        
        .team-role-advanced {
            color: var(--medical-teal);
            font-weight: 600;
            font-size: var(--font-base);
            margin: 0 0 var(--space-sm) 0;
        }
        
        .team-bio-advanced {
            color: var(--text-secondary);
            line-height: 1.7;
            font-size: var(--font-base);
            margin: var(--space-sm) 0;
        }
        
        .team-skill {
            display: inline-block;
            background: rgba(118, 168, 157, 0.12);
            color: var(--medical-teal);
            padding: 6px 14px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 600;
            margin: 4px;
        }

        /* ============================================
           TIMELINE - Visual storytelling
        ============================================ */
        .timeline {
            position: relative;
            padding: var(--space-md) 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(
                to bottom,
                var(--swiss-blue),
                var(--medical-teal),
                var (--sage-green)
            );
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .timeline-item {
            display: flex;
            align-items: center;
            gap: var(--space-lg);
            margin-bottom: var(--space-xl);
            position: relative;
        }
        
        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }
        
        .timeline-year {
            min-width: 130px;
            font-size: var(--font-2xl);
            font-weight: 600;
            color: var(--swiss-blue);
            text-align: center;
        }
        
        .timeline-content {
            flex: 1;
            background: white;
            padding: var(--space-md);
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            border-left: 4px solid var(--medical-teal);
        }
        
        .timeline-content h3 {
            font-size: var(--font-xl);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-xs);
        }
        
        .timeline-content p {
            color: var(--text-secondary);
            line-height: 1.8;
        }

        /* ============================================
           RESPONSIVE DESIGN - Mobile optimization
           Larger touch targets for elderly users
        ============================================ */
        @media (max-width: 1024px) {
            :root {
                --font-base: 17px;
                --font-lg: 20px;
                --font-xl: 26px;
                --font-2xl: 34px;
                --font-hero: 44px;
            }
            
            .navbar-menu {
                gap: var (--space-md);
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            :root {
                --space-md: 20px;
                --space-lg: 32px;
                --space-xl: 52px;
            }
            
            .hero {
                min-height: 560px;
            }
            
            .hero h1 {
                font-size: var(--font-2xl);
            }
            
            .hero p {
                font-size: var(--font-lg);
            }
            
            /* Navbar mobile styles handled above in navbar section */
            
            .section {
                padding: var(--space-lg) var(--space-sm);
            }
            
            .timeline::before {
                left: 32px;
            }
            
            .timeline-item {
                flex-direction: column !important;
                align-items: flex-start;
                padding-left: 68px;
            }
            
            .timeline-year {
                position: absolute;
                left: 0;
                min-width: 90px;
                font-size: var(--font-xl);
            }
            
            .back-to-top {
                bottom: var(--space-md);
                right: var(--space-md);
                width: 50px;
                height: 50px;
            }
        }
        
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 32px;
            }
            
            .service-card {
                padding: var(--space-md);
            }
        }
        
        /* Print styles for medical documentation */
        @media print {
            body::before,
            body::after {
                display: none;
            }
            
            .navbar,
            .back-to-top,
            .hero {
                display: none;
            }
            
            .section {
                page-break-inside: avoid;
            }
        }

        /* ICON THEME - blue, accessible */
        :root { --swiss-blue: #4facfe; }

        /* Service icons (circle background, blue icon) */
        .service-icon {
            width: 72px;
            height: 72px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(79,172,254,0.08);
            margin-bottom: 12px;
            flex-shrink: 0;
        }
        .service-icon i {
            color: var(--swiss-blue);
            font-size: 30px;
            line-height: 1;
        }

        /* Contact cards - icon circle */
        .contact-card { display:flex; align-items:center; gap:20px; }
        .contact-card .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--swiss-blue);
            color: #fff;
            flex-shrink: 0;
            box-shadow: 0 6px 18px rgba(79,172,254,0.12);
            transition: transform 0.18s ease;
        }
        .contact-card .icon-circle i { font-size: 22px; }
        .contact-card:hover .icon-circle { transform: translateY(-4px); }

        /* Social icons - white icons on colored circle (keeps existing inline bg) */
        .social-links a { width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center; text-decoration:none; }
        .social-links a i { color: #fff; font-size: 18px; }
        .social-links a:hover { transform: translateY(-5px); }

        /* Back to top - ensure icon is blue on white background */
        .back-to-top { background: white; color: var(--swiss-blue); border: 2px solid rgba(79,172,254,0.14); }
        .back-to-top i { font-size: 18px; }

        /* STORY CARDS - image and hover */
        .story-grid .story-card { transition: transform 0.28s ease, box-shadow 0.28s ease; }
        .story-grid .story-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(31, 41, 55, 0.08); }
        .story-card .story-img { width: 100%; height: 140px; object-fit: cover; border-radius: 12px; margin-bottom: 12px; display: block; }

        /* Branding final overrides: force logo palette onto CTAs, forms and common controls */
        :root {
            --swiss-blue: var(--brand-blue);
            --medical-teal: var(--brand-pink);
        }

        /* Fix broken variable usages and ensure spacing variables apply */
        .form-group { margin-bottom: var(--space-md) !important; }
        .section-title { color: var(--text-primary) !important; }

        /* Buttons & CTAs */
        .btn-hero-main, .btn-hero-main:visited {
            background: var(--gradient-cta) !important;
            color: var(--brand-white) !important;
            box-shadow: 0 12px 36px rgba(18,72,126,0.10) !important;
        }
        .btn-hero-ghost {
            background: rgba(255,255,255,0.08) !important;
            color: var(--brand-white) !important;
            border: 1px solid rgba(18,72,126,0.08) !important;
        }
        .btn-submit {
            background: var(--brand-blue) !important;
            color: var(--brand-white) !important;
            border: none !important;
        }

        /* Filter buttons */
        .filter-btn {
            border: 2px solid rgba(18,72,126,0.14) !important;
            color: var(--brand-blue) !important;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--brand-pink) !important;
            color: var(--brand-white) !important;
            border-color: var(--brand-pink) !important;
        }

        /* Navbar/brand */
        .navbar-brand {
            background: var(--gradient-brand) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
        }
        .navbar-logo { height: 50px; width: auto; display: block; }
        .navbar-menu a:hover { color: var(--brand-blue) !important; }
        .hamburger span { background: var(--brand-blue) !important; }

        /* Back to top */
        .back-to-top { background: var(--brand-white) !important; color: var(--brand-blue) !important; border: 2px solid rgba(18,72,126,0.12) !important; }
        .back-to-top:hover { background: var(--brand-pink) !important; color: var(--brand-white) !important; }

        /* Team badges & review controls */
        .team-badge { background: var(--brand-pink) !important; color: var(--brand-white) !important; }
        .review-arrow { border-color: var(--brand-blue) !important; color: var(--brand-blue) !important; }
        .review-arrow:hover { background: var(--brand-blue) !important; color: var(--brand-white) !important; }

        /* Ensure gallery/tiles use subtle brand tints */
        .gallery-item { background: rgba(18,72,126,0.03) !important; border-color: rgba(18,72,126,0.08) !important; }

        /* Small accessibility tweak: ensure sufficient contrast for pink CTAs */
        .filter-btn.active, .filter-btn:hover, .btn-hero-main { outline-offset: 3px; }
    </style>
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" style="position: absolute; left: -9999px; z-index: 999; padding: 1em; background: #4facfe; color: white; text-decoration: none;" 
       onfocus="this.style.left = '10px'" onblur="this.style.left = '-9999px'">Skip to main content</a>
    
    <!-- Header with Navigation -->
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
                    <li><a href="#home" aria-label="{{ __('home.nav_home') }}">{{ __('home.nav_home') }}</a></li>
                    <li><a href="{{ url('/services') }}" aria-label="{{ __('home.nav_services') }}">{{ __('home.nav_services') }}</a></li>
                    <li><a href="{{ route('services.details') }}" aria-label="{{ __('home.nav_services_details') }}">{{ __('home.nav_services_details') }}</a></li>
                    <li><a href="#contact" aria-label="{{ __('home.nav_contact') }}">{{ __('home.nav_contact') }}</a></li>
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

    <!-- Main Content -->
    <main id="main-content" role="main">
        <!-- BookingTermin-style Hero (unique classes, localized) -->
        <section id="home" class="booking-hero-section" aria-label="{{ __('home.hero_aria', [], app()->getLocale()) }}">
            <style>
                /* Scoped booking hero CSS to avoid conflicts with global styles */
                .booking-hero-section { padding: 115px 0 95px; background: #F6F9FC; min-height: 80vh; display: flex; align-items: center; }
                .booking-hero-container { max-width: 1350px; margin: 0 auto; padding: 0 35px; }
                .booking-hero-layout { display:flex; gap:55px; align-items:center; justify-content:space-between; flex-wrap:wrap; }
                .booking-hero-textside { flex:1; min-width:280px; max-width:700px; }
                .booking-main-title { font-size: 2.7rem; line-height:1.25; margin:0 0 22px; color:#12487E; font-weight:700; }
                .booking-main-title span{ color:#F795CB; }
                .booking-hero-description{ color:#555; font-size:1.05rem; max-width:600px; margin-bottom:22px; line-height: 1.55; }
                .booking-cta-buttons{ display:flex; gap:16px; flex-wrap:wrap; margin-bottom:28px; }
                .booking-btn-primary-cta{ background:#12487E;color:#fff;padding:15px 34px;border-radius:999px;text-decoration:none;font-weight:600;border:2px solid #12487E; font-size:1.12rem; }
                .booking-btn-secondary-cta{ background:transparent;color:#12487E;padding:15px 34px;border-radius:999px;text-decoration:none;font-weight:600;border:2px solid #12487E; font-size:1.12rem; }
                .booking-stats-container{ display:flex; gap:14px; flex-wrap:wrap; margin-top:18px; align-items:stretch; }
                .booking-stat-card{ background: #fff; padding:16px 18px; border-radius:12px; box-shadow:0 6px 18px rgba(18,72,126,0.06); text-align:center; min-width:120px; flex:1; display:flex; flex-direction:column; justify-content:center; min-height:86px; }
                .booking-stat-number{ font-size:26px;font-weight:700;color:#12487E; display:block; margin-bottom:6px; }
                .booking-stat-text{ font-size:13px;color:#444; line-height:1.35; }
                .booking-hero-imageside{ flex:1; min-width:280px; text-align:center; }
                .booking-hero-visual{ width:100%; height:580px; object-fit:cover; border-radius:16px; display:block; box-shadow: 0 20px 60px rgba(18,72,126,0.15); }
                @media (max-width: 1200px) {
                    .booking-hero-section { padding: 95px 0 75px; }
                    .booking-main-title { font-size: 3rem; }
                    .booking-hero-description { font-size: 1.05rem; }
                    .booking-hero-visual { height: 480px; }
                }
                @media (max-width: 900px) {
                    .booking-hero-section { padding: 80px 0; min-height: auto; }
                    .booking-hero-container { padding: 0 20px; }
                    .booking-hero-layout{ flex-direction:column-reverse; gap:32px; }
                    .booking-hero-visual{ height:360px; }
                    .booking-main-title{ font-size:2.2rem; text-align:left; }
                    .booking-hero-description { font-size: 1rem; }
                    .booking-btn-primary-cta, .booking-btn-secondary-cta { padding: 12px 28px; font-size: 1rem; }
                }
                @media (max-width: 576px) {
                    .booking-hero-section { padding: 60px 0; }
                    .booking-main-title{ text-align:center; font-size:1.9rem; margin-bottom: 16px; }
                    .booking-hero-description{ text-align:center; font-size:0.98rem; }
                    .booking-cta-buttons{ justify-content:center; }
                    .booking-hero-visual{ height:300px; }
                    .booking-stat-card { min-width: 100px; padding: 12px 14px; }
                    .booking-stat-number { font-size: 20px; }
                    .booking-stat-text { font-size: 12px; }
                }
            </style>
                
            <div class="booking-hero-container">
                <div class="booking-hero-layout" data-aos="fade-up" data-aos-delay="80">
                    <div class="booking-hero-textside">
                        <h1 class="booking-main-title">{!! __('home.hero_title_html') !!}</h1>
                        <p class="booking-hero-description">{{ __('home.hero_subtitle') }}</p>

                        <div class="booking-cta-buttons">
                            <a href="{{ route('clients.create') }}" class="booking-btn-primary-cta" aria-label="{{ __('home.hero_cta_primary') }}">{{ __('home.hero_cta_primary') }}</a>
                            <a href="#how-it-works" class="booking-btn-secondary-cta" aria-label="{{ __('home.hero_cta_secondary') }}">{{ __('home.hero_cta_secondary') }}</a>
                        </div>

                        <div class="booking-stats-container" role="list" aria-label="{{ __('home.hero_stats_aria') }}">
                            <div class="booking-stat-card" role="listitem">
                                <span class="booking-stat-number">15</span>
                                <span class="booking-stat-text">{{ __('home.stat_doctors') }}</span>
                            </div>
                            <div class="booking-stat-card" role="listitem">
                                <span class="booking-stat-number">150</span>
                                <span class="booking-stat-text">{{ __('home.stat_patients') }}</span>
                            </div>
                            <div class="booking-stat-card" role="listitem">
                                <span class="booking-stat-number">24/7</span>
                                <span class="booking-stat-text">{{ __('home.stat_online') }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="booking-hero-imageside" aria-hidden="true">
                        <img class="booking-hero-visual" src="{{ asset('images/cover.jpg') }}" alt="{{ __('home.hero_image_alt') }}">
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section - BookingTermin Style -->
        <section id="how-it-works" class="booking-steps-section" aria-label="{{ __('home.how_it_works_aria') }}">
            <style>
                /* Scoped How It Works CSS with unique classes */
                .booking-steps-section { padding: 65px 0; background: #fff; }
                .booking-steps-container { max-width: 1200px; margin: 0 auto; padding: 0 25px; }
                .booking-section-header { text-align: center; margin-bottom: 45px; }
                .booking-section-title { font-size: 2.3rem; color: #12487E; font-weight: 700; margin-bottom: 12px; }
                .booking-section-subtitle { font-size: 1.05rem; color: #666; max-width: 680px; margin: 0 auto; line-height: 1.65; }
                .booking-steps-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 25px; margin-top: 40px; }
                .booking-step-card { background: transparent; padding: 24px 20px; border-radius: 15px; text-align: center; transition: all 0.3s ease; position: relative; border: 2px solid rgba(18,72,126,0.08); }
                .booking-step-card:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(18,72,126,0.11); border-color: #F795CB; }
                .booking-step-number { width: 54px; height: 54px; background: linear-gradient(135deg, #12487E, #1a5ba0); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; margin: 0 auto 14px; box-shadow: 0 5px 15px rgba(18,72,126,0.15); }
                .booking-step-icon { font-size: 1.85rem; color: #F795CB; margin-bottom: 12px; }
                .booking-step-title { font-size: 1.15rem; color: #12487E; font-weight: 600; margin-bottom: 10px; }
                .booking-step-description { font-size: 0.9rem; color: #666; line-height: 1.5; }
                
                @media (max-width: 900px) {
                    .booking-steps-section { padding: 55px 0; }
                    .booking-section-title { font-size: 2rem; }
                    .booking-steps-grid { gap: 22px; }
                }
                
                @media (max-width: 576px) {
                    .booking-steps-section { padding: 45px 0; }
                    .booking-section-header { margin-bottom: 32px; }
                    .booking-section-title { font-size: 1.7rem; }
                    .booking-section-subtitle { font-size: 0.95rem; }
                    .booking-steps-grid { grid-template-columns: 1fr; gap: 18px; }
                    .booking-step-card { padding: 28px 22px; }
                }
            </style>
            
            <div class="booking-steps-container">
                <div class="booking-section-header" data-aos="fade-up">
                    <h2 class="booking-section-title">{{ __('home.how_it_works_title') }}</h2>
                    <p class="booking-section-subtitle">{{ __('home.how_it_works_subtitle') }}</p>
                </div>
                
                <div class="booking-steps-grid">
                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="booking-step-number">1</div>
                        <div class="booking-step-icon"><i class="fas fa-search" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_1_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_1_description') }}</p>
                    </div>
                    
                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="booking-step-number">2</div>
                        <div class="booking-step-icon"><i class="fas fa-calendar-check" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_2_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_2_description') }}</p>
                    </div>
                    
                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="booking-step-number">3</div>
                        <div class="booking-step-icon"><i class="fas fa-bell" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_3_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_3_description') }}</p>
                    </div>
                    
                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="booking-step-number">4</div>
                        <div class="booking-step-icon"><i class="fas fa-user-doctor" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_4_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_4_description') }}</p>
                    </div>

                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="booking-step-number">5</div>
                        <div class="booking-step-icon"><i class="fas fa-hands-helping" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_5_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_5_description') }}</p>
                    </div>

                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="booking-step-number">6</div>
                        <div class="booking-step-icon"><i class="fas fa-comments" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_6_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_6_description') }}</p>
                    </div>

                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="700">
                        <div class="booking-step-number">7</div>
                        <div class="booking-step-icon"><i class="fas fa-shield-heart" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_7_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_7_description') }}</p>
                    </div>

                    <div class="booking-step-card" data-aos="fade-up" data-aos-delay="800">
                        <div class="booking-step-number">8</div>
                        <div class="booking-step-icon"><i class="fas fa-sliders" aria-hidden="true"></i></div>
                        <h3 class="booking-step-title">{{ __('home.step_8_title') }}</h3>
                        <p class="booking-step-description">{{ __('home.step_8_description') }}</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Our Story Section -->
    <section id="our-story" style="background: #F6F9FC; padding: 40px 0;" aria-labelledby="story-heading">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <!-- Section Header -->
            <div style="text-align: center; margin-bottom: 25px;" data-aos="fade-up">
                <h2 id="story-heading" style="font-size: 1.7rem; color: #12487E; font-weight: 700; margin-bottom: 8px;">{{ __('home.our_story_title') }}</h2>
                <p style="font-size: 0.9rem; color: #666; max-width: 600px; margin: 0 auto; line-height: 1.55;">{{ __('home.our_story_subtitle') }}</p>
            </div>

            <!-- Story Part 1 - The Beginning -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; align-items: center; margin-bottom: 30px;" data-aos="fade-right">
                <div style="order: 1;">
                    <div style="background: linear-gradient(135deg, rgba(18, 72, 126, 0.05) 0%, rgba(247, 149, 203, 0.05) 100%); border-radius: 12px; padding: 20px; border-left: 3px solid #12487E;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; font-weight: 700;">1</div>
                            <h3 style="font-size: 1.2rem; color: #12487E; font-weight: 700; margin: 0;">{{ __('home.story_1_title') }}</h3>
                        </div>
                        <p style="color: #4a5568; line-height: 1.55; font-size: 0.9rem; margin: 0;">
                            {{ __('home.story_1_text') }}
                        </p>
                    </div>
                </div>
                <div style="order: 2;">
                    <div style="position: relative; border-radius: 12px; overflow: hidden; height: 220px; background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/story1.jpg') }}" alt="{{ __('home.story_1_image_alt') }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; flex-direction: column; align-items: center; justify-content: center; color: white; padding: 20px; text-align: center;">
                            <i class="fas fa-heart" style="font-size: 2.2rem; margin-bottom: 10px; opacity: 0.9;"></i>
                            <p style="font-size: 0.95rem; font-weight: 600;">{{ __('home.story_1_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Story Part 2 - Our Foundation -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; align-items: center; margin-bottom: 30px;" data-aos="fade-left">
                <div style="order: 2;">
                    <div style="background: linear-gradient(135deg, rgba(18, 72, 126, 0.05) 0%, rgba(247, 149, 203, 0.05) 100%); border-radius: 12px; padding: 20px; border-left: 3px solid #F795CB;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; font-weight: 700;">2</div>
                            <h3 style="font-size: 1.2rem; color: #12487E; font-weight: 700; margin: 0;">{{ __('home.story_2_title') }}</h3>
                        </div>
                        <p style="color: #4a5568; line-height: 1.55; font-size: 0.9rem; margin: 0;">
                            {{ __('home.story_2_text') }}
                        </p>
                    </div>
                </div>
                <div style="order: 1;">
                    <div style="position: relative; border-radius: 12px; overflow: hidden; height: 220px; background: linear-gradient(135deg, #F795CB 0%, #12487E 100%); display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/story2.jpg') }}" alt="{{ __('home.story_2_image_alt') }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; flex-direction: column; align-items: center; justify-content: center; color: white; padding: 20px; text-align: center;">
                            <i class="fas fa-user-nurse" style="font-size: 2.2rem; margin-bottom: 10px; opacity: 0.9;"></i>
                            <p style="font-size: 0.95rem; font-weight: 600;">{{ __('home.story_2_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Story Part 3 - Growing with Purpose -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px; align-items: center; margin-bottom: 25px;" data-aos="fade-right">
                <div style="order: 1;">
                    <div style="background: linear-gradient(135deg, rgba(18, 72, 126, 0.05) 0%, rgba(247, 149, 203, 0.05) 100%); border-radius: 12px; padding: 20px; border-left: 3px solid #12487E;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.1rem; font-weight: 700;">3</div>
                            <h3 style="font-size: 1.2rem; color: #12487E; font-weight: 700; margin: 0;">{{ __('home.story_3_title') }}</h3>
                        </div>
                        <p style="color: #4a5568; line-height: 1.55; font-size: 0.9rem; margin: 0;">
                            {{ __('home.story_3_text') }}
                        </p>
                    </div>
                </div>
                <div style="order: 2;">
                    <div style="position: relative; border-radius: 12px; overflow: hidden; height: 220px; background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('images/story3.jpg') }}" alt="{{ __('home.story_3_image_alt') }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div style="display: none; flex-direction: column; align-items: center; justify-content: center; color: white; padding: 20px; text-align: center;">
                            <i class="fas fa-hands-holding-circle" style="font-size: 2.2rem; margin-bottom: 10px; opacity: 0.9;"></i>
                            <p style="font-size: 0.95rem; font-weight: 600;">{{ __('home.story_3_title') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Responsive Styles -->
        <style>
            @media (max-width: 768px) {
                #our-story > div > div[style*="grid-template-columns"] {
                    grid-template-columns: 1fr !important;
                }
                #our-story > div > div[style*="grid-template-columns"] > div {
                    order: 2 !important;
                }
                #our-story > div > div[style*="grid-template-columns"] > div:first-child {
                    order: 1 !important;
                }
            }
        </style>
    </section>

    <!-- Services Section with Filter -->
    <section id="services" class="section" style="background: #fff; padding: 50px 0;" aria-labelledby="services-heading" itemscope itemtype="https://schema.org/Service">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <h2 id="services-heading" class="section-title" itemprop="name" style="font-size: 28px; margin-bottom: 10px;">{{ __('home.services_title') }}</h2>
            <p class="section-subtitle" itemprop="description" style="font-size: 14px; margin-bottom: 25px;">{{ __('home.services_subtitle') }}</p>
            
            <!-- Service Filter Buttons -->
            <div style="display: flex; justify-content: center; gap: 10px; margin: 25px 0; flex-wrap: wrap;" data-aos="fade-up" data-aos-delay="150">
                <button class="filter-btn active" onclick="filterServices('all')" data-filter="all">{{ __('home.filter_all') }}</button>
                <button class="filter-btn" onclick="filterServices('care')" data-filter="care">{{ __('home.filter_care') }}</button>
                <button class="filter-btn" onclick="filterServices('health')" data-filter="health">{{ __('home.filter_health') }}</button>
                <button class="filter-btn" onclick="filterServices('activity')" data-filter="activity">{{ __('home.filter_activity') }}</button>
            </div>
            
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100" data-category="care">
                    <div class="service-icon"><i class="fas fa-user-nurse" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_elderly_care') }}</h3>
                    <p>{{ __('home.service_elderly_care_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200" data-category="care">
                    <div class="service-icon"><i class="fas fa-bath" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_hygiene') }}</h3>
                    <p>{{ __('home.service_hygiene_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300" data-category="care">
                    <div class="service-icon"><i class="fas fa-scissors" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_hair') }}</h3>
                    <p>{{ __('home.service_hair_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400" data-category="care">
                    <div class="service-icon"><i class="fas fa-utensils" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_eating') }}</h3>
                    <p>{{ __('home.service_eating_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="100" data-category="health">
                    <div class="service-icon"><i class="fas fa-pills" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_medication') }}</h3>
                    <p>{{ __('home.service_medication_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200" data-category="health">
                    <div class="service-icon"><i class="fas fa-eye" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_monitoring') }}</h3>
                    <p>{{ __('home.service_monitoring_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300" data-category="activity">
                    <div class="service-icon"><i class="fas fa-palette" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_activities') }}</h3>
                    <p>{{ __('home.service_activities_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400" data-category="health">
                    <div class="service-icon"><i class="fas fa-ambulance" aria-hidden="true"></i></div>
                    <h3>{{ __('home.service_transport') }}</h3>
                    <p>{{ __('home.service_transport_desc') }}</p>
                </div>
            </div>

            <div style="text-align:center;margin-top:35px;display:flex;gap:12px;justify-content:center;flex-wrap:wrap">
                <a href="{{ route('clients.create') }}" style="background: linear-gradient(135deg, #12487E 0%, #F795CB 100%);color:white;padding:12px 32px;border-radius:50px;text-decoration:none;font-weight:700;display:inline-flex;align-items:center;gap:8px;font-size:14px;box-shadow:0 4px 15px rgba(18,72,126,0.25);transition:all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(18,72,126,0.35)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 15px rgba(18,72,126,0.25)'">
                    <i class="fas fa-calendar-check"></i>
                    {{ __('home.services_cta') }}
                </a>
                <a href="{{ route('services.details') }}" style="background: white;color:#12487E;padding:12px 28px;border-radius:50px;text-decoration:none;font-weight:700;display:inline-flex;align-items:center;gap:8px;font-size:14px;border:2px solid rgba(18,72,126,0.25);transition:all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(18,72,126,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                    <i class="fas fa-list-check"></i>
                    {{ __('home.services_details_cta') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section" style="background:#f9fafb" aria-labelledby="gallery-heading">
        <div class="container">
            <h2 id="gallery-heading" class="section-title">{{ __('home.gallery_title') }}</h2>
            <p class="section-subtitle">{{ __('home.gallery_subtitle') }}</p>
            
            <div class="gallery" role="list">
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" decoding="async" src="{{ asset('images/post 1.jpeg') }}" 
                    alt="Elderly care services - Gallery image 1" 
                    width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" decoding="async" src="{{ asset('images/post 2.jpeg') }}" 
                    alt="Elderly care services - Gallery image 2" 
                    width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" decoding="async" src="{{ asset('images/post 3.jpeg') }}" 
                    alt="Elderly care services - Gallery image 3" 
                    width="600" height="400">
                </div>
              
        </div>
    </section>

    <!-- Reviews Section with Slider -->
    <section class="section" style="background: #f9fafb;">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.reviews_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.reviews_subtitle') }}</p>
            
            <div style="position: relative; max-width: 900px; margin: 50px auto 0;">
                <!-- Reviews Slider Container -->
                <div class="reviews-slider">
                    <div class="review-slide active">
                        <div class="review-card" style="margin: 0 auto;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <img loading="lazy" decoding="async" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                <div>
                                    <h4 style="font-weight: 700; color: #1a202c; margin-bottom: 5px;">Maria Schmidt</h4>
                                    <div style="color: #fbbf24; font-size: 18px;">★★★★★</div>
                                </div>
                            </div>
                            <p style="color: #718096; line-height: 1.8; font-style: italic;">"{{ __('home.review_1_text') }}"</p>
                        </div>
                    </div>

                    <div class="review-slide">
                        <div class="review-card" style="margin: 0 auto;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <img loading="lazy" decoding="async" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                <div>
                                    <h4 style="font-weight: 700; color: #1a202c; margin-bottom: 5px;">Thomas Müller</h4>
                                    <div style="color: #fbbf24; font-size: 18px;">★★★★★</div>
                                </div>
                            </div>
                            <p style="color: #718096; line-height: 1.8; font-style: italic;">"{{ __('home.review_2_text') }}"</p>
                        </div>
                    </div>

                    <div class="review-slide">
                        <div class="review-card" style="margin: 0 auto;">
                            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                                <img loading="lazy" decoding="async" src="https://randomuser.me/api/portraits/women/65.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                <div>
                                    <h4 style="font-weight: 700; color: #1a202c; margin-bottom: 5px;">Sophie Dubois</h4>
                                    <div style="color: #fbbf24; font-size: 18px;">★★★★★</div>
                                </div>
                            </div>
                            <p style="color: #718096; line-height: 1.8; font-style: italic;">"{{ __('home.review_3_text') }}"</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button class="review-arrow review-arrow-prev" onclick="changeReview(-1)" aria-label="Previous review">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </button>
                <button class="review-arrow review-arrow-next" onclick="changeReview(1)" aria-label="Next review">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 18l6-6-6-6"/>
                    </svg>
                </button>

                <!-- Dots Indicator -->
                <div class="review-dots">
                    <span class="review-dot active" onclick="goToReview(0)"></span>
                    <span class="review-dot" onclick="goToReview(1)"></span>
                    <span class="review-dot" onclick="goToReview(2)"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="section" style="background: #F6F9FC;">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.team_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.team_subtitle') }}</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-top: 60px;">
                <!-- Dr. Anna Weber - Chief Medical Officer -->
                <div class="team-card-advanced" data-aos="fade-up">
                    <div class="team-photo-advanced">
                        <img loading="lazy" decoding="async" src="{{ asset('images/doctor2.jpeg') }}" alt="Dr. Anna Weber">
                    </div>
                    <div class="team-info-advanced">
                        <h3>Dr. Anna Weber</h3>
                        <p class="team-role-advanced">{{ __('home.team_role_1') }}</p>
                        <div style="margin: 15px 0;">
                            <span class="team-skill">{{ __('home.team_skill_1_1') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_1_2') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_1_3') }}</span>
                        </div>
                        <p class="team-bio-advanced">{{ __('home.team_bio_1') }}</p>
                    </div>
                </div>
                
                <!-- Dr. Michael Schmidt - Senior Doctor -->
                <div class="team-card-advanced" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-photo-advanced">
                        <img loading="lazy" decoding="async" src="{{ asset('images/doctor1.jpeg') }}" alt="Dr. Michael Schmidt">
                    </div>
                    <div class="team-info-advanced">
                        <h3>Dr. Michael Schmidt</h3>
                        <p class="team-role-advanced">{{ __('home.team_role_2') }}</p>
                        <div style="margin: 15px 0;">
                            <span class="team-skill">{{ __('home.team_skill_2_1') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_2_2') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_2_3') }}</span>
                        </div>
                        <p class="team-bio-advanced">{{ __('home.team_bio_2') }}</p>
                    </div>
                </div>
                
                <!-- Sarah Müller - Head Nurse -->
                <div class="team-card-advanced" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-photo-advanced">
                        <img loading="lazy" decoding="async" src="{{ asset('images/doctor3.png') }}" alt="Sarah Müller">
                    </div>
                    <div class="team-info-advanced">
                        <h3>Sarah Müller</h3>
                        <p class="team-role-advanced">{{ __('home.team_role_3') }}</p>
                        <div style="margin: 15px 0;">
                            <span class="team-skill">{{ __('home.team_skill_3_1') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_3_2') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_3_3') }}</span>
                        </div>
                        <p class="team-bio-advanced">{{ __('home.team_bio_3') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Location Section -->
    <section id="contact" class="section" style="background: #f8fafc;">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.contact_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.contact_subtitle') }}</p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 40px;">
                <!-- Contact Info -->
                <div data-aos="fade-right">
                    <!-- Contact Cards -->
                    <div style="display: grid; gap: 12px; margin-bottom: 20px;">
                        <!-- Phone -->
                        <div class="contact-card" style="background: white; padding: 16px 20px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                            <div class="icon-circle" aria-hidden="true" style="width: 35px; height: 35px;">
                                <i class="fas fa-phone-volume" style="font-size: 16px;"></i>
                            </div>
                            <div>
                                <h4 style="margin: 0 0 3px 0; font-size: 14px; color: #1a202c;">{{ __('home.contact_phone') }}</h4>
                                <a href="tel:+41714227777" style="color: var(--swiss-blue); font-weight: 600; text-decoration: none; font-size: 14px;">+41 71 422 77 77</a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="contact-card" style="background: white; padding: 16px 20px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                            <div class="icon-circle" aria-hidden="true" style="width: 35px; height: 35px;">
                                <i class="fas fa-paper-plane" style="font-size: 16px;"></i>
                            </div>
                            <div>
                                <h4 style="margin: 0 0 3px 0; font-size: 14px; color: #1a202c;">{{ __('home.contact_email_label') }}</h4>
                                <a href="mailto:info@janiracare.ch" style="color: var(--swiss-blue); font-weight: 600; text-decoration: none; font-size: 14px;">info@janiracare.ch</a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="contact-card" style="background: white; padding: 16px 20px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                            <div class="icon-circle" aria-hidden="true" style="width: 35px; height: 35px;">
                                <i class="fas fa-location-dot" style="font-size: 16px;"></i>
                            </div>
                            <div>
                                <h4 style="margin: 0 0 3px 0; font-size: 14px; color: #1a202c;">{{ __('home.contact_address') }}</h4>
                                <p style="margin: 0; color: #718096; line-height: 1.5; font-size: 13px;">Bahnhofstrasse 123<br>8001 Zürich, Schweiz</p>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div class="contact-card" style="background: white; padding: 16px 20px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                            <div class="icon-circle" aria-hidden="true" style="width: 35px; height: 35px;">
                                <i class="fas fa-clock" style="font-size: 16px;"></i>
                            </div>
                            <div>
                                <h4 style="margin: 0 0 3px 0; font-size: 14px; color: #1a202c;">{{ __('home.contact_hours') }}</h4>
                                <p style="margin: 0; color: #718096; line-height: 1.5; font-size: 13px;">{{ __('home.contact_hours_weekdays') }}<br>{{ __('home.contact_hours_weekend') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                        <h4 style="margin: 0 0 12px 0; font-size: 15px; color: #1a202c;">{{ __('home.contact_follow_us') }}</h4>
                        <div class="social-links" style="display: flex; gap: 15px;">
                            <a href="https://www.facebook.com/profile.php?id=61586744824189&locale=sq_AL" target="_blank" style="background: #1877f2;" aria-label="Facebook">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.instagram.com/janiracare/" target="_blank" style="background: radial-gradient(circle at 30% 30%, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);" aria-label="Instagram">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/janira-care-3201833a7" target="_blank" style="background: #0077b5;" aria-label="LinkedIn">
                                <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div data-aos="fade-left">
                    <div class="contact-form-box" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.06);">
                        <!-- Logo -->
                        <div style="text-align: center; margin-bottom: 15px;">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ __('home.nav_brand') }}" style="max-width: 80px; height: auto;">
                        </div>
                        
                        <h3 style="text-align: center; font-size: 18px; margin-bottom: 8px; color: #12487E; font-weight: 700;">{{ __('home.contact_form_title') }}</h3>
                        <p style="text-align: center; color: #718096; margin-bottom: 20px; font-size: 13px;">{{ __('home.contact_form_subtitle') }}</p>
                        
                        @if(session('status'))
                            <div class="alert alert-success" style="background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); color: white; padding: 10px 16px; border-radius: 8px; margin-bottom: 15px; text-align: center; font-weight: 500; font-size: 13px;">{{ __('home.contact_success') }}</div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}" style="display: grid; gap: 14px;">
                            @csrf
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 6px; color: #12487E; font-weight: 600; margin-bottom: 6px; font-size: 13px;">
                                    <i class="fas fa-user" style="color: #F795CB; font-size: 12px;"></i>
                                    {{ __('home.contact_first_name') }}
                                </label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" required style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 13px; transition: all 0.3s; outline: none;" onfocus="this.style.borderColor='#12487E'" onblur="this.style.borderColor='#e5e7eb'">
                                @error('first_name')<div style="color:#dc2626;font-size:12px;margin-top:3px"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 6px; color: #12487E; font-weight: 600; margin-bottom: 6px; font-size: 13px;">
                                    <i class="fas fa-user" style="color: #F795CB; font-size: 12px;"></i>
                                    {{ __('home.contact_last_name') }}
                                </label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 13px; transition: all 0.3s; outline: none;" onfocus="this.style.borderColor='#12487E'" onblur="this.style.borderColor='#e5e7eb'">
                                @error('last_name')<div style="color:#dc2626;font-size:12px;margin-top:3px"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 6px; color: #12487E; font-weight: 600; margin-bottom: 6px; font-size: 13px;">
                                    <i class="fas fa-envelope" style="color: #F795CB; font-size: 12px;"></i>
                                    {{ __('home.contact_email') }}
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 13px; transition: all 0.3s; outline: none;" onfocus="this.style.borderColor='#12487E'" onblur="this.style.borderColor='#e5e7eb'">
                                @error('email')<div style="color:#dc2626;font-size:12px;margin-top:3px"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 6px; color: #12487E; font-weight: 600; margin-bottom: 6px; font-size: 13px;">
                                    <i class="fas fa-message" style="color: #F795CB; font-size: 12px;"></i>
                                    {{ __('home.contact_message') }}
                                </label>
                                <textarea name="message" required style="width: 100%; padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; font-size: 13px; transition: all 0.3s; outline: none; min-height: 100px; resize: vertical; font-family: inherit;" onfocus="this.style.borderColor='#12487E'" onblur="this.style.borderColor='#e5e7eb'">{{ old('message') }}</textarea>
                                @error('message')<div style="color:#dc2626;font-size:12px;margin-top:3px"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>@enderror
                            </div>

                            <button type="submit" class="btn-submit" style="background: linear-gradient(135deg, #12487E 0%, #F795CB 100%); color: white; padding: 12px 24px; border: none; border-radius: 50px; font-size: 14px; font-weight: 700; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 15px rgba(18,72,126,0.25); width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(18,72,126,0.35)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(18,72,126,0.25)'">
                                <i class="fas fa-paper-plane"></i>
                                {{ __('home.contact_submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <style>
                @media (max-width: 768px) {
                    #contact > .container > div:first-of-type {
                        grid-template-columns: 1fr !important;
                    }
                    .contact-form-box {
                        padding: 5px !important;
                    }
                }
            </style>
        </div>
    </section>
    </main>

    <!-- Lightbox for Gallery -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <img id="lightbox-img" loading="lazy" decoding="async" src="" alt="Gallery image">
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" onclick="scrollToTop()" aria-label="Back to top">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

    <!-- Footer -->
    <footer class="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
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
                <p itemprop="copyrightNotice" style="opacity: 0.9;">&copy; {{ date('Y') }} {{ __('home.nav_brand') }}. {{ __('home.footer_rights') }}</p>
                <p style="margin-top: 10px;">
                    <a href="{{ route('login') }}" style="color: rgba(255,255,255,0.9); text-decoration: none; font-size: 13px;" aria-label="Login to admin panel">Admin Login</a>
                </p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Hamburger Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navbarMenu = document.getElementById('navbarMenu');
        
        if (hamburger && navbarMenu) {
            hamburger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                hamburger.classList.toggle('active');
                navbarMenu.classList.toggle('active');
                console.log('Hamburger clicked, menu active:', navbarMenu.classList.contains('active'));
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
        } else {
            console.error('Hamburger or navbarMenu not found!');
        }
        
        // Slow smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '') return;
                
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    const targetPosition = targetElement.offsetTop - 80;
                    const startPosition = window.pageYOffset;
                    const distance = targetPosition - startPosition;
                    const duration = 1000; // 1 second
                    let start = null;
                    
                    function animation(currentTime) {
                        if (start === null) start = currentTime;
                        const timeElapsed = currentTime - start;
                        const run = ease(timeElapsed, startPosition, distance, duration);
                        window.scrollTo(0, run);
                        if (timeElapsed < duration) requestAnimationFrame(animation);
                    }
                    
                    function ease(t, b, c, d) {
                        t /= d / 2;
                        if (t < 1) return c / 2 * t * t + b;
                        t--;
                        return -c / 2 * (t * (t - 2) - 1) + b;
                    }
                    
                    requestAnimationFrame(animation);
                    
                    // Close mobile menu if open
                    if (hamburger && navbarMenu) {
                        hamburger.classList.remove('active');
                        navbarMenu.classList.remove('active');
                    }
                }
            });
        });
    
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        const slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;
        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        setInterval(nextSlide, 5000);

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        let counterAnimated = false;

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };
                updateCounter();
            });
        };

        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counterAnimated) {
                    animateCounters();
                    counterAnimated = true;
                }
            });
        }, observerOptions);

        if (counters.length > 0) {
            observer.observe(counters[0].closest('section'));
        }

        // Reviews Slider
        let currentReview = 0;
        const reviewSlides = document.querySelectorAll('.review-slide');
        const reviewDots = document.querySelectorAll('.review-dot');

        function changeReview(direction) {
            reviewSlides[currentReview].classList.remove('active');
            reviewDots[currentReview].classList.remove('active');
            
            currentReview = (currentReview + direction + reviewSlides.length) % reviewSlides.length;
            
            reviewSlides[currentReview].classList.add('active');
            reviewDots[currentReview].classList.add('active');
        }

        function goToReview(index) {
            reviewSlides[currentReview].classList.remove('active');
            reviewDots[currentReview].classList.remove('active');
            
            currentReview = index;
            
            reviewSlides[currentReview].classList.add('active');
            reviewDots[currentReview].classList.add('active');
        }

        // Auto-play reviews slider every 7 seconds
        setInterval(() => {
            changeReview(1);
        }, 7000);

        // Service Filter
        function filterServices(category) {
            const cards = document.querySelectorAll('.service-card');
            const buttons = document.querySelectorAll('.filter-btn');
            
            // Update active button
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            // Filter cards
            cards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Gallery Lightbox
        function openLightbox(element) {
            const img = element.querySelector('img');
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            
            lightboxImg.src = img.src.replace('w=600&h=400', 'w=1920&h=1080');
            lightboxImg.alt = img.alt;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        function scrollToTop() {
            const startPosition = window.pageYOffset;
            const distance = -startPosition;
            const duration = 1000; // 1 second
            let start = null;
            
            function animation(currentTime) {
                if (start === null) start = currentTime;
                const timeElapsed = currentTime - start;
                const run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            }
            
            function ease(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }
            
            requestAnimationFrame(animation);
        }

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add fadeIn animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: scale(0.9); }
                to { opacity: 1; transform: scale(1); }
            }
        `;
        document.head.appendChild(style);

        // Dark Mode Toggle
        function toggleDarkMode() {
            const body = document.body;
            const icon = document.querySelector('.dark-mode-icon');
            
            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                icon.textContent = '☀️';
                localStorage.setItem('darkMode', 'enabled');
            } else {
                icon.textContent = '🌙';
                localStorage.setItem('darkMode', 'disabled');
            }
        }

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            document.querySelector('.dark-mode-icon').textContent = '☀️';
        }
    </script>
    <script>
        // Font Awesome compatibility fallback
        (function() {
            function convertFaClasses() {
                document.querySelectorAll('.fa-solid').forEach(el => { el.classList.remove('fa-solid'); el.classList.add('fas'); });
                document.querySelectorAll('.fa-regular').forEach(el => { el.classList.remove('fa-regular'); el.classList.add('far'); });
                document.querySelectorAll('.fa-brands').forEach(el => { el.classList.remove('fa-brands'); el.classList.add('fab'); });
            }
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', convertFaClasses);
            } else {
                convertFaClasses();
            }
        })();
    </script>
</body>
</html>
