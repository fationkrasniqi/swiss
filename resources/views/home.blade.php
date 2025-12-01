<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kujdesi për Pleq - Shërbime profesionale</title>
    <link href="{{ asset('css/simple.css') }}" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333; }
        
        /* Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            text-decoration: none;
        }
        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none;
        }
        .navbar-menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        .navbar-menu a:hover {
            color: #667eea;
        }
        .lang-switcher {
            display: flex;
            gap: 10px;
        }
        .lang-btn {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border: 2px solid #667eea;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 13px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .lang-btn:hover {
            background: #667eea;
            color: white;
        }
        .lang-btn.active {
            background: #667eea;
            color: white;
        }
        
        /* Hero Section */
        .hero { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 20px;
            text-align: center;
            position: relative;
        }
        .hero h1 { font-size: 48px; margin-bottom: 20px; font-weight: 700; }
        .hero p { font-size: 20px; margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto; }
        .hero .btn-primary {
            background: white;
            color: #667eea;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: transform 0.3s;
        }
        .hero .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }

        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        /* Section */
        .section { padding: 80px 20px; }
        .section-title { 
            text-align: center; 
            font-size: 36px; 
            margin-bottom: 50px; 
            color: #333;
            font-weight: 700;
        }
        .section-subtitle {
            text-align: center;
            font-size: 18px;
            color: #666;
            margin-bottom: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .service-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #e5e7eb;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .service-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .service-card h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #667eea;
        }
        .service-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">{{ __('home.nav_brand') }}</a>
            <ul class="navbar-menu">
                <li><a href="#home">{{ __('home.nav_home') }}</a></li>
                <li><a href="#services">{{ __('home.nav_services') }}</a></li>
                <li><a href="#gallery">{{ __('home.nav_gallery') }}</a></li>
                <li><a href="#contact">{{ __('home.nav_contact') }}</a></li>
                <li class="lang-switcher">
                    <a href="{{ url('/lang/de') }}" class="lang-btn {{ app()->getLocale() == 'de' ? 'active' : '' }}">DE</a>
                    <a href="{{ url('/lang/sq') }}" class="lang-btn {{ app()->getLocale() == 'sq' ? 'active' : '' }}">SQ</a>
                    <a href="{{ url('/lang/en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1>{{ __('home.hero_title') }}</h1>
            <p>{{ __('home.hero_subtitle') }}</p>
            <a href="#contact" class="btn-primary">{{ __('home.hero_cta') }}</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="section-title">{{ __('home.services_title') }}</h2>
            <p class="section-subtitle">{{ __('home.services_subtitle') }}</p>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">👴</div>
                    <h3>{{ __('home.service_elderly_care') }}</h3>
                    <p>{{ __('home.service_elderly_care_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🧼</div>
                    <h3>{{ __('home.service_hygiene') }}</h3>
                    <p>{{ __('home.service_hygiene_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">💇</div>
                    <h3>{{ __('home.service_hair') }}</h3>
                    <p>{{ __('home.service_hair_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🍽️</div>
                    <h3>{{ __('home.service_eating') }}</h3>
                    <p>{{ __('home.service_eating_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">💊</div>
                    <h3>{{ __('home.service_medication') }}</h3>
                    <p>{{ __('home.service_medication_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">👁️</div>
                    <h3>{{ __('home.service_monitoring') }}</h3>
                    <p>{{ __('home.service_monitoring_desc') }}</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🎨</div>
                    <h3>{{ __('home.service_activities') }}</h3>
                    <p>{{ __('home.service_activities_desc') }}</p>
                </div>

                <div class="service-card">
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
    <section id="gallery" class="section" style="background:#f9fafb">
        <div class="container">
            <h2 class="section-title">{{ __('home.gallery_title') }}</h2>
            <p class="section-subtitle">{{ __('home.gallery_subtitle') }}</p>
            
            <div class="gallery">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1581579438747-1dc8d17bbce4?w=600&h=400&fit=crop" alt="Kujdesi për të moshuarit">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&h=400&fit=crop" alt="Aktivitete argëtuese">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&h=400&fit=crop" alt="Stafi ynë profesional">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&h=400&fit=crop" alt="Ambiente të rehatshme">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop" alt="Kujdes personal">
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=600&h=400&fit=crop" alt="Momente të lumtura">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <h2 class="section-title">{{ __('home.contact_title') }}</h2>
            <p class="section-subtitle">{{ __('home.contact_subtitle') }}</p>
            
            <div class="contact-form">
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Kujdesi për Pleq. {{ __('home.footer_rights') }}</p>
            <p style="margin-top:10px">
                <a href="{{ route('login') }}">Login</a> | 
                <a href="{{ route('register') }}">Register</a>
            </p>
        </div>
    </footer>
</body>
</html>
