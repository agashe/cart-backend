# Cart Backend

Create an invoice for a list of products. This app was built with [Lumen](https://lumen.laravel.com/docs/8.x/installation) .

## install

clone the repository , then run the following commands in your terminal:

```bash
cp .env.example .env
composer install
```

then set your host credintials in the .env , after that you are ready to run the migrations and seeds:

```bash
php artisan migrate --seed
```

done , now run the app:

```bash
php -S localhost:8000 -t public
```

## Usage

We have one API route. we pass an array of products to it , then recieve an invoice.

For example using cURL :

```bash
curl -d products[]=shoes -d products[]=pants http://localhost:8000/cart/create
```

will return:

```json
{
    "subtotal":"$136.981",
    "shipping":"$47.7",
    "vat":"$20.2972",
    "discount":[
        "10% off shoes: -$7.999",
        "10% off shipping: -$5.3"
    ],
    "total":"$204.9782"
}
```









