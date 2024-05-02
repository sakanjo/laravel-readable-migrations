<h1 align="center">✨ Readable migrations</h1>

<p align="center">
    <a href="https://github.com/sakanjo/laravel-readable-migrations/actions"><img alt="Workflow status" src="https://img.shields.io/github/actions/workflow/status/sakanjo/laravel-readable-migrations/tests.yml?style=for-the-badge"></a>
    <a href="https://laravel.com"><img alt="Laravel v11.x" src="https://img.shields.io/badge/Laravel-v11.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://php.net"><img alt="PHP 8.3" src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php"></a>
</p>

<p align="center">Change migrations filenames to more readable numeric format.</p>

> ✨ Help support the maintenance of this package by [sponsoring me](https://github.com/sponsors/sakanjo).

![Preview](./art/preview.png)

Table of Contents
=================

* [Install](#-install)
* [Usage](#-usage)
 * [Options](#options)
    * [1. --pad](#1---pad)
    * [2. --gap](#2---gap)
* [Support the development](#-support-the-development)
* [Credits](#%EF%B8%8F-credits)
* [License](#-license)

## 📦 Install

```
composer require --dev sakanjo/laravel-readable-migrations
```

## 🦄 Usage

```bash
php artisan make:readable-migrations
```

That's it

## Options

### 1. --pad

```bash
php artisan make:readable-migrations --pad=4
```

This option allows you to specify the number of digits to pad the migration number with.

### 2. --gap

```bash
php artisan make:readable-migrations --gap=5
```

This option allows you to specify the number of digits to multiply the migration number by.

## 💖 Support the development

**Do you like this project? Support it by donating**

Click the ["💖 Sponsor"](https://github.com/sponsors/sakanjo) at the top of this repo.

## ©️ Credits

- [Salah Kanjo](https://github.com/sakanjo)
- [All Contributors](../../contributors)

## 📄 License

[MIT License](https://github.com/sakanjo/laravel-readable-migrations/blob/master/LICENSE) © 2023-PRESENT [Salah Kanjo](https://github.com/sakanjo)
