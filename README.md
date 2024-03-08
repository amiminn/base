# Support System

Beberapa helper yang saya buat untuk membantu project laravel saya sendiri [@amiminn](https://github.com/amiminn/)

## Installation

Use the package manager composer to install

```bash
composer require amiminn/support:dev-master
```

## Usage

response data berupa json

### Response

```php
use Amiminn\Support\Response;

Response::success($msg);
Response::failed($msg, $status=400);
Response::error($status=400);
Response::data($data);
Response::random($num=40);
Response::epoch();
Response::url($path);
Response::user();
Response::uuid();
Response::to_lower($string);
```

### HttpService

```php
use Amiminn\Support\HttpService;

HttpService::get($url, $header=[]);
HttpService::post($url, $data, $header=[]);
```

### FileService

```php
use Amiminn\Support\FileService;

FileService::saveOnetoAsset($req, $name, $path);
FileService::saveMultitoAsset($req, $name, $path);
```

### EmailService

```php
use Amiminn\Support\EmailService;

EmailService::send($email_tujuan, $subject, $path, $data = [], $files = []);
```

### CacheService

```php
use Amiminn\Support\CacheService;

CacheService::put($name, $data = [], $minutes = 10);
CacheService::delete($name);
CacheService::reset();
```

## Contributors

<table>
  <tbody>
    <tr>
      <td align="center" valign="top" width="14.28%">
        <a href="https://amiminn.my.id">
          <img src="https://pbs.twimg.com/profile_images/1710911001187749888/0oWYnaWj_400x400.jpg" width="100px;" alt="Abdul Malik"/>
          <br />
          <sub><b>Tholabul Amin</b></sub>
        </a>
      </td>
    </tr>
  </tbody>
</table>
