<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>TUGAS PHP</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet" />

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all" />

</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="nama" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Agama</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="agama">
                                            <option disabled="disabled" selected="selected">-- Pilih Agama --</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen Katolik</option>
                                            <option value="kristen">Kristen Protestan</option>
                                            <option value="budha">Budha</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="khonghucu">Khonghucu</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row p-t-20">
                            <label class="label label--block">Jabatan?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55 ">Manager
                                    <input type="radio" checked="checked" name="jabatan" value="manager" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Asisten
                                    <input type="radio" name="jabatan" value="asisten" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-55">Kepala Bagian
                                    <input type="radio" name="jabatan" value="kabag" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Staff
                                    <input type="radio" name="jabatan" value="staff" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-row p-t-20" name="status">
                            <label class="label label--block">Status Menikah?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Sudah Menikah
                                    <input type="radio" checked="checked" name="status" value="menikah" />
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Belum Menikah
                                    <input type="radio" name="status" value="belum menikah" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jumlah Anak</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="jml_anak" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red bg-dark text-light" type="submit"
                                name="proses">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <?php
    //tangkap request
    $nama = $_POST['nama'];
    $agama = $_POST['agama'];
    $jabatan = $_POST['jabatan'];
    $gapok = 'gapok';
    $status = $_POST['status'];
    $jml_anak = $_POST['jml_anak'];
    $tombol = $_POST['proses'];
     // Tentukan gaji pokok (switch case)
     switch ($jabatan) {
        case 'manager': $gapok = 20000000; break;
        case 'asisten': $gapok = 15000000; break;
        case 'kabag': $gapok = 10000000 ; break;
        case 'staff': $gapok = 4000000; break;
        default: $gapok = '';
    }
    //Tentukan tunjangan jabatan = 20% dari gaji pokok
    $tunjab = $gapok * 0.2;

    //Tentukan tunjangan keluarga (if multi kondisi)
    if($status == "menikah" && $jml_anak <= 2){
        $tunkel =  $gapok * 00.5 ;
    } else if ($status == "menikah" && ($jml_anak >= 3 && $jml_anak <= 5)){
        $tunkel = ( $gapok * 10 ) / 100;
    } else if ($status == "menikah" && $jml_anak >= 5){
        $tunkel = ( $gapok * 15 ) / 100;
    } else {
        $tunkel = 0;
    }
    //Tentukan gaji kotor
    $gajtor = $gapok + $tunjab + $tunkel;
    
    //Tentukan zakat_profesi (ternary)
    $zaprof = 0;
        if ($agama === "islam" && $gajtor >= 7000000) $zaprof = $gajtor * 0.025;
        else $zaprof = 0;
    //Tentukan take home pay
    $THP = $gajtor - $zaprof;

    
    if(isset($tombol)){ ?>
        <div class="wrapper wrapper--w790 mt-3">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Data Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $nama ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Agama</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $agama ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jabatan</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $jabatan ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gaji Pokok</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $gapok ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Status</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $status ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Jumlah Anak</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $jml_anak ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Tunjangan Jabatan</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $tunjab ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Tunjangan Keluarga</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $tunkel ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Gaji Kotor</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $gajtor ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Zakat Profesi</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $zaprof ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Take Home Pay</div>
                            <div class="value">
                                <div class="input-group">
                                    <label class="radio-container"> <?= $THP ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>
    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->