# Bloging_Posts


A blogging platform built with PHP, MySQL, and XAMPP.

## 🔑 Features

- User Registration & Login
- Create Posts with Title, Paragraph, and Image
- Like & Comment System
- Responsive Layout



## 🛠️ Setup Instructions

1. Import `post_db.sql` into your MySQL (port 3307)
2. Update `includes/config.php` with your database credentials:
   ```php
   $host = '127.0.0.1';
   $user = 'root';
   $password = '';
   $database = 'post_db';
   $port = 3307;
