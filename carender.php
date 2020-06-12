<form action="" method="get">
  <?php
  require('function.php');
  require('auth.php');
   ?>
   <?php
   $siteTitle = '施設予約';
   require('head.php');
   $dbFormData = getUser($_SESSION['user_id']);
   ?>
  <div class="wrap">
    <?php
    require('header.php');
    ?>

    <body>
      <div class="wrap" >
        <div style="margin-top: 100px;">
          <p class ="user" style="margin-right: 300px;">
            ユーザー: <?php echo $dbFormData['username'];?>
          </p>
          <div class="user-img">
            <img src="<?php echo showImg($dbFormData['pic']); ?>" alt="">
          </div>
        </div>
        <h1 class="page-title" style="margin-top: 100px; margin-bottom: 8px;">
          施設予約　日付を選択してください
        </h1>
        <p style="text-align: center; font-weight: bold; font-size: 24px; color: #00532B; margin: 0;">
          <?php
          echo $_GET['place'];
          ?>
        </p>
        <table>
          <tbody>
            <tr>
              <th colspan="7" class="cellTableHead">
                2020年2月
              </th>
            </tr>
            <tr>
              <th class="cellSunday"> <a href="#">日</th>
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th class="cellSaturday"> <a href="#">土</th>
            </tr>
            <tr>
              <td class="cellSunday"> <a href=""> </a></td>
              <td><a href=""> </a></td>
              <td><a href=""> </a></td>
              <td><a href=""> </a></td>
              <td><a href=""> </a></td>
              <td><a href=""> </a></td>
              <td class="cellSaturday"><a href="reserve_confirm.php?day=1&place=<?php echo $_GET['place']?>">1</a></td>
            </tr>
            <tr>
              <td class="cellSunday"> <a href="reserve_confirm.php?day=2&place=<?php echo $_GET['place']?>">2</a></td>
              <td><a href="reserve_confirm.php?day=3&place=<?php echo $_GET['place']?>">3</a></td>
              <td><a href="reserve_confirm.php?day=4&place=<?php echo $_GET['place']?>">4</a></td>
              <td><a href="reserve_confirm.php?day=5&place=<?php echo $_GET['place']?>">5</a></td>
              <td><a href="reserve_confirm.php?day=6&place=<?php echo $_GET['place']?>">6</a></td>
              <td><a href="reserve_confirm.php?day=7&place=<?php echo $_GET['place']?>">7</a></td>
              <td class="cellSaturday"> <a href="reserve_confirm.php?day=8&place=<?php echo $_GET['place']?>">8</a></td>
            </tr>
            <tr>
              <td class="cellSunday"> <a href="reserve_confirm.php?day=9&place=<?php echo $_GET['place']?>">9</a></td>
              <td><a href="reserve_confirm.php?day=10&place=<?php echo $_GET['place']?>">10</a></td>
              <td class="cellHoliday"> <a href="reserve_confirm.php?day=11&place=<?php echo $_GET['place']?>">11</a></td>
              <td><a href="reserve_confirm.php?day=12&place=<?php echo $_GET['place']?>">12</a></td>
              <td><a href="reserve_confirm.php?day=13&place=<?php echo $_GET['place']?>">13</a></td>
              <td><a href="reserve_confirm.php?day=14&place=<?php echo $_GET['place']?>">14</a></td>
              <td class="cellSaturday"> <a href="reserve_confirm.php?day=15&place=<?php echo $_GET['place']?>">15</a></td>
            </tr>
            <tr>
              <td class="cellSunday"> <a href="reserve_confirm.php?day=16&place=<?php echo $_GET['place']?>">16</a></td>
              <td><a href="reserve_confirm.php?day=17&place=<?php echo $_GET['place']?>">17</a></td>
              <td><a href="reserve_confirm.php?day=18&place=<?php echo $_GET['place']?>">18</a></td>
              <td><a href="reserve_confirm.php?day=19&place=<?php echo $_GET['place']?>">19</a></td>
              <td><a href="reserve_confirm.php?day=20&place=<?php echo $_GET['place']?>">20</a></td>
              <td><a href="reserve_confirm.php?day=21&place=<?php echo $_GET['place']?>">21</a></td>
              <td class="cellSaturday"> <a href="reserve_confirm.php?day=22&place=<?php echo $_GET['place']?>">22</a></td>
            </tr>
            <tr>
              <td class="cellSunday"> <a href="reserve_confirm.php?day=23&place=<?php echo $_GET['place']?>">23</a></td>
              <td><a href="reserve_confirm.php?day=24&place=<?php echo $_GET['place']?>">24</a></td>
              <td><a href="reserve_confirm.php?day=25&place=<?php echo $_GET['place']?>">25</a></td>
              <td><a href="reserve_confirm.php?day=26&place=<?php echo $_GET['place']?>">26</a></td>
              <td><a href="reserve_confirm.php?day=27&place=<?php echo $_GET['place']?>">27</a></td>
              <td><a href="reserve_confirm.php?day=28&place=<?php echo $_GET['place']?>">28</a></td>
              <td class="cellSaturday"> <a href="reserve_confirm.php?day=29&place=<?php echo $_GET['place']?>">29</a></td>
            </tr>
          </tbody>
        </table>
        <style>
          table{
            height: 500px;
            width: 750px;
            margin: auto;
            margin-top: 20px;
          }
          .cellTableHead {
            background-color: #3BB979;
            font-size: 16px;
            color: #FFF;
            margin-top: 20px;
            padding-top: 15px;
            padding-right: 30px;
            padding-bottom: 15px;
            padding-left: 30px;
            font-weight: bold;
            text-align: center;
        }
        .cellSunday {
            background-color: #F7E6E6;
        }
        .cellSaturday{
          background-color:rgb(186, 207, 224);
        }

          tr th {
              background-color: #00532B;
              color: #FFF;
              padding: 10px 0;
          }
          tr td th{
            width: 14.28%;
            border-top-width: 1px;
            border-right-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-top-color: #FFF;
            border-right-color: #FFF;
            text-align: center;
        }
        tr td {
            font-size: 26px;
            color: #333;
            background-color: #D8F1E4;
            padding: 15px 0;
            font-weight: bold;
            text-align: center;
        }
          a{
            color: black;
          }
        </style>
      </div>
    </body>

    <!-- footer -->
    <?php
    require('footer.php');
    ?>

  </form>

  </div>
