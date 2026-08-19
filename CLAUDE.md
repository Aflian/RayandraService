# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Rayandra** — Digital service platform (software house + digital services marketplace). Laravel 13.25, PHP 8.3, Filament v5 multi-panel admin, Tailwind CSS v4, Vite 8, Pest 4.

Tagline: "Turning Ideas into Digital Solutions"

See `PRD.md` for full product requirements.

### MVP Scope
- **Public site**: Home, About, Services, Portfolio, Blog, FAQ, Contact
- **4 Dashboards**: Admin, Workspace, Customer Digital, Customer Invitation
- **6 Services**: Undangan Digital, Pendampingan Akademik, Jasa Pemrograman, Desain Grafis, AI & Machine Learning, Website & Hosting
- **6 User roles**: Guest, CustomerDigital, CustomerInvitation, Workspace, Admin, SuperAdmin

### Out of Scope (MVP)
Payment Gateway, Mobile App, Marketplace, Vendor Dashboard, AI Assistant, Referral System

## Common Commands

### Development
```bash
# Start dev server (Vite + Laravel)
composer run dev
# or separately:
php artisan serve
npm run dev

# Build for production
npm run build
```

### Testing (Pest)
```bash
# Run all tests
./vendor/bin/pest
# or
php artisan test

# Run single test file
./vendor/bin/pest tests/Feature/ExampleTest.php

# Run with filter
./vendor/bin/pest --filter="test_name"
```

### Database
```bash
# Fresh migrate + seed
php artisan migrate:fresh --seed

# Create migration
php artisan make:migration create_table_name

# Create model + migration + factory + resource
php artisan make:model ModelName -mfr
```

### Filament
```bash
# Create resource in specific panel
php artisan make:filament-resource ModelName --panel=admin
php artisan make:filament-resource ModelName --panel=workspace
php artisan make:filament-resource ModelName --panel=customer

# Create page
php artisan make:filament-page PageName --panel=admin
```

### Code Quality
```bash
# Lint (if configured)
./vendor/bin/pint
# or
npm run lint
```

## Architecture

### Multi-Panel Filament Setup (4 panels)
| Panel | Path | Role | Purpose |
|-------|------|------|---------|
| Admin | `/admin` | SuperAdmin, Admin | Full system management |
| Workspace | `/workspace` | Workspace | Project team dashboard |
| Customer | `/customer` | CustomerDigital | Client order management |
| Invitation | `/invitation` | CustomerInvitation | Invited client access |

Each panel: `app/Providers/Filament/{PanelName}PanelProvider.php`, dashboard at `app/Filament/{PanelName}/Pages/Dashboard.php`. Shared resources in `app/Filament/Resources/`.

### Auth & Authorization
- `User` implements `FilamentUser` with `canAccessPanel(Panel $panel): bool`
- Roles in `app/Enums/UserRole.php`: `CustomerDigital`, `CustomerInvitation`, `Workspace`, `Admin`, `SuperAdmin`
- `getHomeUrl()` on User returns role-appropriate dashboard route
- Login redirects to correct panel via `AuthenticatedSessionController`

### Core Domain Models

```
Service (1) ──────< (N) ServiceCategory (self-referential parent/children)
                          │
                          ▼
                       Order ──────< Payment
                          │
              ┌───────────┼───────────┐
              ▼           ▼           ▼
           OrderFile    Task       Revision
              │
              ▼
         (stored in storage/app/public/orders/{order_id}/)
```

- **Order number**: Auto-generated `RTR-YEAR-SEQUENCE` (e.g., `RTR-2026-0001`)
- **Enums**: `OrderStatus`, `PaymentStatus`, `TaskStatus`, `RevisionStatus`, `OrderFileType` in `app/Enums/`
- **Content**: `Blog`, `Portfolio`, `FAQ` — all have `is_published`/`is_active`, slugs, SEO fields

### Key Controllers
- `HomeController` — Public pages (home, services, portfolio, blog, FAQ, contact, order flow)
- `ProfileController` — User profile management
- Auth controllers in `app/Http/Controllers/Auth/`

### Routes
- `routes/web.php` — All public + authenticated routes
- `routes/auth.php` — Laravel Breeze auth routes
- `routes/console.php` — Artisan commands

### Frontend
- Tailwind v4 via Vite (`vite.config.js` uses `@tailwindcss/vite`)
- Alpine.js for interactivity
- Custom CSS in `resources/css/app.css` (imports Tailwind)
- Welcome page uses inline Tailwind config for design tokens (colors, spacing, typography)

## Important Patterns

### Resource Registration
Filament resources auto-discovered per panel. Check `PanelProvider::getResources()` if overriding.

### Role-Based Redirects
After login, users redirect via `AuthenticatedSessionController::store()` → `$user->getHomeUrl()`.

### File Uploads
Order files stored in `storage/app/public/orders/{order_id}/`. Use `php artisan storage:link` for public access.

### Seeding
`DatabaseSeeder` creates comprehensive sample data for all models. Run `php artisan db:seed` after fresh migrate.

## File Structure Reference

```
app/
├── Enums/                 # 6 enums for statuses/roles
├── Filament/
│   ├── Resources/         # 12 shared resources
│   ├── CustomerPanel/Pages/
│   ├── InvitationPanel/Pages/
│   ├── WorkspacePanel/Pages/
│   └── AdminPanel/Pages/  # (if exists)
├── Http/Controllers/
├── Models/                # 12 models
├── Providers/Filament/    # 4 panel providers
└── View/Components/       # Blade components
database/
├── migrations/            # 16 migrations
├── factories/             # 12 factories
└── seeders/               # DatabaseSeeder
resources/views/
├── welcome.blade.php      # Public landing (glassmorphism, dynamic data)
├── layouts/               # Layout blades
├── components/            # Reusable components
└── filament/              # Panel-specific views
```

## Notes for Future Work

- Public landing page (`welcome.blade.php`) uses `HomeController@index` data: `$stats`, `$featuredServices`, `$featuredPortfolios`
- Service/category hierarchy drives order creation flow (`services.show` → `order.create` → `order.store`)
- Workspace panel manages tasks/revisions for assigned orders
- Customer panel shows own orders with payment upload + revision requests
- Dark mode ready via Tailwind `darkMode: "class"` — test both themes