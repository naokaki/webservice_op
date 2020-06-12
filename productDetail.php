<?php
//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　商品詳細ページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();
require('auth.php');
//================================
// 画面処理
//================================

// 画面表示用データ取得
//================================

// 商品IDのGETパラメータを取得
$product_id = (!empty($_GET['p_id'])) ? $_GET['p_id'] : '';
//DBから商品データを取得(一つだけ)
$viewData = getProductOne($product_id);
debug('取得したDBデータ:'.print_r($viewData,true));


//post送信されていた場合
if(!empty($_POST['submit'])){
  debug('POST送信があります');

  //例外処理
  try{
    //DBへ接続
    $dbh = dbConnect();
    //SQL文作成
    $sql = 'INSERT INTO bord (sale_user, buy_user, product_id, pic1, name, price, create_date) VALUES (:sale_user_id, :buy_user_id, :product_id, :pic1,:name, :price, :date)';
    $data = array(':sale_user_id' => $viewData['user_id'], ':buy_user_id' => $_SESSION['user_id'], ':product_id' => $product_id, ':pic1' => $viewData['pic1'], 'name' => $viewData['name'], 'price' => $viewData['price'], ':date' => date('Y-m-d H:i:s'));
    //クエリ実行
    $stmt = queryPost($dbh, $sql, $data);
    //クエリ成功の場合
    if($stmt){
      $_SESSION['msg_success'] = SUC05;
      debug('連絡掲示板へ遷移します');
      header("Location:msg.php?m_id=".$dbh->lastInsertID());//連絡掲示板へ
    }
  }catch(Exception $e){
    error_log('エラー発生:'.$e->getMessage());
    $err_msg['common'] = MSG07;
  }
}
debug('画面表示終了<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
?>
<?php
$siteTitle = '商品詳細';
require('head.php');
?>

  <body class="page-productDetail page-1colum">


    <div class="wrap">
      <!-- ヘッダー -->
      <?php
        require('header.php');
      ?>

      <!-- メインコンテンツ -->
      <div id="contents" class="site-width-product">

        <!-- Main -->
        <section id="main" style="margin-top:80px;">

          <div class="title" style="font-size: 28px; padding: 10px 0; font-weight: bold;font-style: oblique;">
            <?php echo sanitize($viewData['name']); ?>
          </div>
          <div class="product-img-container">
            <div class="img-main">
              <img src="<?php echo showImg(sanitize($viewData['pic1'])); ?>" alt="メイン画像：<?php  echo sanitize($viewData['name']);?>" id="js-switch-img-main">
            </div>
            <div class="img-sub">
              <img src="<?php echo showImg(sanitize($viewData['pic1'])); ?>" alt="画像1：" class="js-switch-img-sub">
              <img src="<?php echo showImg(sanitize($viewData['pic2'])); ?>" alt="画像2：" class="js-switch-img-sub">
              <img src="<?php echo showImg(sanitize($viewData['pic3'])); ?>" alt="画像3：" class="js-switch-img-sub">
            </div>
          </div>
          <div class="product-detail">
            <p><?php echo sanitize($viewData['comment']); ?></p>
          </div>
          <div class="product-buy">
            <div class="item-left">
              <a href="index.php<?php appendGetParam(array('p_id'));?>">&lt; 商品一覧に戻る</a>
            </div>
            <form action ="" method="post"> <!-- formタグを追加し、ボタンをinputに変更し、style追加 -->
              <div class="item-right">
                <input type="submit" value="買う!" name="submit" class="btn btn-primary" style="margin-top:0;">
              </div>
            </form>
            <div class="item-right">
              <p class="price" style="margin-top:-5px;">¥<?php echo sanitize(number_format($viewData['price']));?></p>
            </div>
          </div>

        </section>

      </div>

      <!-- footer -->
      <?php
      require('footer.php');
      ?>
    </div>



<!-- やること
appendGetParam
getパラのurl変更　まあこれは施設予約でもいい
number_format -->
