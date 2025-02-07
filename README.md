<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Random Profile API

A robust REST API built with Laravel that generates random user profiles with customizable fields and gender options. The API includes request logging, rate limiting, and usage statistics.

## Features

- Generate single or multiple random profiles
- Filter profiles by gender (male/female)
- Customizable profile fields
- Request logging and statistics
- Rate limiting (60 requests per minute)
- Input validation
- Queue-based logging system

## API Endpoints

### Profile Generation
- `GET /api/profile` - Get a single random profile
- `GET /api/profiles/{count}` - Get multiple random profiles
- `GET /api/profiles/{gender}/{count}` - Get profiles by gender (male or female)

### Query Parameters
- `fields` - Comma-separated list of fields to include in the response
  - Example: `/api/profile?fields=name,surname,email`

### Statistics
- `GET /api/stats` - Get API usage statistics

## Rate Limiting

The API implements rate limiting to ensure fair usage:
- 60 requests per minute per IP address
- Exceeded limits will return a 429 Too Many Requests response

## Installation

1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your environment
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```

## Requirements

- PHP 8.1 or higher
- Laravel 10.x
- SQLite/MySQL/PostgreSQL

## Example Response

```json
{
    "gender": "female",
    "name": "Emel",
    "surname": "Tuğluk",
    "tckn": "50529731282",
    "serialNumber": "B19QUIGNS",
    "birthdate": "1974-07-12",
    "age": 50,
    "titles": {
        "academic_title": null
    },
    "email": "camdali.burcu@example.net",
    "phone": {
        "number": "05404368854",
        "device_operation_system": "Android",
        "device": "OnePlus 10 Pro",
        "imei": "478076218170846"
    },
    "loginCredentials": {
        "username": "Serhan_184",
        "email": "emel.tokgoz@example.com",
        "password": "|{8lwO}T[v=KO",
        "salt": "26a1720701dd2387d44ba77ec5872e91",
        "hash": "$2y$12$1tXCTWoAb.g4jNsIny9V2.bo/lfV6xnsEVEQDJAlEhjDpPUan5B.O",
        "md5": "e0f952d22050935b75d4bac8d81e152e",
        "sha1": "8b91926f8bc75bde76acb9c099008a7903178d8a",
        "sha256": "$2y$12$1tXCTWoAb.g4jNsIny9V2.bo/lfV6xnsEVEQDJAlEhjDpPUan5B.O",
        "created_at": "2025-01-02 09:38:43",
        "updated_at": "2025-02-06 05:18:24"
    },
    "miscellaneous": {
        "favorite_emojis": [
            "🤣",
            "😒"
        ],
        "language_code": "uz",
        "country_code": "TR",
        "locale_data": "zh_HK",
        "currency_code": "TRY"
    },
    "networkInfo": {
        "ipv_4": "249.17.116.227",
        "ipv_6": "3f39:23dc:cd64:8275:ea28:3cef:1f5e:243b",
        "mac_address": "1C:30:B8:03:0C:E0"
    },
    "maritalInfo": {
        "status": "married",
        "marriage_date": "1995-03-30",
        "marriedFor": 32,
        "spouse": {
            "gender": "male",
            "name": "Görkem",
            "surname": "Avan",
            "tckn": "39190001542",
            "serialNumber": "IF89VDE7C",
            "birthdate": "2006-11-23",
            "age": 70,
            "email": "babacan.ruzgar@example.org",
            "phone": {
                "number": "05462291223",
                "device_operation_system": "Android",
                "device": "Samsung Galaxy A53",
                "imei": "835716135716811"
            }
        }
    },
    "children": {
        "count": 0,
        "children": [

        ]
    },
    "address": {
        "fullAddress": "Sandalcı Kavşağı Merkez No: 97 / Aksaray",
        "city": "Aksaray",
        "district": "Merkez",
        "street": "Sandalcı Kavşağı",
        "apartmentNumber": 97,
        "postalCode": 47651,
        "timeZone": {
            "timeZone": "Europe/Istanbul",
            "time": "14:19:56"
        },
        "coordinates": {
            "latitute": "37.646023",
            "longitute": "28.386904"
        },
        "openstreetmap_link": "https://www.openstreetmap.org/?mlat=37.646023&mlon=28.386904"
    },
    "bankAccount": {
        "iban": "TR582580195862252129980748050",
        "bic": "BGWXTA1V268",
        "bank": "Yapı Kredi",
        "currency": "TRY",
        "balance": 50093.71,
        "debt": 49817.12
    },
    "images": {
        "avatar": "https://avatars.dicebear.com/api/personas/yiğit.jpg",
        "profile_picture": "https://xsgames.co/randomusers/avatar.php?g=female",
        "pixel_art": "https://xsgames.co/randomusers/avatar.php?g=pixel"
    },
    "job": {
        "workingStatus": "working",
        "company": "Çörekçi Poyrazoğlu A.Ş. Grup",
        "position": "Öğretmen",
        "startDate": "2008-05-21",
        "endDate": null,
        "experience": 16,
        "salary": {
            "monthly": 87326,
            "annually": 1047912
        }
    }
}
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the MIT license.
