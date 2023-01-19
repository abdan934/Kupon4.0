<!DOCTYPE html>
<html lang="en">

    <head>
        <?=view('layout/head') ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
        </script>
        </script>
    </head>

    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <?=view('layout/navbar') ?>
            <!-- End Navigation -->

            <!-- <div class="container col-lg-6"> -->
            <div id="page-wrapper">
                <div class=" container-fluid mt-5">
                    <div class="row">
                        <div class="col-lg-6 mt-2">
                            <div class="panel panel-default">
                                <div class="panel-heading navbar-default">
                                    <!-- Hover Rows -->
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="mauexport">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No.
                                                    </th>
                                                    <th>
                                                        No HP
                                                    </th>
                                                    <th>
                                                        Nama Peserta
                                                    </th>
                                                    <th>
                                                        Email
                                                    </th>
                                                    <th>
                                                        Alamat
                                                    </th>
                                                    <th>
                                                        Kupon
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        //include './config/koneksi.php';
                                        $no = 1;
                                        foreach ($all_data_peserta as $peserta) :
                                            # code...
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                         echo $no++;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                    echo $peserta->no_hp;
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $peserta->nama_peserta;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $peserta->email;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        echo $peserta->alamat;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                       echo $peserta->undian;
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                         endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                </div>
            </div>
            <!-- end main -->


            <script>
            $(document).ready(function() {
                $('#mauexport').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



            </script>

    </body>

</html>