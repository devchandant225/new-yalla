# Professional Organization Website - Laravel Project

## 📋 Project Overview

A comprehensive Laravel-based website for professional organizations (based on Plant Breeding and Genetics Society model), featuring content management, membership systems, publication management, and administrative capabilities.

## 🚀 Features

- **Content Management System** - News, events, notices management
- **Membership System** - Registration, member profiles, different membership tiers
- **Publication Management** - Journal issues, articles, reports, proceedings
- **Media Gallery** - Image, video, and audio management
- **Admin Dashboard** - Complete backend management
- **Article Submission System** - Journal submission workflow
- **Donation Management** - Online donation tracking
- **Multi-language Support** - Ready for internationalization

## 🛠️ Technology Stack

- **Framework**: Laravel 10.x
- **PHP**: >= 8.1
- **Database**: MySQL 8.0+ / PostgreSQL 13+
- **Frontend**: Blade Templates, Alpine.js, Tailwind CSS
- **File Storage**: Laravel Storage (local/S3)
- **Authentication**: Laravel Breeze/Sanctum
- **Queue**: Redis (optional)
- **Cache**: Redis (optional)

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   ├── HomeController.php
│   ├── AboutController.php
│   ├── InformationController.php
│   ├── PublicationsController.php
│   ├── MembershipController.php
│   ├── MediaController.php
│   ├── SubmissionController.php
│   └── Admin/
│       ├── AdminController.php
│       ├── MemberController.php
│       └── PublicationController.php
├── Models/
│   ├── User.php
│   ├── Member.php
│   ├── Notice.php
│   ├── Event.php
│   ├── Journal.php
│   ├── Article.php
│   ├── Submission.php
│   └── Media.php
├── Mail/
├── Policies/
└── Services/

resources/views/
├── layouts/
│   ├── app.blade.php
│   ├── admin.blade.php
│   └── guest.blade.php
├── home.blade.php
├── about/
├── information/
├── publications/
├── membership/
├── media/
└── admin/

database/
├── migrations/
├── seeders/
└── factories/
```

## 🔧 Installation & Setup

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Git

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/professional-organization-website.git
   cd professional-organization-website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure environment variables**
   ```env
   APP_NAME="Professional Organization"
   APP_URL=http://localhost:8000
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=professional_org
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   
   MAIL_MAILER=smtp
   MAIL_HOST=your_mail_host
   MAIL_PORT=587
   MAIL_USERNAME=your_email
   MAIL_PASSWORD=your_password
   MAIL_ENCRYPTION=tls
   ```

6. **Database setup**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Storage link**
   ```bash
   php artisan storage:link
   ```

8. **Compile assets**
   ```bash
   npm run build
   ```

9. **Start development server**
   ```bash
   php artisan serve
   ```


| Role                     | Suggested Color                | Purpose & Effect                                                  |
|--------------------------|------------------------------- |-------------------------------------------------------------------|
| **Primary brand color**  | Green (`#4CAF50`)              | Conveys growth, agriculture, and eco-focus.                       |
| **Secondary accent**     | Blue (`#2D6CCA`)               | Supports trust, clarity; great for headers, links, calls to action.|
| **Neutral base**         | White / Light Gray             | Clean background to maintain focus and readability.               |
| **Optional earthy accent** | Brown (`#8B5E3C`)            | Subtle detailing for a grounded, organic touch if desired.        |


## 🗺️ URL Structure & Routes




### Public Routes

| Page | URL | Controller | Description |
|------|-----|------------|-------------|
| Home | `/` | `HomeController@index` | Landing page |
| About Introduction | `/about/introduction` | `AboutController@introduction` | Organization intro |
| Executive Committee | `/about/executive-committee` | `AboutController@executiveCommittee` | Leadership team |
| Notices | `/information/notices` | `InformationController@notices` | Notice listings |
| Notice Detail | `/information/notices/{slug}` | `InformationController@showNotice` | Individual notice |
| Events | `/information/events` | `InformationController@events` | Events listing |
| Journal | `/publications/journal` | `PublicationsController@journalIndex` | Journal home |
| Journal Issue | `/publications/journal/issue/{volume}-{number}` | `PublicationsController@issue` | Specific issue |
| Article Detail | `/publications/journal/article/{slug}` | `PublicationsController@article` | Article page |
| Membership Register | `/membership/register` | `MembershipController@create` | Registration form |
| Members List | `/membership/{type}` | `MembershipController@list` | Member directory |
| Media Gallery | `/media/gallery` | `MediaController@gallery` | Image gallery |
| Submit Article | `/submission` | `SubmissionController@create` | Submission form |
| Contact | `/contact` | `ContactController@index` | Contact page |

### Admin Routes (Protected)

| Function | URL | Controller | Description |
|----------|-----|------------|-------------|
| Dashboard | `/admin/dashboard` | `Admin\AdminController@dashboard` | Admin home |
| Manage Notices | `/admin/notices` | `Admin\NoticeController` | CRUD notices |
| Manage Events | `/admin/events` | `Admin\EventController` | CRUD events |
| Journal Management | `/admin/journal` | `Admin\JournalController` | Journal admin |
| Member Management | `/admin/members` | `Admin\MemberController` | Member admin |
| Submissions | `/admin/submissions` | `Admin\SubmissionController` | Review submissions |
| Media Manager | `/admin/media` | `Admin\MediaController` | File management |

## 🗄️ Database Schema

### Core Tables

