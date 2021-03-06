<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Product;
use App\Sale;
use App\Channel;
use Session;
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
      }
    } else if ($request->operation === 'delete') {
      if (!$request->check) {
        return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
      } else {
        $action = '/maintenance';
        $view = view('complete',compact('action'));
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
    $action = '/maintenance';
    $view = view('complete',compact('action'));
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
}
