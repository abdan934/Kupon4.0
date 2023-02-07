<!DOCTYPE html>
<html lang="en">

<head>
<?=view('layout/landing/head_landing') ?>
</head>


<body>
  <!-- header start -->
  <div class="header_section background_bg">
  <?=view('layout/landing/header_landing') ?>   

   <!-- banner section start -->
   <div class="banner_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <h1 class="banner_taital_1">CHECK</h1>
            <h1 class="banner_taital">Kupon anda disini</h1>

            <?= form_open('/home-page-check') ?>
            <div class="row g-3">
              <div class="col-auto">
                 <input type="text" class="form-control" placeholder="Masukkan Kupon" name="kupon">
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Check</button>
              </div>
              </div>
            <?= form_close() ?>

            
            <p class="banner_text">Jika belum ada silahkan daftar,
                link ada dibawah ini
              </p>
              <div class="contact_bt"><a href="#">Daftar Sekarang<span class="contact_padding"><img
                      src="./assets/landing/images/contact-icon.png"></span></a></div>
           
          </div>
          <div class="col-sm-2">
            <!-- <div class="play_icon">
              <a href="#">
                <img src="./assets/landing/images/play-icon.png">
            </a>
            </div> -->
          </div>
          <div class="col-sm-5">
            <div><img src="./assets/landing/images/img-1.png" class="image_1"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
  </div>
  <!-- header end -->
<?php 
            $session = \Config\Services::session(); 
              if ($session->getFlashdata('pesan')=='data ada'){
                // echo $undian;
                return view('dashboard');
              }elseif($session->getFlashdata('pesan') == 'Nomor Handphone belum terdaftar!!'){
                echo "<p><div class='alert alert-danger mt-3' role='alert'>";
                echo "Nomor Handphone belum terdaftar!!";
                echo "</div></p>";
              }elseif($session->getFlashdata('pesan') == 'Silahkan inputkan dengan benar!!'){
                echo "<p><div class='alert alert-danger mt-3' role='alert'>";
                echo $session->getFlashdata('pesan');
                echo "</div></p>";
              }
            ?>

  <!-- footer start -->
  <?=view('layout/landing/footer_landing') ?>
  <!-- footer end -->

</body>

</html>