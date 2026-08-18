# AGENTS.md

## Project

RATANDRA - digital service platform (Laravel 13, PHP 8.3, MySQL local / SQLite tests).

Full product spec lives in `PRD.md`. Consult it before building any feature.

## Stack

- Laravel 13.25 + PHP 8.3
- Tailwind CSS v4 + Vite 8
- Filament v5 (admin panel)
- Pest 4 for testing
- Laravel Pint for formatting

## Commands

```bash
# Full setup
composer setup

# Dev server (artisan + vite)
composer run dev

# Tests
composer run test                        # all tests (clears config cache first)
php artisan test --compact               # same
php artisan test --compact --filter=name # single test

# Formatting (run after any PHP edit)
vendor/bin/pint --dirty --format agent
```

## Test database

Tests run against SQLite in-memory (`phpunit.xml` sets `DB_CONNECTION=sqlite`, `DB_DATABASE=:memory:`). No migration needed - tests use `RefreshDatabase`.

## Frontend

Vite entry points: `resources/css/app.css`, `resources/js/app.js`. After changes, run `npm run build` or ask user to run `npm run dev`.

## Conventions

- Check sibling files before creating new ones - match existing patterns.
- Reuse existing components before writing new ones.
- Use `php artisan make:*` for new files. Pass `--no-interaction` to all Artisan commands.
- After creating models, also create factories and seeders.
- Use `--pest` flag when creating tests.
- After PHP edits: `vendor/bin/pint --dirty --format agent`.
- Do not create docs unless asked.
- Do not change dependencies without approval.
- Do not create new base directories without approval.

## Laravel 13 model style

Models use **attributes** instead of properties:

```php
#[Fillable(['name', 'email'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

Use `#[Fillable([...])]` not `$fillable = [...]`.
Use `#[Hidden([...])]` not `$hidden = [...]`.
Use `casts()` method not `$casts` property.

## Laravel Boost skills

Available in `.agents/skills/`. Activate relevant skill when working in that domain. Do not wait until stuck.
