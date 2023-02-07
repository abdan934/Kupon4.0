<!DOCTYPE html>
<html lang="en">

    <head>
        <?=view('layout/head') ?>
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?=view('layout/navbar') ?>
            <!-- End Navigation -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?=$total_data_peserta?></div>
                                            <div>Peserta</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                      
                </div>
                <!-- /.panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- <i class="fa fa-bar-chart-o fa-fw"></i>--> Table Data Peserta 
                        <div class="pull-right">
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <!-- <div class="col-lg-4"> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Nomor Handphone</th>
                                                <th>Email</th>
                                                <th>alamat</th>
                                                <th>undian</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        foreach ($all_data_peserta as $peserta) :
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php
                                                echo $no++;
                                                ?></td>
                                                <td> <?php
                                                            echo $peserta->nama_peserta;
                                                            ?></td>
                                                <td> <?php
                                                echo $peserta->no_hp;
                                            ?></td>
                                                <td> <?php
                                                        echo $peserta->email;
                                                        ?></td>
                                                <td> <?php
                                                        echo $peserta->alamat;
                                                        ?></td>
                                                <td> <?php
                                                        echo $peserta->undian;
                                                        ?></td>
                                            </tr>
                                        </tbody>

                                        <?php
                                         endforeach;
                                                ?>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.col-lg-4 (nested) -->
                            <!-- <div class="col-lg-8">
                                <div id="morris-bar-chart"></div>
                            </div> -->
                            <!-- /.col-lg-8 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
        <!-- script -->
        <?= view('layout/script')?>
        <!-- end script -->

    </body>

</html>