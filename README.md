<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## ระบบ POS

เป็นระบบซื้อ-ขาย ของร้านชำทั่วไป สร้างเพื่อเป็นคอร์สเรียนสอนการเขียนระบบด้วย Laravel Framework:

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

Username & Password สำหรับล็อกอินเข้าระบบ:

-   **Username:** admin
-   **Password:** password
-   **Username:** employee
-   **Password:** password
-   **Username:** customer
-   **Password:** password

## บทเรียน


### Section 0 : เตรียมเครื่องมือ

1. **ติดตั้งเครื่องมือที่จำเป็น**
2. **ติดตั้ง Laravel**
3. **[ติดตั้ง plugin](https://github.com/chagy/laravel-pos/commit/27eb267a15d714338e671ca1fdd3cfa5f40fb486)**
4. **[ติดตั้ง Package Login](https://github.com/chagy/laravel-pos/commit/e32840009f4fc2d0290d1ca42d8397da45de269c)**
5. **[ติดตั้ง Pakage Permission](https://github.com/chagy/laravel-pos/commit/ad1b7ba45891c71926f80e2453d472ed8813ee5a)**
6. **ติดตั้ง Extension VS code**