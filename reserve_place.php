<?php

//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　退会ページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

//ログイン認証
require('auth.php');
$dbFormData_user = getUser($_SESSION['user_id']);
?>
<?php
$siteTitle = '施設予約';
require('head.php');
?>

  <body>



    <!-- メニュー -->
    <?php
    require('header.php');
    ?>

    <!-- メインコンテンツ -->
    <div class="wrap" style="height:870px;">
      <div id="contents" class="site-width-gym">
        <!-- Main -->
        <section id="main" >
          <div class="user_info" style="margin-top: 100px;">
            <p class ="user">
              ユーザー: <?php echo $dbFormData_user['username'];?>
            </p>
            <div class="user-img">
              <img src="<?php echo showImg($dbFormData_user['pic']); ?>" alt="">
            </div>
          </div>
          <h1 class="page-title"style="margin-top:120px;">予約施設一覧</h1>
          <ul>
            <a href="carender.php?place=西体育館"><li class="gym">西体育館</li></a>
            <a href="carender.php?place=東体育館"><li class="gym">東体育館</li></a>
            <a href="carender.php?place=南体育館"><li class="gym">南体育館</li></a>
            <a href="carender.php?place=北体育館"><li class="gym">北体育館</li></a>
          </ul>
          <!-- <img src="img/court.jpg" alt="aa" class="court"> -->
          <a href="mypage.php" style="color: rgba(128, 109, 90, 0.81);">&lt; マイページに戻る</a>
        </section>
      </div>
      <!-- footer -->
      <?php
      require('footer.php');
      ?>
    </div>
    <!-- <style>
      .court{
        height: 440px;
        width: 800px;
        position: absolute;
        top: 210px;
        z-index: 2;
      }
      .gym{
        z-index: 5;
        position: relative;
      }
    </style> -->
