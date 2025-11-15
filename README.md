# AppNomu Website Services

Professional website showcasing AppNomu's web design, mobile app development, and digital solutions for African businesses.

## 🌟 Features

- **Modern Design**: Clean, responsive design built with Bootstrap 5
- **Service Showcase**: Comprehensive display of web design, mobile apps, hosting, and domain services
- **Portfolio System**: Dynamic project showcase with admin management
- **Quote Request System**: Integrated quote request with Cloudflare Turnstile protection
- **Payment Plans**: Flexible payment options with interactive calculator
- **Website Audit Tool**: Lead generation tool with real website analysis
- **ROI Calculator**: Business-focused ROI calculations
- **Admin Panel**: Complete backend for managing quotes, projects, and users
- **Security Features**: Password reset system, OTP verification, and comprehensive security measures

## 🚀 Tech Stack

- **Frontend**: Bootstrap 5, Vanilla JavaScript, Bootstrap Icons
- **Backend**: PHP 7.4+, MySQL
- **Security**: Cloudflare Turnstile, CSRF protection, password hashing
- **Analytics**: Google Analytics GA4, PeopleEvents tracking
- **Chat**: Intercom widget integration
- **Email**: SMTP configuration for notifications

## 📋 Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Composer (optional, for dependencies)

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/appnomu/AppNomu-Website-Services.git
   cd AppNomu-Website-Services
   ```

2. **Configure environment variables**
   ```bash
   cp .env.example .env
   ```
   
   Edit `.env` and add your credentials:
   ```
   DB_HOST=localhost
   DB_NAME=your_database_name
   DB_USER=your_database_user
   DB_PASS=your_database_password
   
   SMTP_HOST=your_smtp_host
   SMTP_PORT=587
   SMTP_FROM=your_email@domain.com
   SMTP_PASSWORD=your_smtp_password
   
   TURNSTILE_SITE_KEY=your_turnstile_site_key
   TURNSTILE_SECRET_KEY=your_turnstile_secret_key
   ```

3. **Import database schema**
   ```bash
   mysql -u your_user -p your_database < database/schema.sql
   ```

4. **Set up file permissions**
   ```bash
   chmod 755 uploads/
   chmod 755 logs/
   ```

5. **Configure web server**
   - Point document root to the project directory
   - Enable `.htaccess` (Apache) or configure rewrite rules (Nginx)

## 🔐 Security Setup

### Admin Account Setup

1. Run the admin setup script:
   ```bash
   php admin/users.php
   ```

2. Default credentials (CHANGE IMMEDIATELY):
   - Username: `admin`
   - Password: `ChangeMe123!`

3. Access admin panel at: `https://yourdomain.com/admin/`

### Important Security Notes

- **Never commit `.env` file** - It contains sensitive credentials
- **Change default admin password** immediately after setup
- **Keep PHP and MySQL updated** for security patches
- **Use HTTPS** in production (required for Cloudflare Turnstile)
- **Regular backups** of database and uploads folder

## 📁 Project Structure

```
AppNomu-Website-Services/
├── admin/              # Admin panel
│   ├── includes/       # Admin components
│   ├── login.php       # Admin login
│   ├── index.php       # Dashboard
│   ├── quotes.php      # Quote management
│   ├── projects.php    # Portfolio management
│   └── users.php       # User management
├── assets/             # Static assets
│   ├── css/           # Stylesheets
│   ├── js/            # JavaScript files
│   └── images/        # Images
├── blog/              # Blog articles
├── config/            # Configuration files
├── database/          # Database schemas
├── includes/          # Shared components
│   ├── header.php     # Site header
│   ├── footer.php     # Site footer
│   └── cookie-notice.php
├── uploads/           # User uploads (gitignored)
├── logs/              # Application logs (gitignored)
├── .env.example       # Environment template
├── .gitignore         # Git ignore rules
├── .htaccess          # Apache configuration
└── index.php          # Homepage
```

## 🌐 Key Pages

- **Homepage** (`index.php`) - Hero section, services, stats, testimonials
- **Services** (`services.php`) - Detailed service offerings
- **Portfolio** (`portfolio.php`) - Project showcase
- **About** (`about.php`) - Company information
- **Contact** (`contact.php`) - Contact form
- **Request Quote** (`request-quote.php`) - Quote request system
- **Payment Plans** (`payment-plans.php`) - Flexible payment options
- **Website Audit** (`website-audit.php`) - Free website analysis tool
- **ROI Calculator** (`roi-calculator.php`) - Business ROI calculations

## 🔌 API Integrations

- **Cloudflare Turnstile**: Bot protection for forms
- **Intercom**: Live chat widget (App ID: j2sfvra7)
- **Google Analytics**: GA4 tracking
- **PeopleEvents**: User behavior analytics

## 📧 Email Configuration

The system sends emails for:
- Quote requests
- Contact form submissions
- Admin notifications
- Password reset requests
- New user welcome emails

Configure SMTP settings in `.env` file.

## 🛠️ Development

### Local Development

1. Use XAMPP, MAMP, or similar local server
2. Create database and import schema
3. Configure `.env` with local credentials
4. Access via `http://localhost/`

### Database Management

- **Schema**: `database/schema.sql`
- **Tables**: 
  - `quote_requests` - Customer quotes
  - `admin_users` - Admin accounts
  - `projects` - Portfolio items
  - `applications` - Job applications
  - `audit_leads` - Website audit leads
  - `password_resets` - Password reset tokens

## 🚀 Deployment

1. Upload files to web server
2. Configure `.env` with production credentials
3. Import database schema
4. Set proper file permissions
5. Configure SSL certificate
6. Update Cloudflare Turnstile keys for production domain
7. Test all forms and functionality

## 📝 License

© 2024 AppNomu Business Services. All rights reserved.

## 👥 Team

- **Bahati Asher Faith** - CEO & Lead Developer
- **Sharon Payne** - Co-Founder
- **Nansubuga Mary Christine** - Co-Founder

## 📞 Support

- **Website**: https://appnomu.com
- **Email**: info@appnomu.com
- **Phone (Uganda)**: +256 200 948 420
- **Phone (USA)**: +1 888 652 2233

## 🌍 Locations

- **Uganda HQ**: 77 Market Street, Bugiri Municipality, Uganda
- **USA Office**: 631 Ridgel St, Dover, Delaware 19904-2772

---

**Built with ❤️ by AppNomu Team**
