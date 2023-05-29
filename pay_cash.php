<?php 
 include_once('dbConfig.php');
 $price = $_GET['price'];
 $id = $_GET['id'];
 $bu = $_GET['bu'];
 $u_id = isset($_GET['u_id']);
 $method = $_GET['method'];
 $query = mysqli_query($db,"SELECT * FROM product WHERE p_id = $id");
 $result = mysqli_fetch_array($query);
 $num = $result['p_price'];      
 $query = mysqli_query($db,"SELECT * FROM vm_info WHERE vm_id = '$bu'");
 $vm_name = mysqli_fetch_array($query);  
 #$coin_validator = exec("python /var/www/html/open_module_and_send_coin.py ");
 #echo $coin_validator;
 $myfile = fopen("data.txt", "w");
 $msg = 0;
 fwrite($myfile ,$msg."\n");
 fclose($myfile); 
 $myfile = fopen("text.txt", "w");
 $msg = 1;
 fwrite($myfile ,$msg."\n");
 fclose($myfile); 
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
         <!-- <a class="logo-admin"   href="/home.php">Vending Machine</a> -->
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
                <a class="logo-back"  href="/pay.php?bu=<?=$bu?>&id=<?=$id?>">ย้อนกลับ</a>
            </div>

            <div class="container-all-closed">
                <a class="fa-solid fa-circle-xmark" href="/home.php?bu=<?=$bu?>"
                   style="text-decoration: none; color: #383838;" ></a>
            </div>
        </div>

        <div class="container-product">
            <div class="product-all">
                <div class="product-item-all" >
                      <img class="product-img" src="<?=$result['img']?>" >
                      <p class="product-font1"><?=$result['name']?></p>
                      <p class="product-font2"><?=$result['p_price']?>฿</p>
                  </div>
            </div>
        </div>

        <div class="container-product">
            <div class="box-text">
                <div class="box-tab">
                    <p class="text-box">เงินสด</p>
                </div>

                
                <div class="box-pay-grid">
                    <div class="box-pay-detail">
                        <div class="img-pay-detail">
                            <a class="pay-cash-link">
                                <img class="cash-img" src="/pic/cash.png" >
                                <p class="cash-font">เงินสด</p>
                            </a>
                        </div>
                    </div>
                    
                   
                    <div class="box-pay-detail">
                      <div class="img-pay-detail">
                        <p class="product-font1">กรุณาชำระเงินสดจำนวน</p>
                        <p class="product-font2"><?=$price?>฿</p>
                      </div>
                  </div>

                  <!-- test -->
                  <?php 
                  if($price<=0){    
                    $price = $price * -1;     
                    if($u_id == ''){           
                    ?>
                  <script>
                    window.location.href="get_point.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&cash_back=<?=$price?>";
                  </script>
                  <?php }else {?>
                    <script>
                    window.location.href="get_point.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&cash_back=<?=$price?>&u_id=<?=$u_id?>";
                  </script>
                  <?php }
                  } ?>


                



                </div>
            </div>
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
      let prevData = null;
      /* USE COIN  */
      function table() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          let responseText = this.responseText;
          let test = JSON.parse(responseText);
          if (JSON.stringify(test) !== JSON.stringify(prevData)) {


            if(parseInt(test) == 1){
              <?php $num = $price - 1;?>
              <?php if($u_id == ''){           
                      ?>                    
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>";                    
                    <?php }else {?>                      
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&u_id=<?=$u_id?>";                    
                    <?php } ?>
            } else if (parseInt(test) == 2){
              <?php $num = $price - 2;?>
              <?php if($u_id == ''){           
                      ?>                    
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>";                    
                    <?php }else {?>                      
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&u_id=<?=$u_id?>";                    
                    <?php } ?>
            } else if (parseInt(test) == 5){
              <?php $num = $price - 5;?>
              <?php if($u_id == ''){           
                      ?>                    
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>";                    
                    <?php }else {?>                      
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&u_id=<?=$u_id?>";                    
                    <?php } ?>
            } else if (parseInt(test) == 10){
              <?php $num = $price - 10;?>
              <?php if($u_id == ''){           
                      ?>                    
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>";                    
                    <?php }else {?>                      
                      window.location.href="pay_cash.php?bu=<?=$bu?>&id=<?=$id?>&method=cash&price=<?=$num?>&u_id=<?=$u_id?>";                    
                    <?php } ?>
            } 
                  
          }
          prevData = test;
        }
        xhttp.open("GET", "system.php");
        xhttp.send();
      }

      setInterval(function() {
        table();
      }, 1000);
    </script>

      <script>
  setTimeout(function () {
  window.location.href="home.php?bu=<?=$bu?>";
  window.clearTimeout;
}, 60000);
</script>
  </body>
</html>
