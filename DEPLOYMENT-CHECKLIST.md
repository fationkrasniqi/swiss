# DEPLOYMENT CHECKLIST - Janira Care

## ✅ OPTIMIZIME TË BËRA (Completed)

### Database Optimization
- ✅ Email indexes në `clients` dhe `contact_messages` për queries të shpejta
- ✅ created_at indexes për sorting efficient
- ✅ Pagination në admin (15-20 records per page)

### SEO Optimization  
- ✅ Full meta tags në të 3 faqet (home, services, services-details)
- ✅ Open Graph për Facebook/social sharing
- ✅ Canonical URLs
- ✅ Schema.org JSON-LD për MedicalBusiness
- ✅ Robots meta tags

### Performance
- ✅ Lazy loading në të gjitha images
- ✅ Preconnect për external resources (fonts, CDN)
- ✅ Lightweight animations (AOS)
- ✅ Form validation client+server side

### Security
- ✅ CSRF protection në forms
- ✅ Email validation
- ✅ XSS protection (Laravel escaping)
- ✅ Auth middleware për admin routes

---

## 🚀 DEPLOYMENT STEPS

### 1. Pre-Deployment (Local)
```bash
# Pastro cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Optimizo për production
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Upload Files
- Ngarko projektin në `/home/USERNAME/laravel`
- Kopjo vetëm përmbajtjen e `public/` në `/public_html`

### 3. Configure Environment
- Kopjo `.env.production.example` në `.env`
- Plotëso DB credentials, APP_URL, MAIL settings
- Gjenero APP_KEY: `php artisan key:generate`

### 4. Database Setup
```bash
# Në server (nëse ke SSH)
php artisan migrate --force

# Pa SSH: Import manual me phpMyAdmin
```

### 5. Permissions (cPanel File Manager)
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### 6. Storage Link
```bash
# Me SSH
php artisan storage:link

# Pa SSH: krijo manual symbolic link në public_html
```

### 7. Post-Deployment
- Testo të 3 faqet: /, /services, /services-details
- Testo contact form dhe client form
- Verifikο email notifications
- Testo admin login dhe dashboard
- Enable SSL (Let's Encrypt në cPanel)

---

## 📊 PERFORMANCE METRICS (Expected)

- **Page Load**: < 2 seconds
- **Database Queries**: 5-10 per page (with indexes)
- **SEO Score**: 90+ (Google PageSpeed)
- **Mobile Responsive**: ✅ All pages

---

## 🔧 PRODUCTION SETTINGS

### Required in .env:
```
APP_ENV=production
APP_DEBUG=false
LOG_LEVEL=error
CACHE_DRIVER=file (or redis për më mirë)
SESSION_DRIVER=database
```

### Recommended (optional):
```
QUEUE_CONNECTION=database (për email async)
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=strict
```

---

## 🛡️ SECURITY NOTES

1. **Never commit .env** - Already in .gitignore
2. **Use strong DB passwords** - Min 16 characters
3. **Enable SSL immediately** - Let's Encrypt në cPanel
4. **Disable directory listing** - Add Options -Indexes në .htaccess
5. **Keep Laravel updated** - Check monthly për security patches

---

## 📞 TROUBLESHOOTING

### 500 Error:
- Check storage permissions (755)
- Check .env syntax
- Check error logs: `storage/logs/laravel.log`

### Database Connection Failed:
- Verify DB credentials në .env
- Check DB_HOST (usually `localhost`)
- Ensure DB user has privileges

### Email Not Sending:
- Test MAIL settings në cPanel
- Check MAIL_PORT (587 për TLS, 465 për SSL)
- Verify SMTP credentials

### White Screen:
- Check APP_KEY është generated
- Run `php artisan key:generate`
- Clear all caches

---

## ✨ FINAL CHECKS BEFORE GOING LIVE

- [ ] Database migrations run successfully
- [ ] Email forms working (test contact + client form)
- [ ] Admin login accessible dhe functional
- [ ] SSL certificate active (https)
- [ ] Social media links working
- [ ] All images loading correctly
- [ ] Mobile responsive të 3 faqet
- [ ] Google Search Console configured
- [ ] Google Analytics installed (optional)
- [ ] Backup strategy në vend (daily recommended)

---

**Projekti është i gatshëm për deployment! 🎉**
