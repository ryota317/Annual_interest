<?php
if(isset($_GET['money'])) {
   $money  = $_GET['money'];
   $rate  = $_GET['rate'];
   $year  = $_GET['year'];
   $rate = $rate / 100;

   for($i = 0; $i < $year; $i++){
    $interest = $money * $rate;
    $money = $interest + $money;
   }
}
if(isset($_GET['current'])) {
  $current  = $_GET['current'];
  $former  = $_GET['former'];

  $tmp = $former - $current;
  $result = $tmp / $former;
  $result = -($result * 100);
}


if(isset($_GET['monthly'])) {
  //月額
  $monthly  = $_GET['monthly'];
  //年率
  $annual_rate  = $_GET['annual-rate'];
  //年数
  $year_dividend  = $_GET['year-dividend'];
  //トータル運用額
  $total = 0;
  //毎月配当額計算
  $monthly_dividend =  ($annual_rate / 100) / 12;
  //運用月数取得
  $month = $year_dividend * 12;

  for($i = 0 ; $i < $month; $i++){
   
    $total = $total + $monthly;
    $total += $total * $monthly_dividend;
  }
    $month_income = $total *  ($annual_rate / 100)  / 12;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>年利計算</title>
  <style>
  body{
    font-size:30px;
  }
  fieldset{
    margin-top:80px;
  }
  </style>
</head>
<body>
<fieldset>
  <legend>年利計算</legend>
    <form action="index">
     金額:<input type="number" name="money"><br>
     年率:<input type="number" name="rate" step="0.1"><br>
     年数:<input type="number" name="year"><br>
     <input type="submit" value="送信">
    </form>
  <?php if(isset($money)){ echo $money ;} ?>
</fieldset>
<fieldset>
  <legend>変動パーセント</legend>
    <form action="index">
      現在価格:<input type="number" name="current"><br>
      元価格　:<input type="number" name="former"><br>
      <input type="submit" value="送信">
    </form>
  </fieldset>
  <?php if(isset($result)){ echo $result . '%' ;} ?>
  <fieldset>
  <legend>配当金計算</legend>
    <form action="index">
      月額:<input type="number" name="monthly"><br>
      年率:<input type="number"name="annual-rate"><br>
      年数:<input type="number" name="year-dividend"><br>
      <input type="submit" value="送信">
    </form>
    ※毎月配当で計算　配当金再投資
  </fieldset>
  <?php if(isset($total)){ echo 'トータル運用額>>>>　' . $total . '<br>';
    echo '毎月配当額>>>>　　　' . $month_income;
  } 
  ?>
</body>
</html>