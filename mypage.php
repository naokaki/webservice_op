<?php

require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　マイページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

//================================
// 画面処理
//================================
//ログイン認証
require('auth.php');
//DBからユーザーデータを取得
$dbFormData = getUser($_SESSION['user_id']);
$u_id = $_SESSION['user_id'];
$productData = getMyBuyProducts($u_id);
$reserveDay = getMyReserveDay();

function getMyReserveDay(){
  //例外処理
  try{
    $which = '予約済み';
    //DBへ接続
    $dbh = dbConnect();
    //sql文作成
    $sql = 'SELECT * FROM reserve WHERE which = :which';
    $data = array(':which' => $which);
    //クエリ実行
    $stmt = queryPost($dbh, $sql, $data);

    if($stmt){
      //クエリ結果のデータ
      return $stmt ->fetchAll();
    }else{
      return false;
    }

  }catch (Exception $e) {
    error_log('エラー発生:' . $e->getMessage());
  }
}
 ?>

<?php
$siteTitle = 'マイページ';
require('head.php');
 ?>


<body style="background: rgba(227, 236, 218, 0.32); width: 1297px;">
  <?php
  require('header.php');
   ?>
   <p id="js-show-msg" class="msg-slide">
     <?php echo getSessionFlash('msg_success'); ?>
   </p>
<div class="site-width">
<!-- メインコンテンツ980px -->
   <!-- サイドバー 190px-->
   <section id="sidebar">
     <!-- <a href="registProduct.php">商品を出品する</a> -->
     <!-- <a href="reserve_history.php">施設予約履歴</a> -->
     <!-- <a href="buy_history.php">購入履歴</a> -->
     <a href="profEdit.php">プロフィール編集</a>
     <a href="passEdit.php">パスワード変更</a>
     <a href="withdraw.php">退会</a>
   </section>
   <!-- メインコンテンツ -->
    <div id="contents" class="mypage">


      <!-- Main -->
      <section id="main" >
        <p class ="user">
          ユーザー: <?php echo $dbFormData['username'];?>
        </p>
        <div class="user-img">
          <img src="<?php echo showImg($dbFormData['pic']); ?>" alt="">
        </div>
        <h1 class="page-title">MYPAGE</h1>
        <p id="js-show-msg" style="display:none;" class="msg-slide">
          <?php echo getSessionFlash('msg_success'); ?>
        </p>
         <section class="list panel-list">
           <h2 class="title" style="margin-bottom:15px;">
            購入商品一覧
           </h2>
           <?php
             if(!empty($productData)):
              foreach($productData as $key => $val):
            ?>
              <a href="msg.php?m_id=<?php echo sanitize($val['id']); ?>" class="panel">
                <div class="panel-head">
                  <img src="<?php echo showImg(sanitize($val['pic1'])); ?>" alt="<?php echo sanitize($val['name']); ?>">
                </div>
                <div class="panel-body">
                  <p class="panel-title"><?php echo sanitize($val['name']); ?><br> <span class="price">¥<?php echo sanitize(number_format($val['price'])); ?></span></p>
                </div>
              </a>
            <?php
              endforeach;
             endif;
            ?>
        　</section>
        <div class='list'>
          <h2 class="title" style="margin-bottom:15px;">
           体育館予約履歴
          </h2>
          <?php
            if(!empty($reserveDay)):
             foreach($reserveDay as $key => $val):
           ?>
               <div class="panel-body">
                 <p class="panel-title" style="font-weight: bold;">
                   2月<?php echo sanitize($val['day']); ?>日
                   <?php echo sanitize($val['which']); ?>
                 </p>
               </div>
           <?php
             endforeach;
            endif;
           ?>
        </div>
        <!-- <section class="list list-table">
          <h2 class="title">
            連絡掲示板一覧
          </h2>
          <table class="table">
            <thead>
              <tr>
                <th>最新送信日時</th>
                <th>取引相手</th>
                <th>メッセージ</th>
              </tr>
            </thead>
            <tbody>
                         </tbody>
          </table>
        </section> -->

        <section class="list panel-list">
          <!-- <h2 class="title" style="margin-bottom:15px;">
            お気に入り一覧
          </h2> -->
                  </section>
      </section>


</div>
</div>
<!-- フッター -->

  <?php
  require('footer.php');
  ?>
  <style>
    .list{
      margin-bottom: 30px;
    }
 </style>
</body>
