<?php
$siteTitle = '購入履歴';
require('head.php');
?>

  <body class="page-withdraw page-1colum">

    <style>
      .form .btn{
        float: none;
      }
      .form{
        text-align: center;
      }
    </style>

    <!-- メニュー -->
    <?php
    require('header.php');
    ?>

    <!-- メインコンテンツ -->
    <div class="wrap" style="height:800px;">
      <div id="contents" class="site-width">
        <!-- Main -->
        <section id="main" >
          <h1 class="page-title"style="margin-top:120px;">販売履歴</h1>
          <a href="mypage.php" style="color: rgba(128, 109, 90, 0.81);">&lt; マイページに戻る</a>
        </section>
      </div>
      <!-- footer -->
      <?php
      require('footer.php');
      ?>
    </div>
