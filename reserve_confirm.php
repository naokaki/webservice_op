<?php
require('function.php');
require('auth.php');
debugLogStart();
 ?>
 <?php
 $siteTitle = '施設予約';
 require('head.php');
 $dbFormData = getUser($_SESSION['user_id']);
 ?>
<?php
require('header.php');
?>
<div class="wrap" style="height: 750px;">
  <div style="margin-top: 100px;">
    <p class ="user" style="margin-right: 300px;">
      ユーザー: <?php echo $dbFormData['username'];?>
    </p>
    <div class="user-img">
      <img src="<?php echo showImg($dbFormData['pic']); ?>" alt="">
    </div>
  </div>
    <div class="confirm-form">
      <h1 class="title">
        予約確認
      </h1>
      <div class="reserve_content">
        <div>場所:<?php  echo $_GET['place'];?></div>
        <div>日にち:2月<?php echo $_GET['day']; ?>日</div>
        <div class="">
          間違いがなければ「予約する」ボタンを<br>押してください
        </div>
        <a href="mypage.php" class="reserve_veirfy">
          予約する
          <?php
          try{
            $day = $_GET['day'];
            debug('予約日：'.print_r($day, true));
            //DBへ接続
            $dbh = dbConnect();
            //SQL文作成
            $sql = 'UPDATE reserve SET which = :which WHERE day = :day';
            $data = array(':which' => '予約済み', ':day' => $day);
            //クエリ実行
            $stmt = queryPost($dbh, $sql, $data);
            debug('$stmt:'.print_r($stmt, true));
            if($stmt){
              $_SESSION['msg_success'] = SUC06;
            }
          }catch(Exception $e){
            error_log('エラー発生:'.$e->getMessage());
            $err_msg['common'] = MSG07;
          }
          ?>
        </a>
      </div>
  </div>
  <a href="mypage.php" style="color: rgba(128, 109, 90, 0.81);">&lt; マイページに戻る</a>
  <!-- footer -->
  <?php
  require('footer.php');
  ?>
</div>
<style>
.title{
  text-align: center;
}
  .confirm-form{
    height: 350px;
    width: 400px;
    margin: 0 auto;
    margin-top: 200px;
    padding: 20px;
    border: 5px solid #f1f1f1;
    text-align: center;
    background: white;
  }
  .reserve_content{
    font-size: 20px;
    line-height: 40px;
    /* font-weight: bolder; */
  }
  .reserve_veirfy{
    background:#333;
    color: white;
    font-size: 16px;
    height: 40px;
    width: 100px;
    padding-top: 4px;
  }
</style>
