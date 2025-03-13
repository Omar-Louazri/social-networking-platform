# Social Networking Website

## Description
A dynamic social networking platform that allows users to:
- Create accounts and manage profiles.
- Post updates, including text, images, and videos.
- Follow and interact with other users.
- Comment on posts and receive notifications.
- Manage privacy settings for shared content.

Built with **PHP & MySQL** for backend processing and database management.

## Features
- **User Authentication**: Secure login and registration system.
- **Profile Management**: Users can update their information and profile picture.
- **Post System**: Users can create, edit, and delete posts with media support.
- **Follow System**: Users can follow and interact with each other.
- **Comment System**: Engage with posts through comments.
- **Notifications**: Users receive updates about interactions. (followers system with notification / add mentions )
- **Privacy Settings**: Control visibility of personal data.

## Technologies Used
- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS, JavaScript, JQuery, Bootstrap
- **Database**: MySQL
- **Security**: Prepared statements to prevent SQL injection

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/Omar-Louazri/social-networking-platform
   ```
2. Navigate to the project folder:
   ```bash
   cd social-networking-platform # (open in IDLE aka VScode )
   ```
3. Import the database (`database.sql`) into MySQL.
4. Configure the database connection in `config.php`:
   ```php
   $db_host = 'localhost';
   $db_user = 'root';
   $db_pass = ''; // null
   $db_name = 'userform';
   ```
5. Start a local server:
   ```bash
   Go to XAMPP or WAMP server then start #(Both MYSQL PhpMyAdmin and APache )
   ```
6. Open `http://localhost/social-networking-platform` in your browser.

## Contributing
Contributions are welcome! Feel free to fork the repository and submit a pull request.

##VERSIONS :
```
--------------------------- PHP ----------------------------------------
PHP 7.3.4 (cli) (built: Apr  2 2019 21:57:22) ( NTS MSVC15 (Visual C++ 2017) x64 )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.4, Copyright (c) 1998-2018 Zend Technologies
----------------------------MYSQL---------------------------------------

Database server

    Server: MySQL (127.0.0.1 via TCP/IP)
    Server type: MySQL
    Server connection: SSL is not being used Documentation
    Server version: 9.1.0 - MySQL Community Server - GPL
    Protocol version: 10
    User: root@localhost
    Server charset: UTF-8 Unicode (utf8mb4)
 phpMyAdmin

    Version information: 5.2.1, latest stable version: 5.2.2

Web server

    Apache/2.4.62 (Win64) PHP/7.4.33 mod_fcgid/2.3.10-dev
    Database client version: libmysql - mysqlnd 7.4.33
    PHP extension: mysqli Documentation curl Documentation mbstring Documentation
    PHP version: 7.4.33



```


## License
This project is licensed under the MIT License.
## SCREENSHOTS 

  ```cmd
   Login Form : \Login
  ```
![image](https://github.com/user-attachments/assets/74f1605c-ac6e-4fb4-8373-812105e57ba6)

```cmd
Register Form: \SignUp
```
![image](https://github.com/user-attachments/assets/336ca4de-830d-45d3-9ee8-2cd14ced091f)

```cmd
Interface dashboard : \Home
```
![image](https://github.com/user-attachments/assets/f4c03f6f-ff85-480d-b9ea-8500ef50bc03)
![image](https://github.com/user-attachments/assets/088303a5-c1db-44b7-a156-9fba677c80de)

```cmd
Profile page : \@username
```
![image](https://github.com/user-attachments/assets/4ec5b987-7a99-4b4e-86f2-c48fa2efbaad)
![image](https://github.com/user-attachments/assets/cab54970-3a2b-4c5d-b0a1-69b7875ff0d6)

```cmd
Another user profile : @TheWarrior (example)
```
![image](https://github.com/user-attachments/assets/f1cb8b8f-0554-408e-8225-2f16df293786)
![image](https://github.com/user-attachments/assets/1eb430ee-351a-45d9-81c5-222173893f4d)
```cmd
Change password page : \Reset\User-Password.php
```
![image](https://github.com/user-attachments/assets/1b426c85-dc69-4dfe-9a8c-7a09e52a5910)
![image](https://github.com/user-attachments/assets/295fc31c-5ad7-44a2-b3f5-4f7dc4afe9c8)

```cmd
User OTP verification : \user-otp.php
```
![image](https://github.com/user-attachments/assets/b5411c85-e375-435b-a509-fb5a872b3b59)

```cmd
User Notification Menu :
```
![image](https://github.com/user-attachments/assets/d0395849-c3a2-49a7-a304-0f311d9c6baa)
