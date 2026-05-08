# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

OneTimeText is a Laravel 10 web app (PHP 8.2) for sharing self-destructing secrets: a user pastes text, gets a URL with a random key, and the recipient can read it exactly once before the row is deleted. The UI is primarily German. A paid "Pro" tier is layered on top via Laravel Cashier + Stripe.

## Commands

```bash
# Setup
composer install
npm install
cp .env.example .env && php artisan key:generate
php artisan migrate

# Dev
php artisan serve                 # PHP dev server
npm run watch                     # Recompile JS/SCSS on change (Laravel Mix)
npm run dev                       # One-off dev build
npm run prod                      # Production asset build

# Tests (PHPUnit, suites: Unit + Feature defined in phpunit.xml)
php artisan test
vendor/bin/phpunit
vendor/bin/phpunit --filter=SomeTestName              # single test
vendor/bin/phpunit tests/Feature/ExampleTest.php       # single file
```

Required env vars beyond stock Laravel (see `config/services.php`): `STRIPE_KEY`, `STRIPE_SECRET`, `PRICE_ID` (Stripe price for the Pro plan), `CONTACT_MAIL` (recipient for the contact form).

## Architecture

**Secret lifecycle.** The whole product is one model (`App\Models\Text`, table `texts`, columns `key`, `value`, `user_id`). The flow lives in `app/Http/Controllers/Secret/TextController.php`:
- `store()` generates a 15-char random `Str::random` key, validates `value` via `StoreSecretTextRequest`, and saves. Anonymous creators are stored as `user_id = 1` — that user must exist for unauth posts to succeed.
- `show($id)` looks the row up by `key` (not by `id`) and renders a confirmation page.
- `destroy($key)` is what actually reveals the secret: it loads the row, deletes it, then renders `secret.delete` with the in-memory copy. The "open" button on `show.blade.php` posts a DELETE to this route — that single click is the read-and-destroy step.
- `delete()` (separate from `destroy`) is an authenticated action used from the user dashboard to nuke an existing secret without revealing it.

Routes for secrets are mounted via `Route::resource('/secret', TextController::class)` inside a `text.` name prefix in `routes/web.php`, so use `route('text.secret.destroy', $key)` etc. The `routes/web.php` `use` statements include unusual short aliases (`use Admin\UserController; use Secret\TextController as TextController;`) that don't resolve to real namespaces — only the fully-qualified `App\Http\Controllers\...` imports are actually wired up.

**Auth.** Laravel Fortify drives registration/login/password reset/email verification. Wiring lives in `app/Providers/FortifyServiceProvider.php` (view bindings + rate limiters) and `app/Actions/Fortify/*` (create/update/reset user actions). Post-registration redirect is overridden by `app/Http/Responses/RegisterResponse.php`.

**Authorization.** Two Gates registered in `app/Providers/AuthServiceProvider.php`: `logged-in` and `is-admin` (delegates to `User::hasAnyRole('admin')`). Roles are a many-to-many on `User` (`App\Models\Role` + `role_user` pivot). The `auth.isAdmin` route middleware (`App\Http\Middleware\AccessAdmin`) gates admin areas; `app/Http/Controllers/Admin/UserController.php` additionally checks the gate inline and `dd()`s on failure.

**Billing (Pro plan).** `App\Models\User` uses the Cashier `Billable` trait. `App\Http\Controllers\PlanController` is the entire subscription surface: `order()` starts a Stripe Checkout session against `services.subscription.price`, `dashboard()` / `membership()` read subscription state, `billingPortal()` redirects to Stripe's hosted portal, and `deleteUser()` wraps a transactional cascade-delete of the user's `texts` rows + the user. Successful checkout returns to `route('welcome')`, cancellation to `route('whoops')`.

**Views.** All Blade templates extend `resources/views/templates/main.blade.php`. Asset bundling is Laravel Mix (`webpack.mix.js`) compiling `resources/js/app.js` → `public/js` and `resources/sass/app.scss` → `public/css`. German is the primary UI language (`resources/lang/de*`); legal pages (`/impressum`, `/datenschutz`, `/agb`, `/widerruf`) are German law boilerplate served by `LegalController`.

**Global middleware.** Note `Spatie\CookieConsent\CookieConsentMiddleware` is registered globally in `app/Http/Kernel.php` — every response gets the cookie-consent banner injected.
