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

### Section 2 : Layout

1. **[สร้าง Layout Main](https://github.com/chagy/laravel-pos/commit/7adbc8ab2f6fd9dd328a60f8b6123f424ae977e6)**
2. **[สร้าง Header](https://github.com/chagy/laravel-pos/commit/7adbc8ab2f6fd9dd328a60f8b6123f424ae977e6)**
3. **[สร้าง Footer](https://github.com/chagy/laravel-pos/commit/f52e0155617a16dcb3752d87876e4cb5c311839b)**
4. **[สร้าง Content](https://github.com/chagy/laravel-pos/commit/35f2868ccb3893ede51c65fd8c54cf2a7fd3dc76)**
5. **[สร้าง Sidebar](https://github.com/chagy/laravel-pos/commit/46dd115ed59a9b4ac095814ef99c6002eafeeaa0)**

### Section 3 : Province (จัดการจังหวัด)

1. **[สร้างหน้ารายการจังหวัด](https://github.com/chagy/laravel-pos/commit/15058568c00dba7c01b767d1fb9cea8c3d3f72b6)**
2. **[Query ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/15058568c00dba7c01b767d1fb9cea8c3d3f72b6)**
3. **[Search ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/15058568c00dba7c01b767d1fb9cea8c3d3f72b6)**
4. **[Pagination ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/1accef5eca6a771196be982378548c095b74080e)**
5. **[สร้างหน้าเพิ่ม ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/ba68ec8d6fb6ca92116e5f38989121e8467c6e36)**
6. **[เพิ่ม ข้อมูลจังหวัดลงฐานข้อมูล](https://github.com/chagy/laravel-pos/commit/7d4d52a1cc2b90bce3ca9870ff8444fd6ab6ac7b)**
7. **[การตอบรับ ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/1af626973d42613c46ff0d27628228555c5fd340)**
8. **[Validation ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/0d9501a27c72dd689bcfe76a7f6cf36e5d5fdd35)**
9. **[แก้ไข ข้อมูลจังหวัด](https://github.com/chagy/laravel-pos/commit/1984ba457b578977956305777b28e1ded827f334)**

### Section 4 : District (จัดการอำเภอ)

1. **[สร้างหน้ารายการอำเภอ](https://github.com/chagy/laravel-pos/commit/a55f9b17bdede6df102c3f7d6704c66ad455945e)**
2. **[เพิ่มและแก้ไขข้อมูลอำเภอ](https://github.com/chagy/laravel-pos/commit/93b2cbe8b541d2d0c3eb2b7ed623040e49afd211)**

### Section 5 : SubDistrict (จัดการตำบล)

1. **[สร้างหน้ารายการตำบล](https://github.com/chagy/laravel-pos/commit/4c35b318a42d67646ebf5f8f350e4a7a1ebaa2e0)**
2. **[เพิ่มและแก้ไขข้อมูลตำบล](https://github.com/chagy/laravel-pos/commit/3372cedfeafe8d856bd0ff684f2734f975ca52ff)**

### Section 6 : Supplier (จัดการผู้ผลิต)

1. **[สร้างหน้ารายการผู้ผลิต](https://github.com/chagy/laravel-pos/commit/091c9df25e06f0a2c17c92bb22c83a32a0767c2f)**
2. **[ฟอร์มกรอกข้อมูลผู้ผลิต](https://github.com/chagy/laravel-pos/commit/c67a62994af645ac48e4c37b9088a7ff998afa01)**
3. **[Validation ข้อมูลผู้ผลิต](https://github.com/chagy/laravel-pos/commit/06ef3e67f252fe40b6c109d2d8473afa16cfa140)**
4. **[เลือกข้อมูลจังหวัด อำเภอ ตำบล](https://github.com/chagy/laravel-pos/commit/44e912cccf8567987b81358cdfb3843dcf876154)**
5. **[เพิ่มข้อมูลผู้ผลิต](https://github.com/chagy/laravel-pos/commit/5ceb23a1948af51c167c3567922ddd109c689a05)**
6. **[แก้ไขข้อมูลผู้ผลิต](https://github.com/chagy/laravel-pos/commit/d00cc2b6cd8d818ef0cb40b3e1a10097721b239f)**
7. **[Loading ข้อมูลผู้ผลิต](https://github.com/chagy/laravel-pos/commit/47e8cb02f14c1c84232086e8b215920538d34f91)**

### Section 7 : Employee (จัดการพนักงาน)

1. **[สร้างหน้ารายการพนักงาน](https://github.com/chagy/laravel-pos/commit/9f2b4045983651be96e6d05bdb7fd61c368c7350)**
2. **[ฟอร์มกรอกข้อมูลพนักงาน](https://github.com/chagy/laravel-pos/commit/61234f77303d72a2cd53bb1716461a94087cf57b)**
3. **[Validation ข้อมูลพนักงาน](https://github.com/chagy/laravel-pos/commit/f3921bc739fa94d9491a218819bb86a693da1c95)**
4. **[เพิ่มข้อมูลพนักงาน](https://github.com/chagy/laravel-pos/commit/5cb7acd33fa0f77444e0e69d082418630ff7297b)**
5. **[เพิ่มข้อมูลรูปพนักงาน](https://github.com/chagy/laravel-pos/commit/6badba350934f0fc7d4524eadebb5e62c0d9992e)**
6. **[แก้ไขข้อมูลพนักงาน](https://github.com/chagy/laravel-pos/commit/faae674963014462c0716b355860fa1e0ba30cef)**

### Section 8 : Customer (จัดการลูกค้า)

1. **[สร้างหน้ารายการลูกค้า](https://github.com/chagy/laravel-pos/commit/16a3e5e47d8199e1fb5367c2994e88eb009fde9e)**
2. **[เพิ่มและแก้ไขข้อมูลลูกค้า](https://github.com/chagy/laravel-pos/commit/f32dc53df864641d2e122ce675f7ebae8f66470d)**

### Section 9 : Category (จัดการประเภทสินค้า)

1. **[สร้างหน้ารายการประเภทสินค้า](https://github.com/chagy/laravel-pos/commit/961e8c942856a94c9276a8dbfaad22435e9f3060)**
1. **[เพิ่มและแก้ไขข้อมูลประเภทสินค้า](https://github.com/chagy/laravel-pos/commit/f5f4c82289d4fc2f20393b49c73598fffeaa1b02)**

### Section 10 : Product (จัดการสินค้า)

1. **[สร้างหน้ารายการสินค้า](https://github.com/chagy/laravel-pos/commit/dfbdc8faef8da21bcea26536fec1ff60233bcc75)**
2. **[สร้างฟอร์มกรอกข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/f64134354620ee9f4a4a750ee3393dd8ae9db6a5)**
3. **[Validation ข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/66d0d2c8f9e98c70b953e7a6b81a0b46678684cf)**
4. **[เพิ่ม ข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/17424e6c5e75ef048f001bef16aa3c9ea87f171e)**
5. **[แก้ไข ข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/6dc5d4ed03eeee22dc7ed4b6dc74e5ce54066e47)**

### Section 11 : Import (จัดการนำเข้าสินค้า)

1. **[สร้างหน้ารายการนำเข้าสินค้า](https://github.com/chagy/laravel-pos/commit/02d903956832b98846aea9366c3579c4cad92b92)**
2. **[สร้างฟอร์มกรอกข้อมูลนำเข้าสินค้า](https://github.com/chagy/laravel-pos/commit/19d51144e8145a8cc7b1068c578794759750b5ea)**
3. **[สร้างป๊อบอัพเลือกข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/f978a9ebf6076a9ce7a350b195ef8fe72a42dd2e)**
4. **[ป๊อบอัพค้นหาข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/a76147be42c5d0c0e7af541734ecb23807725249)**
5. **[เลือกข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/c95410fd808a364608091cbeb023d28b9ec2e199)**
6. **[สร้างฟอร์มกรอกจำนวนสินค้า](https://github.com/chagy/laravel-pos/commit/159556038ce10bb08ccf44bded8117e95eb0f43e)**
7. **[ยอดรวมสินค้าตามรายการ](https://github.com/chagy/laravel-pos/commit/6c07f0b1ee54a697d80cf3d817755484fb670195)**
8. **[ลบข้อมูลสินค้า](https://github.com/chagy/laravel-pos/commit/9e2137165e5e91a4b5e0aa08368f865a36793f50)**
9. **[เพิ่มข้อมูลนำเข้าสินค้า](https://github.com/chagy/laravel-pos/commit/36b8f1de1e72f4ed6cdec73465aba124ca330131)**
10. **[แก้ไขข้อมูลนำเข้าสินค้า](https://github.com/chagy/laravel-pos/commit/2abd96dc2347c3eb58ee3c04a6f20275dadf005a)**
11. **[บันทึกข้อมูลจำนวนสินค้า](https://github.com/chagy/laravel-pos/commit/951f33903a697c675a0a6b289468a944c53caf28)**
12. **[สร้างหน้านำเข้าด้วย Excel](https://github.com/chagy/laravel-pos/commit/a0aca1c15b934e94dc18e50f2aba0430e7e1b7be)**
13. **[นำเข้าข้อมูลด้วย Excel](https://github.com/chagy/laravel-pos/commit/432310463d9792eceaa5e818832801002bab4cd8)**

### Section 12 : Pos (จัดการขายสินค้า)

1. **[สร้างหน้าขายสินค้า](https://github.com/chagy/laravel-pos/commit/8cd1bc1b6bdeae6827efdc81d5c0371e1ae32875)**
2. **[สร้าง Box ค้นหาสินค้า](https://github.com/chagy/laravel-pos/commit/ded9d8ef651e3a9d6a1ea9cfa79f1b96ca1de2bd)**
3. **[สร้าง Box สินค้า](https://github.com/chagy/laravel-pos/commit/9df3e3dfc2e5819272c2fe66fe237677f38bd11a)**
4. **[สร้าง Box ตะกร้า](https://github.com/chagy/laravel-pos/commit/eb8fd3147c62a5081d1c6d6c9d2fb34902d42b3f)**
5. **[สร้าง Component สินค้า](https://github.com/chagy/laravel-pos/commit/18ebed3c889dd5249027c81536e7c123f63c51fb)**
6. **[ค้นหาสินค้า](https://github.com/chagy/laravel-pos/commit/e93f61e8f949e3656438c1d63749c0c965306bb4)**
7. **[สร้าง Component ตะกร้า](https://github.com/chagy/laravel-pos/commit/f28ea88a899d8aad90acb4dad99d7e05255f5162)**
8. **[เพิ่มสินค้าลงตะกร้า](https://github.com/chagy/laravel-pos/commit/b9ad6a12a87494715cc082c3ba687f1b65cac566)**
9. **[ยอดรวมสินค้าในตะกร้า](https://github.com/chagy/laravel-pos/commit/fcefe5154227e2d998dbf4e36b3bc4bb0548410e)**
10. **[ลบสินค้าในตะกร้า](https://github.com/chagy/laravel-pos/commit/f87a37441d3ea4be5e7c40fc1ef3218fe4720568)**
11. **[แก้ไขสินค้าในตะกร้า 1](https://github.com/chagy/laravel-pos/commit/829e523808b2f5e92d403a4ef87a89a72dd88439)**
12. **[แก้ไขสินค้าในตะกร้า 2](https://github.com/chagy/laravel-pos/commit/245fc3fed2837347cf996367a3c48973b065cc96)**
13. **[ส่วนลดพิเศษ](https://github.com/chagy/laravel-pos/commit/563f0b51159cf782017bd295d5650ee18253e4f0)**
14. **[ส่วนลดในรายการสินค้า](https://github.com/chagy/laravel-pos/commit/6a410a71edfbafdc80dec1d7ca50207d746d7301)**
15. **[เลือกลูกค้า 1](https://github.com/chagy/laravel-pos/commit/c87254d2adc2961ffd71db68b6f3b6b1d0e0cb7b)**
16. **[เลือกลูกค้า 2](https://github.com/chagy/laravel-pos/commit/310a0bd08de017d50ac884f22b1e898f9e1e0f7c)**
17. **[สร้าง Component คิดเงิน 1](https://github.com/chagy/laravel-pos/commit/1691ebb8ca58898d19eb5d58df6739af46368b83)**
18. **[สร้าง Component คิดเงิน 2](https://github.com/chagy/laravel-pos/commit/8c2af20f413643bc99fa9b857cb7a10d60845673)**
19. **[สร้าง Component คิดเงิน 3](https://github.com/chagy/laravel-pos/commit/a3265212ac5e73470476263ad9ac879d5847a0fb)**
20. **[สร้าง Component คิดเงิน 4](https://github.com/chagy/laravel-pos/commit/40a3ddd443a21a85fb1fc4c8f29454cf48b222d8)**
21. **[สร้าง Component คิดเงิน 5](https://github.com/chagy/laravel-pos/commit/40a3ddd443a21a85fb1fc4c8f29454cf48b222d8)**
22. **[สร้าง Component คิดเงิน 6](https://github.com/chagy/laravel-pos/commit/40a3ddd443a21a85fb1fc4c8f29454cf48b222d8)**
23. **[บันทึกข้อมูลการขาย](https://github.com/chagy/laravel-pos/commit/4df75bf193099cf890ab9ed7442825cd877c849c)**
24. **[แก้ไข Bug ข้อมูลการขาย](https://github.com/chagy/laravel-pos/commit/4c1c8cf5be84ec2198576dcdfcdd3c6b11d75227)**
25. **[สร้าง Component คิดเงิน 7](https://github.com/chagy/laravel-pos/commit/d2bfc277232aa4b662d854db6b1870f520ce9d35)**

### Section 13 : Setting (จัดการข้อมูลตั้งค่า)

1. **[สร้างหน้าตั้งค่า](https://github.com/chagy/laravel-pos/commit/be362b99c3038070c1637ee8b64fb95c50500df1)**
2. **[สร้างฟอร์มตั้งค่า](https://github.com/chagy/laravel-pos/commit/1ffb38d5c9c658b6449c6f5642429a041c6b03b5)**
3. **[Validation ตั้งค่า](https://github.com/chagy/laravel-pos/commit/580d7b5ae6ec985b6a3396e7763fa4d85ecd7345)**
4. **[บันทึกข้อมูลตั้งค่า](https://github.com/chagy/laravel-pos/commit/9fb2afeae52d06f8d684fe07cf265e9d2daff220)**

### Section 14 : Pos 2 (จัดการขายสินค้า 2)

1. **[สร้างป๊อบอัพพิมพ์ใบเสร็จ](https://github.com/chagy/laravel-pos/commit/95257da141afe0b8d015763d8a28adc4d6fa0687)**
2. **[แก้ไข Bug ป๊อบอัพพิมพ์ใบเสร็จ](https://github.com/chagy/laravel-pos/commit/fd88059d77ec6956314398980cdbf5e537a5683e)**
3. **[พิมพ์ใบเสร็จด้วย MPDF](https://github.com/chagy/laravel-pos/commit/d742552ec2dcffc07155325b0921a3751049e1a8)**
4. **[แก้ไข Bug พิมพ์ใบเสร็จด้วย MPDF](https://github.com/chagy/laravel-pos/commit/d742552ec2dcffc07155325b0921a3751049e1a8)**
5. **[สร้าง Header พิมพ์ใบเสร็จแบบ Slip](https://github.com/chagy/laravel-pos/commit/70ca7383a6ca9c453f37fe8f9fa734a1f90bd6a5)**
6. **[พิมพ์ใบเสร็จแบบ Slip](https://github.com/chagy/laravel-pos/commit/377e165df3b544bf7c1c3a2e3bac774bab337f86)**
7. **[พิมพ์ใบเสร็จแบบ A4 1](https://github.com/chagy/laravel-pos/commit/193ca4b0cea59471c811bbe56acc057c1ba419ab)**
8. **[พิมพ์ใบเสร็จแบบ A4 2](https://github.com/chagy/laravel-pos/commit/202d427d4e47be4bbeaf5686d90a0d15ad71ad62)**
9. **[พิมพ์ใบเสร็จแบบ A4 3](https://github.com/chagy/laravel-pos/commit/3def5660551f5153fc761e6d4ddce94d6ba497ae)**
10. **[พิมพ์ใบเสร็จแบบ A4 4](https://github.com/chagy/laravel-pos/commit/3def5660551f5153fc761e6d4ddce94d6ba497ae)**
11. **[พิมพ์ใบเสร็จแบบ A4 5](https://github.com/chagy/laravel-pos/commit/cf149cca0a85519277e065dc0325abe4bfe44b69)**


### Section 15 : Discount (จัดการส่วนสด)

1. **[สร้างรายการส่วนสด](https://github.com/chagy/laravel-pos/commit/f44e0e88d4e9c3c6ed5b3ef7656e676689ce6af2)**
2. **[แก้ไขส่วนสด](https://github.com/chagy/laravel-pos/commit/f4e5b48270a9f05fb017008a5fd165ab9fdbb453)**


### Section 16 : Promotion (จัดการโปรโมชั่น)

1. **[สร้างรายการโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/c55374d476eef2a37060854fcb5e9e9a47b3b266)**
2. **[สร้างฟอร์มโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/2272cdb52b8b0f3106fcf5ed1ce88075b2f47bfb)**
3. **[เลือกสินค้า 1](https://github.com/chagy/laravel-pos/commit/6d797a3112ed89925b316e2dc420aa828caaa31c)**
4. **[เลือกสินค้า 2](https://github.com/chagy/laravel-pos/commit/ce332d8bbd0966cffb7fb56928b5cc348e88a380)**
5. **[สร้างเงือนไขโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/3e61c5cce97cb668c01cf181fdfec62df760aebf)**
6. **[Validation ข้อมูลโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/95c762d3858654ec1aac46f61d1ecf4d27e97000)**
7. **[บันทึก ข้อมูลโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/0687b93253a41d09def2a46c6c1452f4be45b8b4)**
8. **[แก้ไข ข้อมูลโปรโมชั่น](https://github.com/chagy/laravel-pos/commit/19057129314d87ea328b2e39a8bf47c32068a412)**