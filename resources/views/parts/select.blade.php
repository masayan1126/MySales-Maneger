<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>salse</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div id="select">
<div class="form-group">
    <label for="product-number-Selection">商品番号</label>
    <select name="productNumber" class="form-control" id="product-number-Selection">
      <option>【C001】</option>
      <option>【C002】</option>
      <option>【C003】</option>
      <option>【C004】</option>
      <option>【C005】</option>
      <option>【C006】</option>
    </select>
  </div>
  <div class="form-group">
    <label for="product-color-selection">商品カラー</label>
    <select name="productColor" class="form-control" id="product-color-selection">
    　　<option value="ブラック">ブラック</option>
        <option value="コーヒーブラウン">コーヒーブラウン</option>
        <option value="アマゾンブルー">アマゾンブルー</option>
        <option value="コロラドグリーン">コロラドグリーン</option>
        <option　value="ルビーレッド">ルビーレッド</option>
        <option value="サンフラワー(オレンジ)">サンフラワー(オレンジ)</option>
        <option value="パンジー(パープル)">パンジー(パープル)</option>
        <option value="ゴールド">ゴールド</option>
    </select>
  </div>
  <div class="form-group col-4 p-0">
    <label for="exhibition-timezone">出品時間区分<span class="text-danger ml-2">※メルカリ利用時のみ必須</span></label>
    <select name="exhibitionTimeZone" class="form-control" id="exhibition-timezone">
      <option>朝(6:00〜10:00)</option>
      <option>昼(10:00〜14:00)</option>
      <option>夕方(14:00〜17:00)</option>
      <option>夜(17:00〜21:00)</option>
    </select>
  </div>
</div>
<script>
</script>
</body>