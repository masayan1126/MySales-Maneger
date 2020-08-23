<?php 
  // SDKを利用するためComposerのautoload.phpを読み込み
  require 'vendor/autoload.php';

  $raku_app_id = '1047276474844270394'; // アプリIDを指定
  $raku_aff_id = '1b8c23f0.f3948670.1b8c23f1.edb6a3f1'; // アフィリエイトIDを指定
  $keyword = 'iphoneケース　無地'; // キーワードを指定
  $hits = '30'; // 商品データの取得数を指定

  // RakutenRws_Clientクラスのインスタンスを作成
  $client = new RakutenRws_Client();
  $client->setApplicationId($raku_app_id);
  $client->setAffiliateId($raku_aff_id);
  $response = $client->execute(
      'IchibaItemSearch',
      array(
          'hits' => $hits,
          'keyword' => $keyword,
      )
  );

  // レスポンスが正常かを確認
  if ($response->isOk()) {
      foreach ($response as $item) {
          // 商品のタイトル・画像・価格・アフィリエイトリンクを取得
          $title = $item['itemName'];
          $price = $item['itemPrice'];
          $link = $item["affiliateUrl"];
          $image = $item["mediumImageUrls"][0]["imageUrl"];
          
          // // 商品情報を出力する際のHTML
          echo '<div><a href="' . esc_url( $link ) . '" target="_blank" rel="nofollow">';
          echo '<h3>' . esc_html( $title ) . '</h3>';
          echo '<img src="' . $image . '" alt="' . esc_attr( $title ) . '">';
          echo '<p>【価格】' . esc_html( $price )  . '円</p>';
          echo '</a></div>';
      }
  } else {
      // レスポンスがエラーの場合。getMessage() でレスポンスメッセージを取得
      echo 'Error:'.$response->getMessage();
  }
  ?>