```sql
-- Members table
members: id, user_id, member_type, status, affiliation, profile_photo, bio, orcid, joined_at

-- Notices table
notices: id, title, slug, content, published_at, featured, attachment_path

-- Events table
events: id, title, slug, description, start_date, end_date, location, registration_required

-- Journal Issues table
journal_issues: id, volume, number, year, title, description, published_at, cover_image

-- Articles table
articles: id, issue_id, title, slug, abstract, content, authors, keywords, pdf_path, doi

-- Submissions table
submissions: id, title, abstract, corresponding_author, co_authors, manuscript_path, status

-- Media table
media: id, title, description, file_path, file_type, category
```

## 👤 User Roles & Permissions

### Roles
- **Super Admin**: Full system access
- **Editor**: Content management, member approval
- **Author**: Article submission access
- **Member**: Basic member access
- **Guest**: Public content only

### Permissions
- `manage-users`: User management
- `manage-content`: Content CRUD operations  
- `manage-members`: Member approval/management
- `manage-publications`: Journal/publication management
- `review-submissions`: Article review process

## 🎨 Frontend Architecture

### Blade Components
```
resources/views/components/
├── layout/
│   ├── header.blade.php
│   ├── footer.blade.php
│   ├── sidebar.blade.php
│   └── navigation.blade.php
├── forms/
│   ├── input.blade.php
│   ├── textarea.blade.php
│   └── file-upload.blade.php
├── cards/
│   ├── notice-card.blade.php
│   ├── event-card.blade.php
│   └── member-card.blade.php
└── ui/
    ├── button.blade.php
    ├── modal.blade.php
    └── alert.blade.php
```

### Tailwind CSS Configuration
- Custom color palette matching organization branding
- Responsive design utilities
- Component-based styling approach

## 📧 Email System

### Mail Classes
- `WelcomeMember` - New member welcome email
- `SubmissionReceived` - Submission confirmation
- `EventReminder` - Event notifications
- `NewsletterMail` - Newsletter distribution

### Queued Jobs
- Email sending (queued for performance)
- File processing (PDF generation)
- Image optimization
- Data exports

## 🔐 Security Features

- **Authentication**: Laravel Breeze/Sanctum
- **Authorization**: Role-based permissions
- **CSRF Protection**: All forms protected
- **File Upload Security**: Validated file types and sizes
- **SQL Injection Prevention**: Eloquent ORM protection
- **XSS Protection**: Blade template escaping

## 📱 API Endpoints (Optional)

```php
// API Routes (if mobile app needed)
Route::prefix('api/v1')->group(function () {
    Route::get('/notices', [Api\NoticeController::class, 'index']);
    Route::get('/events', [Api\EventController::class, 'index']);
    Route::get('/publications', [Api\PublicationController::class, 'index']);
    Route::post('/submissions', [Api\SubmissionController::class, 'store']);
});
```

## 🧪 Testing

### Test Structure
```bash
tests/
├── Feature/
│   ├── HomePageTest.php
│   ├── MembershipTest.php
│   ├── SubmissionTest.php
│   └── Admin/
├── Unit/
│   ├── MemberTest.php
│   └── ArticleTest.php
└── Browser/
    └── AdminFlowTest.php
```

### Running Tests
```bash
# Unit tests
php artisan test

# Feature tests
php artisan test --testsuite=Feature

# Browser tests (requires Laravel Dusk)
php artisan dusk
```

## 🚀 Deployment

### Production Setup

1. **Server Requirements**
   - PHP 8.1+, Nginx/Apache
   - MySQL/PostgreSQL
   - Redis (optional)
   - SSL certificate

2. **Environment Configuration**
   ```bash
   # Production environment
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-domain.com
   
   # Cache configuration
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Deployment Commands**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan migrate --force
   php artisan storage:link
   npm run build
   ```

### CI/CD Pipeline (GitHub Actions)
```yaml
# .github/workflows/deploy.yml
name: Deploy to Production
on:
  push:
    branches: [main]
jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Deploy to server
        run: |
          # Your deployment script
```

## 📊 Performance Optimization

- **Caching**: Redis for session, cache, and queues
- **Database**: Proper indexing on search columns
- **Images**: Automatic optimization and WebP conversion
- **CDN**: CloudFlare integration ready
- **Lazy Loading**: Image and content lazy loading

## 🔧 Development Commands

```bash
# Generate controllers
php artisan make:controller Admin/MemberController --resource

# Generate models with migration
php artisan make:model Article -mfs

# Generate form requests
php artisan make:request StoreArticleRequest

# Generate mail classes
php artisan make:mail WelcomeMember --markdown=emails.welcome

# Generate seeders
php artisan make:seeder MemberSeeder

# Clear caches
php artisan optimize:clear
```

## 📖 Documentation

- **API Documentation**: Available at `/docs` (if API implemented)
- **Admin Guide**: See `/docs/admin-guide.md`
- **User Manual**: See `/docs/user-manual.md`
- **Deployment Guide**: See `/docs/deployment.md`

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

### Coding Standards
- PSR-12 coding standards
- PHPDoc comments for all methods
- Descriptive commit messages
- Test coverage for new features

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

For support and questions:

- **Documentation**: Check `/docs` folder
- **Issues**: Create GitHub issue
- **Email**: support@your-organization.org
- **Discord**: Join our development server

## 📋 TODO / Roadmap

- [ ] Multi-language support implementation
- [ ] Advanced search functionality
- [ ] Mobile application API
- [ ] Advanced analytics dashboard
- [ ] Social media integration
- [ ] Newsletter automation
- [ ] Online payment integration
- [ ] Document management system
- [ ] Calendar integration
- [ ] Video conferencing integration

## 👥 Team

- **Project Lead**: Your Name
- **Backend Developer**: Developer Name  
- **Frontend Developer**: Developer Name
- **UI/UX Designer**: Designer Name

---

**Last Updated**: January 2025  
**Version**: 1.0.0