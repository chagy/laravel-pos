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

### Section 1 : DB

1. **อธิบาย Diagram**
2. **[Migrate Province](https://github.com/chagy/laravel-pos/commit/f75c3fac2586e70d3e47939b441e8d1a502dfa16)**
3. **[Migrate District](https://github.com/chagy/laravel-pos/commit/7a331124ad05c2744503a415e7e0d2697bcc31a4)**
4. **[Migrate SubDistrict](https://github.com/chagy/laravel-pos/commit/70afbc66414ce668d6224652e833ad1d2fcf5863)**
5. **[Migrate User](https://github.com/chagy/laravel-pos/commit/9a0ef96cf601bf4bac586a65a613ccb9d3d36e19)**
6. **[Migrate Supplier](https://github.com/chagy/laravel-pos/commit/4e59c79a85b132c3a0114a8f17bcd16ad421e08e)**
7. **[Migrate Category](https://github.com/chagy/laravel-pos/commit/8c713df2f0164f9193f12013277fbc4788e723f0)**
8. **[Migrate Product](https://github.com/chagy/laravel-pos/commit/0c126bbe100146cb107f3730ca56bc0d106ea753)**
9. **[Migrate Import](https://github.com/chagy/laravel-pos/commit/96d78f4c9d9e9ceb436baf6702efbae008713183)**
10. **[Migrate Import Product Item](https://github.com/chagy/laravel-pos/commit/cb46c90ccb08fa9ea1e91f9ca40532406556d328)**
11. **[Migrate Promotion](https://github.com/chagy/laravel-pos/commit/786a65c5f4b3edbf3bdc229e5758790eac6d8c67)**
12. **[Migrate Promotion Condition](https://github.com/chagy/laravel-pos/commit/3feb04fb65e671785443363931b75713f3da47dc)**
13. **[Migrate Promotion Product](https://github.com/chagy/laravel-pos/commit/f439afb9b4fd4024f7528792857532be9e6b7213)**
14. **[Migrate Pos Order](https://github.com/chagy/laravel-pos/commit/c4bbdb3e490098300c14dda2d3411c761263a24c)**
15. **[Migrate Pos Order Item](https://github.com/chagy/laravel-pos/commit/69c1c95f347b69232fc11742dddb88342b4c80e3)**
16. **[Migrate Setting](https://github.com/chagy/laravel-pos/commit/957ef3da6c768dbba0b356d3efea73a2412aa735)**