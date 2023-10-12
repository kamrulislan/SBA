<?php

include_once('header.php');
include_once('phpresources.php');


?>



<?php
$p_id = $_GET['p_id'];
$con = mysqli_connect("localhost", "root", "mysql", "shop");
$query = "select * from product where p_id='$p_id'";
$data = mysqli_query($con, $query);

$result = mysqli_fetch_assoc($data);


//===============add to cart===============
if (isset($_GET['add_to_cart'])) {

  $cp_id = $_GET['cp_id'];
  $cp_price = $_GET['cp_price'];
  $cp_name = $_GET['cp_name'];
  $cu_id = $_GET['cu_id'];
  $qty = $_GET['qty'];



  $query = "INSERT INTO temp_cart(qty,cp_price,cu_id,cp_product_id,cp_name)values('$qty','$cp_price','$cu_id','$cp_id','$cp_name')";
  $data = mysqli_query($con, $query);
  if ($data) {
    echo "<script> alert('Product added in cart')</script>";
  }
}


?>









<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="asset/shop.css">
  <link rel="stylesheet" href="asset/productpage.css">
  <title><?php echo $result["p_name"]; ?></title>
</head>

<body>

  <!-- body first row open -->

  <section class="pro-page-heading">
    <div>
      <h2><a href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
        <i class="fa-solid fa-angles-right"></i> <?php echo $result["p_cat"]; ?> <i class="fa-solid fa-angle-right"></i> <?php echo $result["p_name"]; ?>
      </h2>
    </div>
  </section>



  <section class="shop-container">



    <div class="firt-row">



      <div class="home-category">


        <a href="#">
          <div class="home-cat home-cat-first-row">

            <div class="home-cat-l"><i class="fa-solid fa-bars"></i></i>Shop Categories</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>


        <a href="cat-samartphone.php">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-mobile"></i>Smartphones</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-tv"></i>SmartTV</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-clock"></i>Smart Watch</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-camera"></i>Camera</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-camera-rotate"></i>Webcam</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-gamepad"></i>Video Games</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-laptop"></i>Laptop</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-brands fa-apple"></i>Apple Store</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>
        <a href="#">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-screwdriver-wrench"></i>Accessories</div>
            <div class="home-cat-r"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>

          </div>
        </a>

        <a href="shop.php">
          <div class="home-cat">

            <div class="home-cat-l"><i class="fa-solid fa-fire-flame-curved fa-beat" style="--fa-animation-duration: 0.7s;"></i>Offers</div>
            <div class="home-cat-r"><i class="fa-solid fa-fire-flame-curved fa-beat" style="--fa-animation-duration: 0.7s;"></i></div>

          </div>
        </a>

      </div>





      <!--shop all products start-->

      <div class="shop-all-products">
        <!--product page start-->

        <div class="pro-page-first-row">

          <!--product page image column-->
          <div class="pro-page-first-left">


            <div class="pro-page-first-left-big-img">
              <img id="imageBox" src="admin/pic/<?php echo $result["p_img"]; ?>" alt="">
            </div>


            <div class="pro-page-first-left-sml-img">

              <div class="pro-page-first-left-sml-one">
                <img src="admin/pic/<?php echo $result["p_img"]; ?>" alt="" onclick="myFunction(this)">
              </div>

              <div class="pro-page-first-left-sml-one">
                <img src="asset/img/2.jpg" alt="" onclick="myFunction(this)">
              </div>

              <div class="pro-page-first-left-sml-one">
                <img src="asset/img/5.jpg" alt="" onclick="myFunction(this)">
              </div>

              <div class="pro-page-first-left-sml-one">
                <img src="asset/img/6.jpg" alt="" onclick="myFunction(this)">
              </div>

            </div>

          </div>

          <!--product page details column-->
          <div class="pro-page-first-right">
            <div class="pro-page-pro-meta">
              <h1><?php echo $result["p_name"]; ?></h1>
              <h2>$ <?php echo $result["p_price"]; ?></h2>
              <h6><span><i class="fa-solid fa-heart-circle-plus"></i> Add to wishlist</span> <span><i class="fa-solid fa-right-left"></i> Add to Quich compare</span></h6>
              <h3><i class="fa-solid fa-fire-flame-curved fa-beat"></i> &nbsp;15 days money back Guarantee</h3>
              <h3><i class="fa-solid fa-truck-fast"></i>&nbsp;&nbsp;Free Shipping On Orders $499 and Up&nbsp;&nbsp;<i class="fa-solid fa-truck-fast"></i></h3>
              <h3><i class="fa-solid fa-hand-holding-hand"></i>&nbsp;&nbsp;24/7 Customer Support</h3>
              <p><i class="fa-solid fa-tags"></i> There are <b>16 items</b> sold in last 24 hours</p>
              <div class="pro-page-phone-model">

                <select name="model" id="model">
                  <option value="Phone">Select Your Phone Model</option>
                  <option value="iPhone 12">iPhone 12</option>
                  <option value="iPhone 12 pro">iPhone 12 pro</option>
                  <option value="iPhone 12 mini">iPhone 12 mini</option>
                  <option value="iPhone 13">iPhone 13</option>
                  <option value="iPhone 13 pro">iPhone 13 pro</option>
                  <option value="iPhone 13 pro max">iPhone 13 pro max</option>

                </select>
              </div>

              <div class="pro-page-qty-add">
                <form action="" method="get">
                  <h4>Quantity</h4>


                  <div class="pro-page-qty-add-qty">


                    <div class="value-button-minus" id="decrease" onclick="decreaseValue()" value="Decrease Value"><i class="fa-solid fa-minus"></i></div>

                    <div class="value-inp"><input type="number" id="number" name="qty" value="1" /></div>

                    <div class="value-button-plus" id="increase" onclick="increaseValue()" value="Increase Value"><i class="fa-solid fa-plus"></i></div>

                  </div>


                  <input type="hidden" name="p_id" value="<?php echo $result['p_id']; ?>">
                  <input type="hidden" name="cp_id" value="<?php echo $result['p_id']; ?>">
                  <input type="hidden" name="cp_price" value="<?php echo $result['p_price']; ?>">
                  <input type="hidden" name="cp_name" value="<?php echo $result['p_name']; ?>">

                  <input type="hidden" name="cu_id" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">

                  <div class="Icon-inside">
                    <input type="submit" id="submit" name="add_to_cart" value="Add to Cart">
                    <i class="fa-solid fa-bag-shopping"></i>
                  </div>

                </form>


              </div>



              <div class="pro-page-payment">
                <img src="asset/img/payment-2.png" alt="">
              </div>

              <div class="pro-page-category">
                <p><i class="fa-brands fa-buffer"></i> Category <span><i class="fa-solid fa-angles-right"></i> <?php echo $result["p_cat"]; ?></span></p>
              </div>

            </div>
          </div>

        </div>

        <div class="pro-page-visitor">
          <h4><i class="fa-regular fa-eye"></i> There are <b id="cont">21 visitors</b> are browsing our store</h4>
          <h4><i class="fa-solid fa-truck-fast"></i> Buy now to receive in <b>2-5</b> days</h4>
        </div>


      </div>
      <!--shop all products end-->

















    </div>

  </section>

  <!-- body first row close -->



  <!-- footer section open -->
  <?php include_once('footer.php'); ?>
  <!-- footer section close -->



  <!-- js for gallery image -->
  <script>
    function myFunction(smallImg) {
      var fullImg = document.getElementById("imageBox")
      fullImg.src = smallImg.src;
    }
  </script>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    function increaseValue() {
      var value = parseInt(document.getElementById('number').value, 10);
      value = isNaN(value) ? 0 : value;
      value++;
      document.getElementById('number').value = value;
    }

    function decreaseValue() {
      var value = parseInt(document.getElementById('number').value, 10);
      value = isNaN(value) ? 0 : value;
      value < 1 ? value = 1 : '';
      value--;
      document.getElementById('number').value = value;
    }


    let genRnd = function() {
      var min = 1;
      var max = 25;
      return Math.floor(Math.random() * (+max - +min)) + +min;
    };

    setInterval(
      function() {
        document.getElementById("cont").innerHTML = genRnd();
      },
      3000
    );
  </script>


</body>

</html>