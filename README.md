# Simple E-Commerce with bKash Payment Gateway

## Project Overview
A simple e-commerce web application built with Laravel to demonstrate bKash Payment Gateway Integration.  
Customers can place orders and complete payments using bKash, while the admin panel manages products, orders, deliveries, and refunds.

The main purpose of this project is to learn and implement bKash payment integration in a real-world e-commerce workflow using Laravel.

## Application Overview
### Front-End (Public Website)
- Homepage displays multiple products.
- Each product has an Order Now button.
- Clicking Order Now opens an order form.
- Customers must provide necessary order information.
- After clicking Confirm Order, the user is redirected to the bKash payment page.
- Customers complete payment using bKash number, OTP, and PIN.
- After successful payment, the order is confirmed.

### Back-End (Admin Panel)
After logging in, the admin is redirected to the Dashboard.

#### Dashboard
Displays important statistics:
- Total Products
- Total Orders
- Total Deliveries
- Total Refunds
- Latest 5 Orders

#### Product Management
##### Product List Page
- Products displayed in a table
- Pagination (10 products per page)
- Available actions:
  - View
  - Edit
  - Delete

##### Add Product Page
- Product creation form
- Validation handled using Laravel Form Request

#### Order Management
##### Order List Page
- Orders displayed in a table
- Pagination (10 orders per page)
- Orders can be viewed in detail
- Mark as Delivered button available

Clicking Mark as Delivered indicates that the product has been delivered successfully.

#### Order Details
Inside the order view page:
- Full order information
- Send Payment Refund button available

Clicking this button opens a form where the admin must provide a refund reason.
After submission:
- The order is cancelled
- The payment is refunded via bKash

#### Delivery List
- Displays delivered products
- Pagination (10 items per page)
- Orders can be viewed in detail

#### Refund List
- Displays refunded orders
- Pagination (10 items per page)
- Refund details can be viewed

## Technologies Used
- HTML
- CSS
- Bootstrap 5
- PHP
- Laravel
- MySQL
- bKash Payment Gateway API

## Installation Guide
Follow these 7 steps to install and set up the project:

### Step 1
#### Clone the Repository
```
git clone https://github.com/Amit-Singha-BD/Simple-E-Commerce-with-bKash-Payment-Gateway.git
cd Simple-E-Commerce-with-bKash-Payment-Gateway
```

### Step 2
#### Install Dependencies
```
composer install
```

### Step 3
#### Setup Environment File
```
cp .env.example .env
```

### Step 4
#### Generate Application Key
```
php artisan key:generate
```

### Step 5
#### Run Migrations
```
php artisan migrate
```

### Step 6
#### Run Seeder
```
php artisan db:seed
```

### Step 7
#### Start the Development Server
```
php artisan serve
```

Then open:
```
http://127.0.0.1:8000
```

## bKash Configuration
To enable the bKash payment gateway, you need to configure your bKash API credentials inside the `BkashController`.

### Step 1
#### Open the Controller File
```
app/Http/Controllers/BkashController.php
```

### Step 2
#### Set Your bKash Credentials
Update the following values inside the controller:
- bKash API Base URL
- App Key
- App Secret
- Username
- Password

### Required bKash Credentials
You must obtain the following credentials from the bKash Merchant Portal:
- bKash API Base URL
- App Key
- App Secret
- Username
- Password

### Important
- For development and testing, use the Sandbox API provided by bKash.  
- For production, use the Live API credentials from your merchant account.

## Learning Objectives
Through this project I practiced:
- bKash payment gateway integration
- Laravel CRUD operations
- Laravel Form Request Validation
- Pagination
- Order management system
- Refund workflow
- Admin dashboard statistics

## Author
- Amit Singha 
- Backend Developer

