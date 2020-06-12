<?php

//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　トップページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

//ログイン認証
require('auth.php');
//================================
// 画面処理
//================================

// 画面表示用データ取得
//================================
// GETパラメータを取得
//----------------------------------f
// カレントページ
$currentPageNum = (!empty($_GET['p'])) ? $_GET['p'] : 1;//でふぉは1ページ目
debug('$currentPageNumの中身:'.print_r($currentPageNum,true));
//カテゴリー
$category = (!empty($_GET['c_id'])) ? $_GET['c_id'] : '';
//ソート順
$sort = (!empty($_GET['sort'])) ? $_GET['c_id'] : '';
//表示件数
$listSpan = 15;
//現在の表示レコード先頭を算出
$currentMinNum = (($currentPageNum-1)*$listSpan);
//1ページ目なら(1-1)*15 = 0 、 ２ページ目なら(2-1)*15 = 15
$dbProductData = getProductList($currentMinNum,$category,$sort);
//Dbからカテゴリデータを取得
$dbCategoryData = getCategory();
debug('Dbデータ：'.print_r($dbProductData,true));
debug('カテゴリデータ：'.print_r($dbCategoryData,true));

debug('画面表示終了<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<');
$dbFormData_user = getUser($_SESSION['user_id']);

?>
<?php
$siteTitle = 'HOME';
require('head.php');
?>
<body style="width:1295px; background: rgba(227, 236, 218, 0.32);">
  <!-- ヘッダー -->
  <?php
  require('header.php');
   ?>
   <!-- メインコンテンツ -->
       <div id="contents" class="site-width index">

        <div class="form-padding-top">
          <!-- サイドバー -->
          <section id="sidebar" style="margin-top:0;">
            <form name="" method="get">
              <h1 class="title">カテゴリー</h1>
              <div class="selectbox">
                <span class="icn_select"></span>
                <select name="c_id" id="">
                  <option value="0" <?php if(getFormData('category_id') == 0 ){ echo 'selected'; } ?> >選択してください</option>
                  <?php
                    foreach($dbCategoryData as $key => $val){
                  ?>
                    <option value="<?php echo $val['id'] ?>" <?php if(getFormData('category_id') == $val['id'] ){ echo 'selected'; } ?> >
                      <?php echo $val['name']; ?>
                    </option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <h1 class="title">表示順</h1>
              <div class="selectbox">
                <span class="icn_select"></span>
                <select name="sort">
                  <option>新着順</option>
                  <option>金額が安い順</option>
                  <option>金額が高い順</option>
                </select>
              </div>
              <input type="submit" value="検索">
            </form>

          </section>

          <!-- Main -->
          <section id="main" >
              <div class="user_info" style="overflow:hidden;">
                <p class ="user">
                  ユーザー: <?php echo $dbFormData_user['username'];?>
                </p>
                <div class="user-img">
                  <img src="<?php echo showImg($dbFormData_user['pic']); ?>" alt="">
                </div>
              </div>
            <div class="search-title">
              <div class="search-left">
                <span class="total-num">
                  <?php echo sanitize($dbProductData['total']); ?>
   　           </span>
                <?php
                debug('DBproductデータ:'.print_r($dbProductData['total'],true));
                 ?>
                 件の商品が見つかりました
              </div>
              <div class="search-right">
                <span class="num">
                  <?php
                  echo (!empty($dbProductData['data'])) ? $currentMinNum+1 : 0;
                   ?>
                   <?php
                   debug('DBproductデータ：'.print_r($dbProductData['data'],true)); ?>
                </span>
                -
                <span class="num">
                  <?php echo $currentMinNum+count($dbProductData['data']); ?>
                </span>
                件 /
                <span class="num">
                  <?php echo $dbProductData['total']; ?>
                </span>
                件中
              </div>
            </div>
            <div class="panel-list">
              <?php
                 foreach($dbProductData['data'] as $key => $val):
               ?>
               <a href="productDetail.php<?php echo (!empty(appendGetParam())) ? appendGetParam().'&p_id='.$val['id'] : '?p_id='.$val['id'];?>"
                 class="panel">
                <div class="panel-head">
                  <img src="<?php echo sanitize($val['pic1']); ?>" alt="<?php echo $val['name']; ?>">
                </div>
                <div class="panel-body">
                  <p class="panel-title">
                    <?php echo sanitize($val['name']); ?>
                    <p class="price">
                      <br>¥<?php echo sanitize(number_format($val['price'])); ?>
                    </p>
                  </p>
                </div>
               </a>
               <?php
             endforeach;
              ?>
            </div>

            <?php pagination($currentPageNum, $dbProductData['total_page']); ?>
          </section>
        </div>

       </div>

   <!-- footer -->
   <?php
     require('footer.php');
   ?>

</body>
