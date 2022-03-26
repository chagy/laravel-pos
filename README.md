<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## ระบบ POS

เป็นระบบซื้อ-ขาย ของร้านชำทั่วไป สร้างเพื่อเป็นคอร์สเรียนสอนการเขียนระบบด้วย Laravel Frame:

## ขั้นตอนการติดตั้งระบบ
สร้างโปรเจ็คด้วยคำสั่ง git clone:
```sh
git clone https://github.com/chagy/laravel-pos.git <ชื่อโพลเดอร์โปรเจ็ค>
cd <ชื่อโพลเดอร์โปรเจ็ค>
```
ติดตั้ง PHP dependencies:
```sh
composer install
```
ตั้งค่า configuration:

```sh
cp .env.example .env
```

สร้าง application key:

```sh
php artisan key:generate
```

สร้างฐานข้อมูล เป็น MySQL แล้วกำหนดค่าฐานข้อมูลในไฟล์ .env
```sh
DB_DATABASE=ชื่อ ฐานข้อมูล
DB_USERNAME=username ฐานข้อมูล
DB_PASSWORD=password ฐานข้อมูล
```

Run คำสั่ง database migrations:

```sh
php artisan migrate
```

Run คำสั่ง database seeder:

```sh
php artisan db:seed
```

Run server:

```sh
php artisan serve
```

You're ready to go! Visit the url in your browser, and login with:

-   **Username:** admin@filamentphp.com
-   **Password:** password

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
