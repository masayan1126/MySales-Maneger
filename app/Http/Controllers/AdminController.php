<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;
use App\User;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
  public function index(Request $request){
    $all_products = Product::get();
    $all_channel = Channel::get();
    $view = view('maintenance');
    $view->all_channel = $all_channel;
    $view->all_products = $all_product;
    return $view;
  }
}
