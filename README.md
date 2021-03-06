# Permissions
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FDALTCORE%2FPermissions.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2FDALTCORE%2FPermissions?ref=badge_shield)


Laravel permissions handler, on your own model

## Install

Via Composer

``` bash
$ composer require daltcore/laravel-permissions
```

In your config/app.php at the Package Service Providers
``` php
DALTCORE\Permissions\ServiceProvider::class,
```

In your config/app.php at the Class Aliases
``` php
'Permission' => DALTCORE\Permissions\Facade::class,
```

In your app/Http/Kernel.php in $routeMiddleware
```php
'permission' => \DALTCORE\Permissions\Http\Middleware\CheckPermission::class,
'role' => \DALTCORE\Permissions\Http\Middleware\CheckRole::class,
```

Publish migrations
```bash
php artisan vendor:publish --tag=dpm-migrations
```

Run migrations
```bash
php artisan migrate
```

Add trait to User model
```php
use DALTCORE\Permissions\Traits\Permissible;
```

## Usage

Add a role
```php
Permission::addRole('admin');
```

Add a permission
```php
Permission::addPermission('create-users', 'a small description');
```

Link permission to role
```php
Permission::addPermissionToRole('admin', 'create-users');
```

Link role to user
```php
User::find(1)->giveRole('admin');
```

Check if user has role
```php
User::find(1)->hasRole('admin');
```

Check if user has permission
```php
User::find(1)->hasPermission('create-users');
```

Drop role from user
```php
User::find(1)->dropRole('admin');
```

Drop permission from role
```php
Permission::dropPermissionFromRole('admin', 'create-users');
```

Remove a permission
```php
Permission::removePermission('admin');
```

Remove a role
```php
Permission::removeRole('admin');
```

## Middleware
```php
Route::group(['middleware' => 'permission:create-users'], function () {
...
Route::group(['middleware' => 'role:admin'], function () {
```

## Blade directives
```text
@hasrole('admin')
I'm admin
@else
I'm not admin
@endhasrole

@haspermission('create-users')
I can create users
@else
I cannot create users
@endhaspermission

```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2FDALTCORE%2FPermissions.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2FDALTCORE%2FPermissions?ref=badge_large)