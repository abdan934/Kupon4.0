<!DOCTYPE html>
<html lang="en">

    <head>
        <?=view('layout/head') ?>
    </head>

    <body>

        <div id="wrapper">
            <!-- navbar -->
            <?=view('layout/navbar') ?>
            <!-- navbar end -->

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Import Peserta</h1>
                            <div class="main-panel">
                                <div class="content-wrapper">
                                    <!-- <form method="" action="" enctype="multipart/form-data"> -->
                                    <a href="<?php echo base_url('assets/template-excel.xlsx')?>">
                                        <button type="button" class="btn btn-inverse-info btn-fw">
                                            <svg class="mr-2" xmlns=" http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark-spreadsheet"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                            </svg>
                                            Download Template</button>
                                    </a>
                                    <br><br>

                                    <?= form_open_multipart('/import-peserta-excel') ?>

                                    <div>
                                        <label class="form-label">nama-file.xlsx\xls</label>
                                        <input class="form-control form-control-lg" name="file" type="file">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success mb-3">Import</button>
                                    <br>
                                    <?= form_close() ?>
                                    <br>
                                    <!-- </form> -->

                                    <?php

$session = \Config\Services::session();  
if(!empty($session->getFlashdata('pesan'))){
    if ($session->getFlashdata('pesan')=='Import data berhasil'){
        echo '<div class="alert alert-success mt-3" role="alert">
        Data ditambahkan
        </div>';
    }elseif(strpos($session->getFlashdata('pesan'), 'Duplicate entry') !== false){
        echo "<div class='alert alert-danger mt-3' role='alert'>";
        echo "Data yang diimport sudah ada, silahkan cek kembali data yang diimport";
        echo "</div>";
    }elseif(strstr($session->getFlashdata('pesan'), 'Duplicate entry') !== false){
        echo "<div class='alert alert-danger mt-3' role='alert'>";
        echo $session->getFlashdata('pesan');
        echo "</div>";
    }elseif(substr($session->getFlashdata('pesan'), 0, 7) == "Data sudah ada"){
        echo "<div class='alert alert-warning mt-3' role='alert'>";
        echo $session->getFlashdata('pesan');
        echo "</div>";
    }else{
        echo "<div class='alert alert-warning mt-3' role='alert'>";
        echo $session->getFlashdata('pesan');
        echo "</div>";
    }
}

                                    
        //                             $session = \Config\Services::session();  
        //                                    if(!empty($session->getFlashdata('pesan'))){
        //                                     if ($session->getFlashdata('pesan')=='Import data berhasil'){
        //                                         echo '<div class="alert alert-success mt-3" role="alert">
        //                                         Data ditambahkan
        //                                         </div>';
        //                                     }elseif(strpos($session->getFlashdata('pesan'), 'Duplicate entry') !== false){
        //                                         echo "<div class='alert alert-danger mt-3' role='alert'>";
        // echo "Data yang diimport sudah ada, silahkan cek kembali data yang diimport";
        // echo "</div>";
        //                                     }else{
        //                                     echo "<div class=\"alert alert-warning mt-\" role=\"alert\">";
        //                                     var_dump($session->getFlashdata('pesan'));
        //                                 echo "</div>";}
        //                                    }
                    ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- script -->
        <?= view('layout/script')?>
        <!-- end script -->
    </body>

</html>