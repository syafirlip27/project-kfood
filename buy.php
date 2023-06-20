<?php
include 'fungsi.php';
$jumlah = new Jumlah();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Korean Food</title>
    <link rel="stylesheet" href="style.css">


    </style>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>



    <div class="container" style="margin-top: 50px;">
        <div class="panel panel-success">
            <div class="panel-body bg-secondary">
                <div class="container">
                    <h1><i class="fa fa-shopping-cart"></i> Korean Fo0d!</h1>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <div class="col-md-10">
                        <h4>Click here to buy
                            <button type="button" class="button" name="button" data-toggle="modal" data-target="#buy">
                                <i class="fa fa-shopping-cart"></i> Buy
                            </button>
                            <a href="index.php"><button type="button" class="button" name="button">Back</button></a>


                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container">
                    <?php

                    if (isset($_POST['check'])) {
                        $jmlJajangmyeon = $_POST['jajangmyeon'];
                        $jmlTteokbokki = $_POST['tteokbokki'];
                        $jmlKimbap = $_POST['kimbap'];

                        if ($jmlTteokbokki == null && $jmlKimbap == null) {
                            $jumlah->getJumlah($jmlJajangmyeon, 0, 0);
                        } elseif ($jmlJajangmyeon == null && $jmlKimbap == null) {
                            $jumlah->getJumlah(0, $jmlTteokbokki, 0);
                        } elseif ($jmlTteokbokki == null && $jmlJajangmyeon == null) {
                            $jumlah->getJumlah(0, 0, $jmlKimbap);
                        } elseif ($jmlJajangmyeon == null) {
                            $jumlah->getJumlah(0, $jmlTteokbokki, $jmlKimbap);
                        } elseif ($jmlTteokbokki == null) {
                            $jumlah->getJumlah($jmlJajangmyeon, 0, $jmlKimbap);
                        } elseif ($jmlKimbap == null) {
                            $jumlah->getJumlah($jmlJajangmyeon, $jmlTteokbokki, 0);
                        } else {
                            $jumlah->getJumlah($jmlJajangmyeon, $jmlTteokbokki, $jmlKimbap);
                        }

                        $jumlah->setHarga();
                        $jumlah->cetakstruk();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!-- [Modal Form]-->

    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger" style="border-radius: 5px 5px 0px 0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="">Form to buy</h4>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="" method="post">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                            <input type="number" class="form-control" name="jajangmyeon" id="jajangmyeon" placeholder="enter amount of jajangmyeon">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                            <input type="number" class="form-control" name="tteokbokki" id="tteokbokki" placeholder="enter amount of tteokbokki">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
                            <input type="number" class="form-control" name="kimbap" id="kimbap" placeholder="enter amount of kimbap">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnjajangmyeon" onclick="Onlyjajangmyeon()" class="button" style="float: left;">Jajangmyeon</button>
                    <button type="button" id="btntteokbokki" onclick="Onlytteokbokki()" class="button" style="float: left;">Tteokbokki</button>
                    <button type="button" id="btnkimbap" onclick="Onlykimbap()" class="button" style="float: left;">Kimbap</button>
                    <button type="button" onclick="Ketiganya()" class="button" style="float: left;">Jajangmyeon, Tteokbokki, dan Kimbap</button>
                    <br></br>
                    <button type="submit" class="btn btn-primary btn-sm" name="check"><i class="fa fa-check"></i> Check Total</button>
                    <button type="submit" onclick="exit()" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function Onlyjajangmyeon() {
            document.getElementById("jajangmyeon").readOnly = false;
            document.getElementById("tteokbokki").readOnly = true;
            document.getElementById("kimbap").readOnly = true;
            document.getElementById("btnjajangmyeon").disabled = false;
            document.getElementById("btntteokbokki").disabled = true;
            document.getElementById("btnkimbap").disabled = false;
        }

        function Onlytteokbokki() {
            document.getElementById("jajangmyeon").readOnly = true;
            document.getElementById("tteokbokki").readOnly = false;
            document.getElementById("kimbap").readOnly = true;
            document.getElementById("btnjajangmyeon").disabled = true;
            document.getElementById("btntteokbokki").disabled = false;
            document.getElementById("btnkimbap").disabled = false;
        }

        function Onlykimbap() {
            document.getElementById("jajangmyeon").readOnly = true;
            document.getElementById("tteokbokki").readOnly = true;
            document.getElementById("kimbap").readOnly = false;
            document.getElementById("btnjajangmyeon").disabled = false;
            document.getElementById("btntteokbokki").disabled = false;
            document.getElementById("btnkimbap").disabled = true;
        }

        function Ketiganya() {
            document.getElementById("jajangmyeon").readOnly = false;
            document.getElementById("tteokbokki").readOnly = false;
            document.getElementById("kimbap").readOnly = false;
            document.getElementById("btnjajangmyeon").disabled = false;
            document.getElementById("btntteokbokki").disabled = false;
            document.getElementById("btnkimbap").disabled = false;
        }

        function exit() {
            document.getElementById("jajangmyeon").readOnly = true;
            document.getElementById("tteokbokki").readOnly = true;
            document.getElementById("kimbap").readOnly = true;
        }
    </script>
</body>

</html>