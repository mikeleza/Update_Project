<?php 
 include_once('dbConfig.php');
 $id = $_GET['id'];
 $bu = $_GET['bu'];
 $method = $_GET['method'];
 $u_id = $_GET['u_id'];
 $query = mysqli_query($db,"SELECT * FROM product WHERE p_id = $id");
 $result = mysqli_fetch_array($query);
 $query = mysqli_query($db,"SELECT * FROM vm_info WHERE vm_id = '$bu'");
 $vm_name = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-widtp> h>, initial-scale=1.0">
    <title>Vending Machine</title>
    <link rel="icon" href="/pic/logo-title1.png" type="image/icon type">

    <link href="/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
    <header>
      <div class="header-container">
          <a class="logo-header-text"  href="/index.php">สาขา <?=$vm_name['vm_name']?></a>
          <a href="/admin_login.php">
              <img src="/pic/logo.png" class="logo-header-img">
          </a>
      </div>
    </header>

    <nav>
        <div class="slider">
            <figure>
                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn1.png"> 
               </div>

                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn2.png"> 
               </div>

                <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn3.png"> 
               </div>

               <div class="nav-container">
                    <img class="banner-header-img" src="/pic/bn4.png"> 
               </div>

            </figure>
        </div>
    </nav>

    <div class="banner-add">
        <div class="banner-add-home">
          <img class="banner-add-img" src="/pic/b1.png">
        </div>
    </div>
    
    <div class="text-container">
      <div class="text-icon-point">
        <div class="text-icon">
          <div class="text-bg">
            <div class="text">
                <p> 1.เลือกรายการสินค้า</p>
            </div>
          </div>
  
          <div class="icon">
            <i class="fa-solid fa-circle-chevron-right"></i>
          </div>
  
          <div class="text-bg">
            <div class="text">
                <p>2.เลือกวิธีชำระเงิน</p>
            </div>
          </div>
  
          <div class="icon">
            <i class="fa-solid fa-circle-chevron-right"></i>
          </div>
  
          <div class="text">
            <p>3.รับสินค้า</p>
          </div>
        </div>

        <div class="point-text">
          <a class="logo-point"  href="/phone_points.php?bu=<?=$bu?>">คะเเนนสะสม</a>
        </div>

      </div>
    </div>

    <div class="container-all">
        <div class="container-all-back-closed">
            <div class="container-all-back">
                <a class="logo-back"  href="/pay_cashback.php?bu=<?=$bu?>&id=<?=$id?>">ย้อนกลับ</a>
            </div>

            <div class="container-all-closed">
                <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?=$bu?>"
                   style="text-decoration: none; color: #383838;" ></a>
            </div>
        </div>

        <div class="container-product-left-right">
            <div class="container-product-left">
                <div class="container-product-left-column">
                    <div class="product-all">
                        <div class="product-item-all" >
                              <img class="product-img" src="<?=$result['img']?>" >
                              <p class="product-font1"><?=$result['name']?></p>
                              <p class="product-font2"><?=$result['p_price']?>฿</p>
                          </div>
                    </div>

                    <div class="container-product-left-point">
                        <div class="box-text-left">
                            <div class="box-tab">
                                <p class="text-box">เครดิตเงินเกิน</p>
                            </div>

                            <div class="box-pay-grid-left">
                                <div class="box-pay-detail">
                                    <div class="img-pay-detail">
                                        <a class="pay-cash-link">
                                            <img class="cash-img" src="/pic/cash back.png" >
                                            <p class="cash-font">เครดิตเงินเกิน</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!--**********************************************************-->
          <div class="container-product-right">
        <div class="container-right-column">

          <div class="box-tab-right">
            <p class="text-box">เครดิตเงินเกิน</p>
          </div>
        </div>

        <form method="post">
          <div class="numPan">

            <div class="numpad">
              <p class="product-font1">ใส่รหัสผ่าน เพื่อแลกเครดิตเงินเกิน</p>
            </div>

            <div class="flex-disp">
              <input type="text" name="text" class="flex-indis" required placeholder="กรอกรหัสผ่าน">
            </div>
            <div class="nums">
              <div class="flex r r1">
                <div><span>1</span></div>
                <div><span>2</span></div>
                <div><span>3</span></div>
              </div>
              <div class="flex r r2">
                <div><span>4</span></div>
                <div><span>5</span></div>
                <div><span>6</span></div>
              </div>
              <div class="flex r r3">
                <div><span>7</span></div>
                <div><span>8</span></div>
                <div><span>9</span></div>
              </div>
              <div class="flex r r4">
                <div class="button-flex-delete"><span>ลบ</span></div>
                <div><span>0</span></div>
                <div class="button-flex-submit"><button type="submit" name='btn-ok' class="bg-ok">ตกลง</div>
              </div>
            </div>
          </div>

        </form>

        <style>

          .flex {
            display: flex;
            align-items: center;
            justify-content: center;
          }

          .numpad {
            width: 42vw;
            padding: 10px;
            margin: 0 auto;
            
          }

          .numPad .disp input {
            width: 300px;
            padding: 20px;
            outline: none;
            border: none;
            background: none;
          }

          .flex-indis {
            width: 40vw;
            height: 7vw;
            font-size: 2vw;
            text-align: center;
            border: 2px solid #fb8500;
            border-radius: 10px;
            outline: none;
          }

          .indis:focus {
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.24),
              0 17px 50px 0 rgba(0, 0, 0, 0.19);
          }

          .nums {
            margin: 10px auto;
          }

          .numPan .nums>.r div {
            width: 7vw;
            height: 7vw;
            margin: 7px;
            background-color: #4361ee;
            box-shadow: 5px 10px 20px #3046b1 inset;
            color: white;
            font-size: 2vw;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
          }

          .numPan .nums>.r div:hover {
            background: #3046b1;
          }
          
          .numPan .nums >.r .button-flex-delete {
            background-color: #D90429;
            box-shadow: 5px 10px 20px #bf0603 inset;
          }

          .numPan .nums >.r .button-flex-delete:hover {
            background-color: #bf0603;
          }

          .numPan .nums >.r .button-flex-submit {
            background-color: #FB8500;
            box-shadow: 5px 10px 20px #FF6200 inset;
          }

          .numPan .nums >.r .button-flex-submit:hover {
            background-color: #FF6200;
          }

          .bg-ok {
            text-decoration: none;
            background: none;
            border: none;
            font-size: 2vw;
            color: white;
            cursor: pointer;
          }
        </style>

      </div>
        <!--**********************************************************-->
        



        </div>
        






    </div>

    <footer>
        <div class="footer-container">
          <div class="footer-button-logo">
              <div class="footer-button">
                <p class="button-text">เลือกภาษา</p>
                <button class="button-thai">ไทย</button>
                <button class="button-eng">Eng</button>
              </div>
    
              <div class="foorter-logo">
                <img src="/pic/school-of-engineering.png" class="logo-university">
              </div>
          </div>
          
        </div>
      </footer>


      <script>
    var btn = document.querySelectorAll(".r > div");
    var inp = document.querySelector("input");
  </script>

  <?php


  if (isset($_POST['btn-ok'])) {
    $text = $_POST['text'];
    $phone = substr($text, 0, 6);
    $querys = mysqli_query($db, "SELECT * FROM user WHERE u_id = '$u_id'");
    $ruser = mysqli_fetch_array($querys);
    $points = $ruser['points'];
    $balance = $ruser['balance'];

    if ($phone < 5) {
  ?><script>
        inp.value = "Enter 6 digit";
      </script><?php
              } else if ($phone == $ruser['pin']) {
             
                ?>
      <script>
        window.location.href = "pay_for_cashback.php?bu=<?= $bu ?>&id=<?= $id ?>&method=<?=$method?>&price=<?= $result['p_price'] ?>&u_id=<?= $ruser['u_id'] ?>";
      </script>
    <?php
              } else if ($phone != $ruser['pin']) {
    ?><script>
        inp.value = "รหัสผ่านไม่ถูกต้อง";
      </script><?php
              }
            }
                ?>

  <script>
    btn.forEach(val => {
      val.addEventListener("click", () => {
        if (inp.value.length <= 5)
          inp.value += val.innerText;

        if (inp.value.length > 6) {
          inp.value = "";
          inp.value += val.innerText;
        }

        if (val.innerText == "ลบ")
          inp.value = "";

      })
    })
    setTimeout(function() {
      window.location.href = "home.php?bu=<?= $bu ?>";
    }, 60000);
  </script>
  </body>
</html>