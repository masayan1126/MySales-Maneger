<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Product;
use App\Sale;
use App\Channel;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showProduct(){
        $view = view('product');
        
        $all_product = Product::all();
        $view->all_products = $all_product;
        return $view;
      }
    
      public function showProductList(){
        $view = view('maintenance');
        $all_product = Product::get();
        $all_channel = Channel::get();
        $view->all_products = $all_product;
        $view->all_channel = $all_channel;
        return $view;
      }
    
        public function allocateMaintenanceProductView(Request $request){
          $all_product = Product::get();
          $all_channel = Channel::get();
          if ($request->operation === 'add') {
            $view = view('product_input');
          } else if($request->operation === 'update') {
            // dd($request->check);
            if (!$request->check) {
              return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
            } else if(count($request->check) >= 2 ){
              return redirect('maintenance')->with('alert', '1度に編集できるのは1つのデータだけです');
            } else {
              // 商品の編集
              $view = view('product_edit');
              $target_product = Product::where('product_id', '=' , $request->check)->first();
              $target_product_path = $target_product->path;
              $view->product_id = $target_product->product_id;
              $view->product_name = $target_product->product_name;
              $view->now_preview_image_path = $target_product_path;
              // $view->imagefile = $target_product_path;
              // $imagefile = $request->file('imagefile');
              // $path = Storage::disk('s3')->putFile('products', $imagefile, 'public');
              // $product->path = Storage::disk('s3')->url($path);
              // $product->product_name = $request->product_name;
              // $product->save();
              // $all_sales = Sale::where('id', '=' , $request->check)->first();
              // dd($all_sales);
              // $view->product_numbers = $all_sales->product_number;
              // $view->product_id = $all_sales->id;
              // $view->sales_date = $all_sales->sales_date;
              // $string = $all_sales->sales_date;
              // $pattern= '/\d{3}-\d{4}/';
              // list($yyyy, $mm, $dd) = explode('/', $string);
              // $view->sales_year = $yyyy;
              // $view->sales_month = $mm;
              // $view->sales_day = $dd;
              // $view->sales_amount = $all_sales->sales_amount;
              // $target_channel = $all_sales->sales_channel;
              // $else_channel = Channel::where('sales_channel', '!=' , $target_channel)->get();
              // $view->target_channel = $target_channel;
              // $view->else_channels = $else_channel;
            }
          } else if ($request->operation === 'delete') {
            if (!$request->check) {
              return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
            } else {
              $view = view('complete');
              for ($i = 0; $i < count($request->check); $i++) {
                $delete_sales = Product::where('product_id', '=' , $request->check[$i])
                ->delete();
              }
            }
          }
          return $view;
        }
    
        public function inputProductConfirm(Request $request){
          $product = new Product();
          $imagefile = $request->file('imagefile');
          // $pathの中身は"products/ファイル名.jpeg"　等
          $path = Storage::disk('s3')->putFile('products', $imagefile, 'public');
          // $product->pathの中身は上記$pathの画像ファイル名含めたs3のURL
          $product->path = Storage::disk('s3')->url($path);
          $product->product_name = $request->product_name;
          $product->price = $request->price;
          $product->stock_quantity = $request->stock_quantity;
          $product->save();
          $view = view('complete');
          return $view;
        }
    
        // 完了画面で続けて入力するのボタンのためのコード
        public function inputProduct(){
          $view = view('product_input');
          return $view;
        }
    
        public function updateProduct(Request $request){
          $product = Product::where('product_id', '=' , $request->check)->first();
          $new_imagefile = $request->file('new-imagefile');
          $new_path = Storage::disk('s3')->putFile('products', $new_imagefile, 'public');
          $new_product_path = Storage::disk('s3')->url($new_path);
          $product->path = $new_product_path;
          $product->product_name = $request->product_name;
          $product->save();
          $view = view('maintenance');
          $all_product = Product::get();
          $all_channel = Channel::get();
          $view->all_products = $all_product;
          $view->all_channel = $all_channel;
          return $view;
        }
    
        public function deleteProduct(Request $request){
          $all_sales = Sale::where('id', '=' , $request->check)
          ->delete();
          $view = view('index');
          $all_sales = DB::table('sales')->get();
          $view->all_sales = $all_sales;
          return $view;
        }
    
        // public function postImageComplete(Request $request) {
        //   $product = new Product();
        //   $data = $request->session()->get('data');
        //   //public/tempに保存したファイル
        //   $temp_path = $data['temp_path'];
        //   //storage/tempのファイルパス
        //   $read_temp_path = $data['read_temp_path'];
        
        //   //ファイル名は$temp_pathから"public/temp/"を除いたもの
        //   $filename = str_replace('public/temp/', '', $temp_path);
        //   //画像を保存するパスは"public/productimage/xxx.jpeg"
        //   $storage_path = 'public/productimage/'.$filename;
        //   $request->session()->forget('data');
    
        //     Storage::move($temp_path, $storage_path);
        //     //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
    
        //     $read_path = str_replace('public/', 'storage/', $storage_path);
        //     //商品一覧画面から画像を読み込むときのパスはstorage/productimage/xxx.jpeg"
        //     $product_name = $data['product_name'];
    
        //     $product->path = $read_path;
        //     $product->product_name = $product_name;
        //     // $this->productcontroller->path = $read_path;
        //     // $this->productcontroller->product_name = $product_name;
        //     $product->save();
        //     // return view('image_input');
        //     return view('image_input');
        // }
    
        // public function addProductComplete(){
        //   return view('image_input');
        // }
}
