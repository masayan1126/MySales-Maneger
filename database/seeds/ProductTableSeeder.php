<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/iuBdYOGnlNr62qjXJslqskU7fzzQTlYaYk560XQj.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/jqouc1DSWn4VaXzZuLfNU4hCa1DwMK4udO0rwrpJ.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-B)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/KFrCfMkK0oeGUHPlOjP6htsHR0Cic3x34UTaeP4p.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-C)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/R7rfTZZB5uM6SDGvlpxx89KQyzvDCXFk0VfbMHcw.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-D)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/qfFwt5FKlyuvlKbpIEXZQkussEkB7CR9jZBIkkN4.png',
              'product_name' => 'アニマル柄iPhoneケース(Type-E)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/RAl1vo0pwqu7PEmqhlGhjLMYBzWUJq2YMVlFbZYA.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-F)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/SiAnsaFaPDdJ4iGYwcX6ESQCjNK7ry2owHw8J3dx.jpeg',
              'product_name' => 'アニマル柄iPhoneケース(Type-G)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/9i2OTJEJvN0AcHxtYyXZ5aLmUHniafcKBKr66FU1.png',
              'product_name' => 'アニマル柄iPhoneケース(Type-H)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/r86cXEwKCTuRQJU8ozf9lWpknUzuoUEQGBKpCiVJ.jpeg',
              'product_name' => '花柄iPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/lv2FtR0Ta7idRrddXlUhC3idtRMsFQcvCQELmiu8.jpeg',
              'product_name' => '花柄iPhoneケース(Type-B)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/4cYoJIf8iX8qKwkvmeAHY4biAIEoXTPtE8pNxXs8.jpeg',
              'product_name' => '花柄iPhoneケース(Type-C)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/2WuPmNERnDSyyoTh7mUUlgZIsbSc9Wno39yzTCDx.jpeg',
              'product_name' => '花柄iPhoneケース(Type-D)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/H6ZBMDD1mzWktU4ZMJ6FjWKMXR3M3e1CszHLPmCS.jpeg',
              'product_name' => '花柄iPhoneケース(Type-E)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/3Aoqe4pJQqPIGZ6PU3IKlbXPWA24j6rShwtOJEMB.jpeg',
              'product_name' => '花柄iPhoneケース(Type-F)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/o951fEStj7vTQgulo5G6FIAmb8cu039kzG4ZICSx.jpeg',
              'product_name' => '花柄iPhoneケース(Type-G)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/RoktC1BP3CxhjFmJpjcpeuRTjT6dMYksDXZEMcwk.jpeg',
              'product_name' => '花柄iPhoneケース(Type-H)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/ga4kgtfva1SeMTt2OS4H1Nuo2y1uCI2OAHzR22z5.jpeg',
              'product_name' => '水玉柄iPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 2480,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/6hxWwKPZKoMBESoSMCOZRB57PMVrqPdNT7Scldyg.jpeg',
              'product_name' => '各種イラストiPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/mOP9QkhzQdvMh5OAKimKiWvET4DdULUfrWeIHjrI.jpeg',
              'product_name' => 'ニコちゃん柄iPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
            [
              'path' => 'https://myproduct-images-bucket.s3.ap-northeast-1.amazonaws.com/products/DYropNcZzcBjtsYREdtj84j7RFpZELMeH6U6dtfX.jpeg',
              'product_name' => 'ハート柄iPhoneケース(Type-A)',
              'stock_quantity' => 5,
              'price' => 1980,
            ],
          ]);
    }
}
