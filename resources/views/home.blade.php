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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; 
            line-height: 1.7; 
            color: #2d3748;
            font-size: 16px;
        }
        
        /* Navbar */
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
        
        /* Hero Section with Slider */
        .hero { 
            position: relative;
            height: 650px;
            overflow: hidden;
        }
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        .hero-slide.active {
            opacity: 1;
        }
        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.85) 0%, rgba(0, 242, 254, 0.75) 100%);
        }
        .hero-content {
            position: relative;
            z-index: 10;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }
        .hero h1 { 
            font-size: 56px; 
            margin-bottom: 24px; 
            font-weight: 700;
            line-height: 1.2;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .hero p { 
            font-size: 22px; 
            margin-bottom: 35px; 
            max-width: 700px; 
            margin-left: auto; 
            margin-right: auto;
            opacity: 0.95;
            line-height: 1.6;
        }
        .hero .btn-primary {
            background: white;
            color: #4facfe;
            padding: 18px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 17px;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .hero .btn-primary:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* Section */
        .section { padding: 100px 20px; }
        .section-title { 
            text-align: center; 
            font-size: 42px; 
            margin-bottom: 20px; 
            color: #1a202c;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .section-subtitle {
            text-align: center;
            font-size: 19px;
            color: #718096;
            margin-bottom: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 35px;
            margin-bottom: 50px;
        }
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 8px 30px rgba(79, 172, 254, 0.08);
            transition: all 0.4s ease;
            border: 2px solid rgba(79, 172, 254, 0.1);
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            transform: scaleX(0);
            transition: transform 0.4s;
        }
        .service-card:hover::before {
            transform: scaleX(1);
        }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 45px rgba(79, 172, 254, 0.2);
            border-color: rgba(79, 172, 254, 0.3);
        }
        .service-icon {
            font-size: 56px;
            margin-bottom: 22px;
            display: block;
        }
        .service-card h3 {
            font-size: 24px;
            margin-bottom: 16px;
            color: #1a202c;
            font-weight: 600;
        }
        .service-card p {
            color: #718096;
            line-height: 1.8;
            font-size: 15px;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            height: 250px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Contact Form */
        .contact-section {
            background: #f9fafb;
        }
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        .btn-submit {
            background: #667eea;
            color: white;
            padding: 14px 40px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: background 0.3s;
        }
        .btn-submit:hover {
            background: #5568d3;
        }

        /* Footer */
        .footer {
            background: #1f2937;
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .footer a {
            color: #667eea;
            text-decoration: none;
        }

        /* Alert */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        /* Review Cards */
        .review-card {
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.1);
            border: 2px solid rgba(79, 172, 254, 0.1);
            transition: all 0.4s;
        }
        .review-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(79, 172, 254, 0.2);
            border-color: #4facfe;
        }

        /* Team Cards */
        .team-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.1);
            border: 2px solid rgba(79, 172, 254, 0.1);
            transition: all 0.4s;
            text-align: center;
        }
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(79, 172, 254, 0.25);
            border-color: #4facfe;
        }
        .team-photo {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
        }
        .team-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .team-card:hover .team-photo img {
            transform: scale(1.1);
        }
        .team-info {
            padding: 30px 25px;
        }
        .team-info h3 {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 8px;
        }
        .team-role {
            font-size: 16px;
            font-weight: 600;
            color: #4facfe;
            margin-bottom: 15px;
        }
        .team-bio {
            font-size: 15px;
            color: #718096;
            line-height: 1.7;
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding: 20px 0;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            transform: translateX(-50%);
        }
        .timeline-item {
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 60px;
            position: relative;
        }
        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }
        .timeline-year {
            min-width: 120px;
            font-size: 42px;
            font-weight: 700;
            color: #4facfe;
            text-align: center;
        }
        .timeline-content {
            flex: 1;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(79, 172, 254, 0.15);
            border-left: 4px solid #4facfe;
        }
        .timeline-content h3 {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 10px;
        }
        .timeline-content p {
            color: #718096;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 30px;
            }
            .timeline-item {
                flex-direction: column !important;
                align-items: flex-start;
                padding-left: 60px;
            }
            .timeline-year {
                position: absolute;
                left: 0;
                min-width: 80px;
                font-size: 28px;
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
                <a href="{{ url('/') }}" class="navbar-brand" aria-label="Home - {{ __('home.nav_brand') }}">{{ __('home.nav_brand') }}</a>
                <ul class="navbar-menu" role="menubar">
                    <li role="none"><a href="#home" role="menuitem" aria-label="{{ __('home.nav_home') }}">{{ __('home.nav_home') }}</a></li>
                    <li role="none"><a href="#services" role="menuitem" aria-label="{{ __('home.nav_services') }}">{{ __('home.nav_services') }}</a></li>
                    <li role="none"><a href="#gallery" role="menuitem" aria-label="{{ __('home.nav_gallery') }}">{{ __('home.nav_gallery') }}</a></li>
                    <li role="none"><a href="#contact" role="menuitem" aria-label="{{ __('home.nav_contact') }}">{{ __('home.nav_contact') }}</a></li>
                    <li class="lang-switcher" role="none">
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

    <!-- Services Section -->
    <section id="services" class="section" aria-labelledby="services-heading" itemscope itemtype="https://schema.org/Service">
        <div class="container">
            <h2 id="services-heading" class="section-title" itemprop="name">{{ __('home.services_title') }}</h2>
            <p class="section-subtitle" itemprop="description">{{ __('home.services_subtitle') }}</p>
            
            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">👴</div>
                    <h3>{{ __('home.service_elderly_care') }}</h3>
                    <p>{{ __('home.service_elderly_care_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">🧼</div>
                    <h3>{{ __('home.service_hygiene') }}</h3>
                    <p>{{ __('home.service_hygiene_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon">💇</div>
                    <h3>{{ __('home.service_hair') }}</h3>
                    <p>{{ __('home.service_hair_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon">🍽️</div>
                    <h3>{{ __('home.service_eating') }}</h3>
                    <p>{{ __('home.service_eating_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon">💊</div>
                    <h3>{{ __('home.service_medication') }}</h3>
                    <p>{{ __('home.service_medication_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon">👁️</div>
                    <h3>{{ __('home.service_monitoring') }}</h3>
                    <p>{{ __('home.service_monitoring_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon">🎨</div>
                    <h3>{{ __('home.service_activities') }}</h3>
                    <p>{{ __('home.service_activities_desc') }}</p>
                </div>

                <div class="service-card" data-aos="fade-up" data-aos-delay="400">
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
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100" role="listitem">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?w=600&h=400&fit=crop" 
                         alt="Professional caregiver providing elderly care services to senior woman - Swiss elderly care center" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200" role="listitem">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=400&fit=crop" 
                         alt="Seniors enjoying recreational activities and social engagement - Elderly care Switzerland" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300" role="listitem">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&h=400&fit=crop" 
                         alt="Professional medical staff team providing 24/7 elderly care and hygiene services" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400" role="listitem">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&h=400&fit=crop" 
                         alt="Comfortable and safe living environment for elderly care - Swiss senior home" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500" role="listitem">
                    <img loading="lazy" src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop" 
                         alt="Personal hygiene care and daily assistance for elderly - Professional caregiving services" 
                         width="600" height="400">
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600" role="listitem">
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

    <!-- Reviews Section -->
    <section class="section" style="background: #f9fafb;">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.reviews_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.reviews_subtitle') }}</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-top: 50px;">
                <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 style="font-weight: 700; color: #1a202c; margin-bottom: 5px;">Maria Schmidt</h4>
                            <div style="color: #fbbf24; font-size: 18px;">★★★★★</div>
                        </div>
                    </div>
                    <p style="color: #718096; line-height: 1.8; font-style: italic;">"{{ __('home.review_1_text') }}"</p>
                </div>

                <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                    <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Review" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <h4 style="font-weight: 700; color: #1a202c; margin-bottom: 5px;">Thomas Müller</h4>
                            <div style="color: #fbbf24; font-size: 18px;">★★★★★</div>
                        </div>
                    </div>
                    <p style="color: #718096; line-height: 1.8; font-style: italic;">"{{ __('home.review_2_text') }}"</p>
                </div>

                <div class="review-card" data-aos="fade-up" data-aos-delay="300">
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
    </section>

    <!-- Our Team Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.team_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.team_subtitle') }}</p>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 35px; margin-top: 50px;">
                <!-- Team Member 1 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-photo">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dr. Anna Weber - Head Physician" loading="lazy" width="280" height="280">
                    </div>
                    <div class="team-info">
                        <h3>Dr. Anna Weber</h3>
                        <p class="team-role">{{ __('home.team_role_1') }}</p>
                        <p class="team-bio">{{ __('home.team_bio_1') }}</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-photo">
                        <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Michael Schmidt - Senior Caregiver" loading="lazy" width="280" height="280">
                    </div>
                    <div class="team-info">
                        <h3>Michael Schmidt</h3>
                        <p class="team-role">{{ __('home.team_role_2') }}</p>
                        <p class="team-bio">{{ __('home.team_bio_2') }}</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-photo">
                        <img src="https://randomuser.me/api/portraits/women/47.jpg" alt="Sarah Müller - Hygiene Specialist" loading="lazy" width="280" height="280">
                    </div>
                    <div class="team-info">
                        <h3>Sarah Müller</h3>
                        <p class="team-role">{{ __('home.team_role_3') }}</p>
                        <p class="team-bio">{{ __('home.team_bio_3') }}</p>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-photo">
                        <img src="https://randomuser.me/api/portraits/men/52.jpg" alt="Peter Hoffmann - Medical Support" loading="lazy" width="280" height="280">
                    </div>
                    <div class="team-info">
                        <h3>Peter Hoffmann</h3>
                        <p class="team-role">{{ __('home.team_role_4') }}</p>
                        <p class="team-bio">{{ __('home.team_bio_4') }}</p>
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

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">{{ __('home.contact_title') }}</h2>
            <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">{{ __('home.contact_subtitle') }}</p>
            
            <div class="contact-form" data-aos="fade-up" data-aos-delay="200">
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
    </script>
</body>
</html>
