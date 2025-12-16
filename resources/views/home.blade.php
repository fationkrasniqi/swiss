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
           ARTISTIC CANTON MAP BACKGROUND
           Inspired by Swiss topography & medical sketches
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
                radial-gradient(circle at 15% 25%, rgba(91, 143, 185, 0.04) 0%, transparent 35%),
                radial-gradient(circle at 85% 15%, rgba(118, 168, 157, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 65% 75%, rgba(154, 179, 160, 0.04) 0%, transparent 38%),
                radial-gradient(circle at 25% 85%, rgba(212, 197, 176, 0.06) 0%, transparent 42%);
            pointer-events: none;
        }
        
        /* Topographic contour lines - subtle Swiss canton boundaries */
        body::after {
            content: '';
            position: fixed;
            top: -10%;
            left: -10%;
            right: -10%;
            bottom: -10%;
            z-index: -1;
            opacity: 0.55;
            background-image:
                /* Abstract canton curves - inspired by Zürich, Bern, Ticino boundaries */
                repeating-linear-gradient(
                    108deg,
                    transparent,
                    transparent 180px,
                    rgba(91, 143, 185, 0.045) 180px,
                    rgba(91, 143, 185, 0.045) 183px
                ),
                repeating-linear-gradient(
                    -42deg,
                    transparent,
                    transparent 220px,
                    rgba(118, 168, 157, 0.055) 220px,
                    rgba(118, 168, 157, 0.055) 223px
                ),
                repeating-linear-gradient(
                    75deg,
                    transparent,
                    transparent 160px,
                    rgba(154, 179, 160, 0.038) 160px,
                    rgba(154, 179, 160, 0.038) 162px
                ),
                repeating-linear-gradient(
                    135deg,
                    transparent,
                    transparent 200px,
                    rgba(212, 197, 176, 0.042) 200px,
                    rgba(212, 197, 176, 0.042) 202px
                );
            filter: blur(0.8px);
            transform: scale(1.1) rotate(2deg);
            animation: slowDrift 120s ease-in-out infinite;
            pointer-events: none;
        }
        
        @keyframes slowDrift {
            0%, 100% { transform: scale(1.1) rotate(2deg) translateY(0); }
            50% { transform: scale(1.1) rotate(2deg) translateY(-8px); }
        }
        
        /* Additional decorative organic shapes */
        .section::after {
            content: '';
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 42% 58% 45% 55% / 48% 62% 38% 52%;
            background: radial-gradient(circle, rgba(118, 168, 157, 0.05), transparent);
            z-index: -1;
            animation: organicFloat 25s ease-in-out infinite;
        }
        
        .section:nth-child(odd)::after {
            top: -80px;
            right: 5%;
        }
        
        .section:nth-child(even)::after {
            bottom: -80px;
            left: 8%;
            animation-delay: -12s;
        }
        
        @keyframes organicFloat {
            0%, 100% { 
                transform: translateY(0) rotate(0deg);
                border-radius: 42% 58% 45% 55% / 48% 62% 38% 52%;
            }
            25% { 
                transform: translateY(-20px) rotate(5deg);
                border-radius: 48% 52% 50% 50% / 55% 45% 55% 45%;
            }
            50% { 
                transform: translateY(-10px) rotate(-3deg);
                border-radius: 55% 45% 42% 58% / 50% 58% 42% 50%;
            }
            75% { 
                transform: translateY(-25px) rotate(7deg);
                border-radius: 45% 55% 48% 52% / 42% 58% 42% 58%;
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
            max-width: 1280px;
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
            color: var(--text-primary);
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
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: var(--space-lg);
            margin-top: var(--space-xl);
        }
        
        .service-card {
            background: white;
            border-radius: 28px;
            padding: var(--space-lg) var(--space-md);
            box-shadow: var(--shadow-md);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(91, 143, 185, 0.08);
            position: relative;
            overflow: visible;
        }
        
        /* Subtle decorative corner element */
        .service-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            width: 72px;
            height: 72px;
            background: 
                linear-gradient(135deg, var(--medical-teal) 0%, var(--sage-green) 100%);
            border-radius: 28px 0 28px 0;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 0;
        }
        
        .service-card:hover::before {
            opacity: 0.06;
        }
        
        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(118, 168, 157, 0.15);
        }
        
        .service-icon {
            font-size: 54px;
            margin-bottom: var(--space-sm);
            display: block;
            position: relative;
            z-index: 1;
        }
        
        .service-card h3 {
            font-size: var(--font-xl);
            margin-bottom: var(--space-sm);
            color: var(--text-primary);
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .service-card p {
            color: var(--text-secondary);
            line-height: 1.8;
            font-size: var(--font-base);
            position: relative;
            z-index: 1;
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
            height: 280px;
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
            object-fit: cover;
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
            border: 2px solid rgba(91, 143, 185, 0.25);
            color: var(--swiss-blue);
            padding: 12px 28px;
            border-radius: 32px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: var(--font-base);
            box-shadow: var(--shadow-sm);
        }
        
        .filter-btn:hover {
            background: var(--swiss-blue);
            color: white;
            border-color: var(--swiss-blue);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }
        
        .filter-btn.active {
            background: var(--medical-teal);
            color: white;
            border-color: var(--medical-teal);
            box-shadow: var(--shadow-md);
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
            margin-bottom: var(--space-md);
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
            box-shadow: var(--shadow-md);
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
            color: var(--text-secondary);
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
            height: 100%;
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
                var(--sage-green)
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
                gap: var(--space-md);
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
                <a href="{{ url('/') }}" class="navbar-brand" aria-label="Homepage">{{ __('home.nav_brand') }}</a>
                <div class="hamburger" id="hamburger" aria-label="Toggle menu" role="button" tabindex="0">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="navbar-menu" id="navbarMenu">
                    <li><a href="#home" aria-label="{{ __('home.nav_home') }}">{{ __('home.nav_home') }}</a></li>
                    <li><a href="#services" aria-label="{{ __('home.nav_services') }}">{{ __('home.nav_services') }}</a></li>
                    <li><a href="#gallery" aria-label="{{ __('home.nav_gallery') }}">{{ __('home.nav_gallery') }}</a></li>
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
        <!-- Hero Section with Slider -->
        <section id="home" class="hero" aria-label="Hero Banner">
        <div class="hero-slider">
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=1920&h=1080&fit=crop')"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=1920&h=1080&fit=crop')"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?w=1920&h=1080&fit=crop')"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <h1 data-aos="fade-up" itemprop="name">{{ __('home.hero_title') }}</h1>
                <p data-aos="fade-up" data-aos-delay="200" itemprop="description">{{ __('home.hero_subtitle') }}</p>
                <a href="#contact" class="btn-primary" data-aos="fade-up" data-aos-delay="400" aria-label="Contact us for elderly care services">{{ __('home.hero_cta') }}</a>
            </div>
        </div>
    </section>

    <!-- Services Section with Filter -->
    <section id="services" class="section" aria-labelledby="services-heading" itemscope itemtype="https://schema.org/Service">
        <div class="container">
            <h2 id="services-heading" class="section-title" itemprop="name">{{ __('home.services_title') }}</h2>
            <p class="section-subtitle" itemprop="description">{{ __('home.services_subtitle') }}</p>
            
            <!-- Service Filter Buttons -->
            <div style="display: flex; justify-content: center; gap: 15px; margin: 40px 0; flex-wrap: wrap;" data-aos="fade-up" data-aos-delay="150">
                <button class="filter-btn active" onclick="filterServices('all')" data-filter="all">{{ __('home.filter_all') }}</button>
                <button class="filter-btn" onclick="filterServices('care')" data-filter="care">{{ __('home.filter_care') }}</button>
                <button class="filter-btn" onclick="filterServices('health')" data-filter="health">{{ __('home.filter_health') }}</button>
                <button class="filter-btn" onclick="filterServices('activity')" data-filter="activity">{{ __('home.filter_activity') }}</button>
            </div>
            
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100" data-category="care">
                    <div class="service-icon">👴</div>
                    <h3>{{ __('home.service_elderly_care') }}</h3>
                    <p>{{ __('home.service_elderly_care_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200" data-category="care">
                    <div class="service-icon">🧼</div>
                    <h3>{{ __('home.service_hygiene') }}</h3>
                    <p>{{ __('home.service_hygiene_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300" data-category="care">
                    <div class="service-icon">💇</div>
                    <h3>{{ __('home.service_hair') }}</h3>
                    <p>{{ __('home.service_hair_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400" data-category="care">
                    <div class="service-icon">🍽️</div>
                    <h3>{{ __('home.service_eating') }}</h3>
                    <p>{{ __('home.service_eating_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="100" data-category="health">
                    <div class="service-icon">💊</div>
                    <h3>{{ __('home.service_medication') }}</h3>
                    <p>{{ __('home.service_medication_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200" data-category="health">
                    <div class="service-icon">👁️</div>
                    <h3>{{ __('home.service_monitoring') }}</h3>
                    <p>{{ __('home.service_monitoring_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300" data-category="activity">
                    <div class="service-icon">🎨</div>
                    <h3>{{ __('home.service_activities') }}</h3>
                    <p>{{ __('home.service_activities_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400" data-category="health">
                    <div class="service-icon">🏥</div>
                    <h3>{{ __('home.service_transport') }}</h3>
                    <p>{{ __('home.service_transport_desc') }}</p>
                </div>
            </div>

            <div style="text-align:center;margin-top:40px">
                <a href="{{ route('clients.create') }}" style="background:#667eea;color:white;padding:15px 40px;border-radius:8px;text-decoration:none;font-weight:bold;display:inline-block">{{ __('home.services_cta') }}</a>
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
                    <img loading="lazy" src="https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?w=600&h=400&fit=crop" 
                         alt="Professional caregiver providing elderly care services to senior woman - Swiss elderly care center" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=400&fit=crop" 
                         alt="Seniors enjoying recreational activities and social engagement - Elderly care Switzerland" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&h=400&fit=crop" 
                         alt="Professional medical staff team providing 24/7 elderly care and hygiene services" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&h=400&fit=crop" 
                         alt="Comfortable and safe living environment for elderly care - Swiss senior home" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop" 
                         alt="Personal hygiene care and daily assistance for elderly - Professional caregiving services" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600" role="listitem" onclick="openLightbox(this)">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=600&h=400&fit=crop" 
                         alt="Happy seniors enjoying quality care and support - Elderly care center Switzerland" 
                         width="600" height="400">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="section" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
        <div class="container">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; text-align: center;">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div style="font-size: 56px; font-weight: 700; margin-bottom: 10px;" class="counter" data-target="850">0</div>
                    <div style="font-size: 18px; opacity: 0.95;">{{ __('home.stat_happy_seniors') }}</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <div style="font-size: 56px; font-weight: 700; margin-bottom: 10px;" class="counter" data-target="15">0</div>
                    <div style="font-size: 18px; opacity: 0.95;">{{ __('home.stat_years_experience') }}</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <div style="font-size: 56px; font-weight: 700; margin-bottom: 10px;" class="counter" data-target="45">0</div>
                    <div style="font-size: 18px; opacity: 0.95;">{{ __('home.stat_staff_members') }}</div>
                </div>
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
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
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
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
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
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
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
    <section class="section" style="background: #f8fafc;">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.team_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.team_subtitle') }}</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-top: 60px;">
                <!-- Dr. Anna Weber - Chief Medical Officer -->
                <div class="team-card-advanced" data-aos="fade-up">
                    <div class="team-photo-advanced">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=600&fit=crop" alt="Dr. Anna Weber">
                    </div>
                    <div class="team-info-advanced">
                        <div class="team-badge">{{ __('home.team_badge_1') }}</div>
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
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=600&h=600&fit=crop" alt="Dr. Michael Schmidt">
                    </div>
                    <div class="team-info-advanced">
                        <div class="team-badge">{{ __('home.team_badge_2') }}</div>
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
                        <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?w=600&h=600&fit=crop&fp-y=0.35" alt="Sarah Müller">
                    </div>
                    <div class="team-info-advanced">
                        <div class="team-badge">{{ __('home.team_badge_3') }}</div>
                        <h3>Sarah Müller</h3>
                        <p class="team-role-advanced">{{ __('home.team_role_3') }}</p>
                        <div style="margin: 15px 0;">
                            <span class="team-skill">{{ __('home.team_skill_3_1') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_3_2') }}</span>
                            <span class="team-skill">{{ __('home.team_skill_3_3') }}</span>
                        </div>
                        <p class="team-bio-advanced">{{ __('home.team_bio_3') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Timeline Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.story_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.story_subtitle') }}</p>
            
            <div class="timeline" style="margin-top: 60px;">
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                    <div class="timeline-year">2009</div>
                    <div class="timeline-content">
                        <h3>{{ __('home.timeline_2009_title') }}</h3>
                        <p>{{ __('home.timeline_2009_text') }}</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-delay="200">
                    <div class="timeline-year">2014</div>
                    <div class="timeline-content">
                        <h3>{{ __('home.timeline_2014_title') }}</h3>
                        <p>{{ __('home.timeline_2014_text') }}</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="timeline-year">2019</div>
                    <div class="timeline-content">
                        <h3>{{ __('home.timeline_2019_title') }}</h3>
                        <p>{{ __('home.timeline_2019_text') }}</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-delay="400">
                    <div class="timeline-year">2025</div>
                    <div class="timeline-content">
                        <h3>{{ __('home.timeline_2025_title') }}</h3>
                        <p>{{ __('home.timeline_2025_text') }}</p>
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
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 60px;">
                <!-- Contact Info & Form -->
                <div data-aos="fade-right">
                    <!-- Contact Cards -->
                    <div style="display: grid; gap: 20px; margin-bottom: 40px;">
                        <!-- Phone -->
                        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 20px;">
                            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                                📞
                            </div>
                            <div>
                                <h4 style="margin: 0 0 5px 0; font-size: 16px; color: #1a202c;">{{ __('home.contact_phone') }}</h4>
                                <a href="tel:+41441234567" style="color: #4facfe; font-weight: 600; text-decoration: none;">+41 44 123 45 67</a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 20px;">
                            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                                ✉️
                            </div>
                            <div>
                                <h4 style="margin: 0 0 5px 0; font-size: 16px; color: #1a202c;">{{ __('home.contact_email_label') }}</h4>
                                <a href="mailto:info@eldercare.ch" style="color: #4facfe; font-weight: 600; text-decoration: none;">info@eldercare.ch</a>
                            </div>
                        </div>

                        <!-- Address -->
                        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 20px;">
                            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                                📍
                            </div>
                            <div>
                                <h4 style="margin: 0 0 5px 0; font-size: 16px; color: #1a202c;">{{ __('home.contact_address') }}</h4>
                                <p style="margin: 0; color: #718096; line-height: 1.6;">Bahnhofstrasse 123<br>8001 Zürich, Schweiz</p>
                            </div>
                        </div>

                        <!-- Working Hours -->
                        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 20px;">
                            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">
                                🕒
                            </div>
                            <div>
                                <h4 style="margin: 0 0 5px 0; font-size: 16px; color: #1a202c;">{{ __('home.contact_hours') }}</h4>
                                <p style="margin: 0; color: #718096; line-height: 1.6;">{{ __('home.contact_hours_weekdays') }}<br>{{ __('home.contact_hours_weekend') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08);">
                        <h4 style="margin: 0 0 20px 0; font-size: 18px; color: #1a202c;">{{ __('home.contact_follow_us') }}</h4>
                        <div style="display: flex; gap: 15px;">
                            <a href="https://facebook.com" target="_blank" style="background: #1877f2; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                📘
                            </a>
                            <a href="https://instagram.com" target="_blank" style="background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                📷
                            </a>
                            <a href="https://linkedin.com" target="_blank" style="background: #0077b5; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                💼
                            </a>
                            <a href="https://twitter.com" target="_blank" style="background: #1da1f2; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                🐦
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Google Map -->
                <div data-aos="fade-left">
                    <div style="background: white; padding: 10px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); height: 100%;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2701.217856662707!2d8.537788776543656!3d47.376888571172395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47900a08cc0e6e41%3A0xf5c698b65f8c52a7!2sBarhnhofstrasse%2C%20Z%C3%BCrich%2C%20Switzerland!5e0!3m2!1sen!2s!4v1701234567890!5m2!1sen!2s" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 10px; min-height: 600px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form" data-aos="fade-up" style="margin-top: 60px; max-width: 800px; margin-left: auto; margin-right: auto;">
                <h3 style="text-align: center; font-size: 28px; margin-bottom: 15px; color: #1a202c;">{{ __('home.contact_form_title') }}</h3>
                <p style="text-align: center; color: #718096; margin-bottom: 40px;">{{ __('home.contact_form_subtitle') }}</p>
                
                @if(session('status'))
                    <div class="alert alert-success">{{ __('home.contact_success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('home.contact_first_name') }}</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')<div style="color:#dc2626;font-size:14px;margin-top:4px">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('home.contact_last_name') }}</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')<div style="color:#dc2626;font-size:14px;margin-top:4px">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('home.contact_email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<div style="color:#dc2626;font-size:14px;margin-top:4px">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>{{ __('home.contact_message') }}</label>
                        <textarea name="message" required>{{ old('message') }}</textarea>
                        @error('message')<div style="color:#dc2626;font-size:14px;margin-top:4px">{{ $message }}</div>@enderror
                    </div>

                    <button type="submit" class="btn-submit">{{ __('home.contact_submit') }}</button>
                </form>
            </div>
        </div>
    </section>
    </main>

    <!-- Lightbox for Gallery -->
    <div class="lightbox" id="lightbox" onclick="closeLightbox()">
        <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
        <img id="lightbox-img" src="" alt="Gallery image">
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" onclick="scrollToTop()" aria-label="Back to top">
        ↑
    </button>

    <!-- Footer -->
    <footer class="footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
        <div class="container">
            <p itemprop="copyrightNotice">&copy; {{ date('Y') }} {{ __('home.nav_brand') }}. {{ __('home.footer_rights') }}</p>
            <p style="margin-top:10px">
                <a href="{{ route('login') }}" aria-label="Login to admin panel">Login</a> | 
                <a href="{{ route('register') }}" aria-label="Register new account">Register</a>
            </p>
            <div style="margin-top: 20px; font-size: 14px; color: rgba(255,255,255,0.8);">
                <p>{{ __('home.seo_keywords') }}</p>
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
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
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
</body>
</html>
