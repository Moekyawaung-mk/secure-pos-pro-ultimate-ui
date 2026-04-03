```sql
CREATE DATABASE secure_pos_ui;
USE secure_pos_ui;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL UNIQUE,
    name_en VARCHAR(255) NOT NULL,
    name_mm VARCHAR(255) NOT NULL,
    category_en VARCHAR(255) NOT NULL,
    category_mm VARCHAR(255) NOT NULL,
    price DECIMAL(12,2) NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(100),
    company VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(100) NOT NULL UNIQUE,
    customer_name VARCHAR(255),
    customer_phone VARCHAR(100),
    subtotal DECIMAL(12,2) NOT NULL DEFAULT 0,
    discount DECIMAL(12,2) NOT NULL DEFAULT 0,
    tax DECIMAL(12,2) NOT NULL DEFAULT 0,
    grand_total DECIMAL(12,2) NOT NULL DEFAULT 0,
    cash_received DECIMAL(12,2) NOT NULL DEFAULT 0,
    change_amount DECIMAL(12,2) NOT NULL DEFAULT 0,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE sale_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(12,2) NOT NULL DEFAULT 0,
    qty INT NOT NULL DEFAULT 0,
    line_total DECIMAL(12,2) NOT NULL DEFAULT 0,
    FOREIGN KEY (sale_id) REFERENCES sales(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO users (username, password) VALUES
('admin', '$2y$10$wHq9A0x7qfA0m8Q4M0yQvOa2mQvTz6v2m2J1jQm8xQ3J8c7N1zv3W');

INSERT INTO products (code, name_en, name_mm, category_en, category_mm, price, stock) VALUES
('P001', 'Coffee Mix', 'ကော်ဖီမစ်', 'Drink', 'အဖျော်ယမကာ', 1200, 20),
('P002', 'Shampoo', 'ခေါင်းလျှော်ရည်', 'Care', 'ကိုယ်ပိုင်အသုံးအဆောင်', 3500, 15),
('P003', 'Soft Drink', 'အအေးသောက်ရည်', 'Drink', 'အဖျော်ယမကာ', 1800, 30);

INSERT INTO customers (name, phone, address) VALUES
('Aung Aung', '09123456789', 'Yangon'),
('Su Su', '09987654321', 'Mandalay');

INSERT INTO suppliers (name, phone, company) VALUES
('Ko Min', '09444444444', 'ABC Supply'),
('Ma Hnin', '09555555555', 'Best Trade');
```
