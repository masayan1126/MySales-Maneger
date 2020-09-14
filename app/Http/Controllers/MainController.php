<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //
    public function entrance(){
        $view = view('auth.login');
        return $view;
      }

      // 完了画面で続けて入力するのボタンのためのコード
      public function inputChannel(Request $request){
        $all_products = Product::get();
        $all_channel = Channel::get();
        $view = view('maintenance');
        $view->all_channel = $all_channel;
        $view->all_products = $all_product;
        return $view;
      }

      public function store(Request $request){
        $channel = new Channel();
        $channel->sales_channel = $request->salesChannel;
        $channel->channel_url = $request->channel_url;
        $channel->save();
        $view = view('complete');
        return $view;
      }

    public function allocateMaintenanceChannel(Request $request){
      $all_sales = Sale::get();
      $all_product = Product::get();
      $all_channel = Channel::get();
      if ($request->operation === 'add') {
        $view = view('channel_input');
      } else if($request->operation === 'update') {
        if (!$request->check) {
          return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
        } else if(count($request->check) >= 2 ){
          return redirect('maintenance')->with('alert', '1度に編集できるのは1つのデータだけです');
        } else {
          // dd($request->check);
          $view = view('channel_edit');
          $target_channel = Channel::where('id', '=' , $request->check)->first();
          $view->sales_channel = $target_channel->sales_channel;
          $view->channel_url = $target_channel->channel_url;
          $view->id = $target_channel->id;
          // 以降はchannel_edit.blade.php -> form送信 -> updateChannel -> complete.blade.php
        }
      } else if ($request->operation === 'delete') {
        if (!$request->check) {
          return redirect('maintenance')->with('alert', '最低1つのデータを選択してください');
        } else {
          $view = view('complete');
          for ($i = 0; $i < count($request->check); $i++) {
            $delete_sales = Channel::where('id', '=' , $request->check[$i])
            ->delete();
          }
        }
      }
      return $view;
    }

    public function updateChannel(Request $request){
      $target_channel = Channel::where('id', '=' , $request->check)->first();
      $target_channel->sales_channel = $request->salesChannel;
      $target_channel->channel_url = $request->channel_url;
      $target_channel->save();
      $view = view('complete');
      return $view;
    }

    // 作成予定(完了画面は全てview('complete')へ遷移させ、vueコンポーネントで動的に文言を表示させる)
    public function complete(Request $request){
      $view = view('complete');
      return $view;
    }
}
