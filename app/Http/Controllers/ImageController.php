<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Storage;
use App\Product;

class ImageController extends Controller
{
    public function getImageInput(){
      return view('image_input');
    }
    
    public function postImageConfirm(Request $request){
      $product = new Product();
      $form = $request->all();
      //$post_dataにinputの値だけをいれる
      $imagefile = $request->file('imagefile');
      $path = Storage::disk('s3')->putFile('products', $imagefile, 'public');
      $product->path = Storage::disk('s3')->url($path);
      $product->product_name = $request->product_name;
      $product->save();


      // $post_data = $request->except('imagefile');
      // $product_name = $post_data['product_name']; 
      //アップロードファイルの保存   
      // $temp_path = $imagefile->store('public/temp');
      //public/temp → storage/tempへ変更
      // $read_temp_path = str_replace('public/', 'storage/', $temp_path);
      
      // $data = array(
      //   public/tempに保存したファイル
      //   'temp_path' => $temp_path,
      //   storage/tempのファイルパス
      //   'read_temp_path' => $read_temp_path,
      //   'product_name' => $product_name,
      //   'image_file' => $imagefile,
      // );
      // $request->session()->put('data', $data);
      //compactでviewにdataを渡す
      // $path = Storage::disk('s3');
      // return view('image_confirm', compact('path') );
    }

    public function postImageComplete(Request $request) {
      $product = new Product();
      $data = $request->session()->get('data');
      //public/tempに保存したファイル
      $temp_path = $data['temp_path'];
      //storage/tempのファイルパス
      $read_temp_path = $data['read_temp_path'];
    
      //ファイル名は$temp_pathから"public/temp/"を除いたもの
      $filename = str_replace('public/temp/', '', $temp_path);
      //画像を保存するパスは"public/productimage/xxx.jpeg"
      $storage_path = 'public/productimage/'.$filename;
      $request->session()->forget('data');

        Storage::move($temp_path, $storage_path);
        //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動

        $read_path = str_replace('public/', 'storage/', $storage_path);
        //商品一覧画面から画像を読み込むときのパスはstorage/productimage/xxx.jpeg"
        $product_name = $data['product_name'];

        $product->path = $read_path;
        $product->product_name = $product_name;
        // $this->productcontroller->path = $read_path;
        // $this->productcontroller->product_name = $product_name;
        $product->save();
        // return view('image_input');
        return view('image_input');
    }

    public function addProductComplete(){
      return view('image_input');
    }
}
