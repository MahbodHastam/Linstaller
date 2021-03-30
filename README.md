## Linstaller
Linstaller allows users to install your laravel application just by following the setup wizard like Wordpress or any other CMS.

### 🔧 Installing
Note: This package publishes a `config/lisntaller.php` file. If you already have a file by that name, you must rename or remove it.

1. Install package via composer: `composer require mahbodhastam/linstaller`
2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:
```php
'providers' => [
    // ...
    MahbodHastam\Linstaller\Providers\LinstallerServiceProvider::class,
];
```
3. You should publish the public assets and the config file with:
`php artisan vendor:publish --provider="MahbodHastam\Linstaller\Providers\LinstallerServiceProvider"`

### ♻️ Usage
* Edit the `config/linstaller.php` file and go to `example.com/linstaller`

Note: **It won't work if you're using `artisan serve`**

### ✅️ Current Features
* Check directory permissions
* Check server requirements
* Set .env information
* Migrate and seed the database

### ⛏️ To-do
* [x] Add translations
* [ ] Improve views and errors
