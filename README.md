# TAILLER-CASE-SHOP
【English】
- This is the EC site of the original iPhone case

【日本語】
- これはオリジナルiPhoneケースのECサイトです

# Features
【English】
- You can check your product on the product list screen. In addition, you can easily register new products from the maintenance screen
- Buyers can add products to the cart and complete orders with simple operations
- Shop operators can easily record sales data (product name, sales channel, sales date, sales amount) from the sales list menu
- It ’s the best feature. You can display your sales data as an annual or monthly chart, which contributes to sales improvement

【日本語】
- 商品一覧画面で確認できます。また、メンテナンス画面から新商品を簡単に登録可能です。
- 購入者は簡単な操作のみでカートへの商品追加〜注文完了が可能です。
- 売上一覧メニューから、売上データ(商品名、販路、売上日、売上金額)を簡単に記録できます。
- 売上データを年間もしくは月間のチャートとして表示でき、売上向上に貢献します

# Requirement
- php 7.2.5
- Laravel Framework 7.20.0
- vue/cli 4.4.1
- laravel/cashier 12.3
- laravel/framework 7.0
- laravel/tinker 2.0
- laravel/ui 2.2
- bootstrap" 4.0.0
- fontawesome 5.13.0
- fortawesome/fontawesome-free 5.14.0

# Installation
```
git clone https://github.com/masayan1126/tailler-case-shop
```
```
cd tailler-case-shop
```
```
composer install
```
```
composer dump-autoload
```
```
cp .env.example .env
```
```
php artisan key:generate
```
The application can then be accessed at http://127.0.0.1:8000.

# Usage
【English】
- Sellers
  - First, log in
    - If you do not have an account, please register as a member
  - Various functions are available from the navigation menu
    - You can check the products on sale from the product list menu
    - From the sales list menu, you can register / edit / delete and
      browse the sales data so far.
    - You can view the monthly / yearly sales chart from the sales analysis menu
    - From the order details menu, you can view the purchase details from the buyer and manage the progress of shipping
    - You can manage your products and sales channels from the maintenance menu
- Buyers
  - First, log in
    - If you do not have an account, please register as a member
  - Only product purchase operations are possible

【日本語】
- 販売者
  - まず、ログインします
    - アカウントをお持ちでない場合は、会員登録してください
  - ナビゲーションメニューからさまざまな機能を使用できます
    - 商品一覧メニューから、販売中の商品が確認できます
    - 売上一覧メニューから、これまでの売上データの登録/編集/削除、閲覧ができます
    - 売上分析メニューから、月毎/年毎の売上チャートを表示することができます
    - 注文内容メニューから、購入者からの購入内容を表示し、発送の進捗を管理できます
    - メンテナンスメニューから、商品、販売経路の管理ができます
- 購入者
  - まず、ログインします
    - アカウントをお持ちでない場合は、会員登録してください
  - 商品の購入操作のみ可能です

- Demo user
  - name:matsushin
  - mail:matsushin@gmail.com
  - password:matsushin1126

# Author
- name
  - @masayan1126
- email
  - masa199311266@gmail.com