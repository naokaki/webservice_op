<header id="#header">
  <div class="site-width">
    <h1>
      <a href="index.php">
        <i class="far fa-smile-wink"></i>
        PLAY BADMINTON
      </a>
    </h1>
    <nav id="top-nav">
      <ul>
        <?php
          if(empty($_SESSION['user_id'])){
        ?>
            <li><i class="far fa-calendar-check"></i><a href="reserve_place.php" class="btn btn-primary">予約施設一覧</a></li>
            <li><i class="far fa-address-book"></i><a href="signup.php" class="btn btn-primary">ユーザー登録</a></li>
            <li><i class="fas fa-key"></i><a href="login.php">ログイン</a></li>
        <?php
          }else{
        ?>
            <li><i class="far fa-calendar-check"></i><a href="reserve_place.php" class="btn btn-primary">施設予約</a></li>
            <li><i class="fas fa-user"></i><a href="mypage.php">マイページ</a></li>
            <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">ログアウト</a></li>
        <?php
          }
        ?>
      </ul>
    </nav>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</header>
