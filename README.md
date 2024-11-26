# E-Commerce Website

This is a fully functional e-commerce website built using **Laravel 10**. The project includes user authentication, product listings, shopping cart, order management, and an admin panel for managing products, categories, and orders.

## Features

- User Authentication (Registration, Login, Password Reset)
- Product Listings (Filter by Category, Search, Pagination)
- Shopping Cart (Add to Cart, Remove from Cart, Cart Summary)
- Checkout Process (Billing, Shipping, Payment Integration)
- Order Management (Order History, Order Status)
- Admin Panel (Manage Products, Categories, Orders, Users)
- Responsive Design for all devices
- Secure and scalable architecture

## Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Blade Templates, Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Payment Integration**: PayPal (customize as needed)

## Installation

Follow the steps below to set up the project on your local machine:

### 1. Clone the repository
```bash
[git clone https://github.com/your-username/ecommerce-laravel.git](https://github.com/Jabweli/laravel-ecomm-app.git)
cd ecommerce-laravel
```

### 2. Install dependencies
```bash
composer install
npm install
```

### 3. Set up environment variables
- Copy the `.env.example` file to `.env`
```bash
cp .env.example .env
```
- Update your `.env` file with the correct database credentials and other configuration settings:
```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
- The MySQL database file is included (named ecomm_db.sql), import the tables it to your database:
  
### 4. Generate application key
```bash
php artisan key:generate
```

### 5. Compile assets
```bash
npm run dev
```

### 6. Run the application
```bash
php artisan serve
```

The site should now be accessible at `http://localhost:8000`.

## Admin Panel

- **URL**: `/admin`
- **Default Admin Credentials**:
  - Email: `admin@example.com`
  - Password: `admin123`

## Contributing

Contributions are welcome! Please follow the standard Git workflow:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add YourFeature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Open a pull request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions or need further assistance, feel free to reach out:

- **Email**: [stanlaus645@gmail.com](mailto:stanlaus645@gmail.com)
- **GitHub**: [https://github.com/Jabweli](https://github.com/Jabweli)


