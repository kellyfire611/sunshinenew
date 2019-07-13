# [https://nentang.vn](https://nentang.vn)
[![./docs/assets/shared/img/logo-nentang.jpg](./docs/assets/shared/img/logo-nentang.jpg)](./docs/assets/shared/img/logo-nentang.jpg)
- Các bài học miễn phí về Lập trình
- Học web PHP - Learning PHP - Laravel
- Xem nhiều hơn tại [https://nentang.vn](https://nentang.vn)

# Các chương trình cần thiết để lập trình web
- [Git for window](https://git-scm.com/download/win)
- XAMPP với PHP 7+, MySQL 5.6+ - [XAMPP](https://www.apachefriends.org/download.html)
- Composer - trình quản lý các gói package PHP - [Composer](https://getcomposer.org/download/)
- HeidiSQL - quản lý thực thi câu truy vấn SQL - [HeidiSQL](https://www.heidisql.com/download.php)
- Visual Studio Code IDE - trình gõ code - [Visual Studio Code](https://code.visualstudio.com/)
- TortoiseGIT - [TortoiseGIT](https://tortoisegit.org/download/)

# Cách clone source các bài học
## Step 1: clone source về máy
- Các bạn có thể clone source đặt bất cứ đâu trong máy các bạn. Tuy nhiên, muốn chạy được ở nơi khác ngoài `htdocs` thì các bạn phải cấu hình `virtual host` đối với `XAMPP hay WAMPP` nhé.
- Để đơn giản, các bạn nên clone source về thư mục `htdocs`
- Chạy câu lệnh
```
git clone https://github.com/kellyfire611/sunshinenew.git
```

## Step 2: install các thư viện (package) cần thiết thông qua `composer`
- Trỏ đường dẫn vào thư mục `/sunshinenew`, chạy câu lệnh sau để cài đặt
```
cd /sunshinenew
composer install
```

## Step 3: thử nghiệm
### Chạy với server tạm của Laravel
- Trong source Laravel có tích hợp sẵn Server nhỏ dùng để chạy trực tiếp (không cần Apache/NginX). Chạy câu lệnh sau để start server:
```
php artisan serve
```
- Truy cập đường dẫn mặc định để xem: [http://localhost:8000](http://localhost:8000)

### Chạy với server Apache XAMP/WAMP
- Start service Apache của XAMPP hay WAMPP
- Chạy đường dẫn sau để kiểm tra: [http://localhost/sunshinenew/public/](http://localhost/sunshinenew/public/)