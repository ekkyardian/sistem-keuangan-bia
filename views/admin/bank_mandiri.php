<?php
include "../../models/admin/m_bank_mandiri.php";
include "../../models/admin/m_bulan.php";

$bankmandiri = new BankMandiri($connection);

// model bulan
$mBulan = new M_bulan($connection);

// set id bulan
$setIdBulan = function ($id) {
    if ($id <= 9) {
        $id = "0" . $id;
    }

    return $id;
};

if (isset($_GET['go'])) {
    $getUri = $bankmandiri->get_uri();

    $periode_bulan = $getUri['periode_bulan'];
    $periode_tahun = $getUri['periode_tahun'];
}

if (@$_GET['act'] == '') {
    ?>

    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-draft"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <p style="font-size: 16px"><strong>Periode Laporan:</strong></p><br />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form name="bank_mandiri_show_by" action="" method="get" class="form-custom">
                                                    <select name="periode_bulan" id="periode_bulan"
                                                            class="form-control form-control-custom">
                                                        <option value="">Bulan...</option>
                                                        <?php
                                                        $result = $mBulan->get_bulan();
                                                        while ($data = $result->fetch_object()) {
                                                            $bulan = $setIdBulan($data->bulan);
                                                            $nama_bulan = ucfirst($data->nama_bulan);

                                                            if (isset($_GET['periode_bulan']) && $_GET['periode_bulan'] == $bulan) {
                                                                $selected = "selected";
                                                            } else {
                                                                $selected = "";
                                                            }

                                                            echo '<option value="' . $bulan . '" ' . $selected . '>' . $nama_bulan . '</option>';
                                                        }
                                                        ?>
                                                    </select>&nbsp;&nbsp;

                                                    <select name="periode_tahun" id="periode_tahun"
                                                            class="form-control form-control-custom">
                                                        <option value="">Tahun...</option>
                                                        <?php
                                                        for ($y = date("Y"); $y >= (date("Y") - 4); $y--) {

                                                            if (isset($_GET['periode_tahun']) && $_GET['periode_tahun'] == $y) {
                                                                $selected = "selected";
                                                            } else {
                                                                $selected = "";
                                                            }

                                                            echo '<option value="' . $y . '" ' . $selected . '>' . $y . '</option>';
                                                        }
                                                        ?>
                                                    </select>&nbsp;&nbsp;

                                                    <input type="hidden" name="page" value="bank_mandiri">
                                                    <button type="submit" class="btn btn-success" name="go">Go</button>
                                                </form>&nbsp;
                                                <form action="" method="POST" class="form-custom">
                                                    <input type="hidden" name="page" value="bank_mandiri">
                                                    <input type="hidden" name="lokasi_dana" value="Bank Mandiri">
                                                    <button type="submit" data-placement="left" title="Update Saldo"
                                                            class="btn btn-danger" name="update_saldo"><i
                                                                class="fa fa-dollar"></i>&nbsp;&nbsp;Update Saldo
                                                    </button>
                                                </form>

                                                <?php
                                                if (isset($_POST['update_saldo'])) {
                                                    $lokasi_dana = $connection->conn->real_escape_string($_POST['lokasi_dana']);
                                                    $jumlah_saldo = $connection->conn->real_escape_string($_POST['jumlah_saldo']);

                                                    $bankmandiri->update_saldo($periode_bulan, $periode_tahun, $lokasi_dana);
                                                    header("location: index.php?page=bank_mandiri");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tambah Data area Start-->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button type="button" data-placement="left" title="Tambah Data"
                                            class="btn breadcomb-report" data-toggle="modal" data-target="#tambah"><i
                                                class="fa fa-plus-circle"></i>&nbsp;&nbsp;Tambah Data
                                    </button>
                                </div>
                                <div class="modal fade" id="tambah" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title" text-align="center">Tambah Transaksi: Bank
                                                    Mandiri</h4> <br/>
                                            </div>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <table class="table table-sc-ex">
                                                        <tbody>
                                                        <tr>
                                                            <td><label class="control-label"
                                                                       for="no_voucher">Voucher</label></td>
                                                            <td style="width: 1%">:</td>
                                                            <td><input type="text" name="no_voucher"
                                                                       class="form-control" id="no_voucher" required>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label"
                                                                       for="tanggal">Tanggal</label></td>
                                                            <td style="width: 1%">:</td>
                                                            <td><input type="date" name="tanggal" class="form-control"
                                                                       id="tanggal" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label"
                                                                       for="deskripsi">Deskripsi</label></td>
                                                            <td style="width: 1%">:</td>
                                                            <td><input type="text" name="deskripsi" class="form-control"
                                                                       id="deskripsi" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label" for="jenis">Jenis</label>
                                                            </td>
                                                            <td style="width: 1%">:</td>
                                                            <td>
                                                                <select name="jenis" id="jenis"
                                                                        class="form-control form-control-custom" required>
                                                                    <option value="">Pilih...</option>
                                                                    <option value="Debit">Debit</option>
                                                                    <option value="Kredit">Kredit</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label" for="jumlah">Jumlah</label>
                                                            </td>
                                                            <td style="width: 1%">:</td>
                                                            <td><input type="number" name="jumlah" class="form-control"
                                                                       id="jumlah" required></td>
                                                            <input type="hidden" name="lokasi_dana" class="form-control"
                                                                   id="lokasi_dana" value="Bank Mandiri">
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label" for="kwitansi_pendukung">Kwitansi</label>
                                                            </td>
                                                            <td style="width: 1%">:</td>
                                                            <td><input type="file" name="kwitansi_pendukung"
                                                                       class="form-control" id="kwitansi_pendukung">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger">Reset</button>
                                                    <button type="submit" class="btn btn-default" name="tambah">Simpan
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                            if (isset($_POST['tambah'])) {
                                                $no_voucher = $connection->conn->real_escape_string($_POST['no_voucher']);
                                                $tanggal = $connection->conn->real_escape_string($_POST['tanggal']);
                                                $deskripsi = $connection->conn->real_escape_string($_POST['deskripsi']);
                                                $jenis = $connection->conn->real_escape_string($_POST['jenis']);
                                                $jumlah = $connection->conn->real_escape_string($_POST['jumlah']);
                                                $lokasi_dana = $connection->conn->real_escape_string($_POST['lokasi_dana']);

                                                $extensi = explode(".", $_FILES['kwitansi_pendukung']['name']);
                                                $kwitansi_pendukung = "Kwitansi-" . round(microtime(true)) . "." . end($extensi);
                                                $sumber = $_FILES['kwitansi_pendukung']['tmp_name'];

                                                $upload = move_uploaded_file($sumber, "../../assets/img/kwitansi/" . $kwitansi_pendukung);
                                                if ($upload) {
                                                    $bankmandiri->tambah($no_voucher, $tanggal, $deskripsi, $jenis, $jumlah, $lokasi_dana, $kwitansi_pendukung);
                                                    header("location: index.php?page=bank_mandiri");
                                                } else {
                                                    echo "<script>alert('Gagal mengunggah gambar :(')</script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tambah Data area End-->
                        <!-- Edit Data area Start-->
                        <div class="modal fade" id="edit" role="dialog">
                            <div class="modal-dialog modals-default">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" text-align="center">Edit Transaksi: Bank Mandiri</h4>
                                        <br/>
                                    </div>
                                    <form id="form" enctype="multipart/form-data">
                                        <div class="modal-body" id="modal_edit">
                                            <table class="table table-sc-ex">
                                                <tbody>
                                                <tr>
                                                    <input type="hidden" id="id_transaksi" name="id_transaksi">
                                                    <td><label class="control-label" for="no_voucher">Voucher</label>
                                                    </td>
                                                    <td style="width: 1%">:</td>
                                                    <td><input type="text" name="no_voucher" class="form-control"
                                                               id="no_voucher" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="control-label" for="tanggal">Tanggal</label></td>
                                                    <td style="width: 1%">:</td>
                                                    <td><input type="date" name="tanggal" class="form-control"
                                                               id="tanggal" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="control-label" for="deskripsi">Deskripsi</label>
                                                    </td>
                                                    <td style="width: 1%">:</td>
                                                    <td><input type="text" name="deskripsi" class="form-control"
                                                               id="deskripsi" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="control-label" for="jenis">Jenis</label></td>
                                                    <td style="width: 1%">:</td>
                                                    <td>
                                                        <select name="jenis" id="jenis"
                                                                class="form-control form-control-custom" required>
                                                            <option value="">Pilih...</option>
                                                            <option value="Debit">Debit</option>
                                                            <option value="Kredit">Kredit</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label class="control-label" for="jumlah">Jumlah</label></td>
                                                    <td style="width: 1%">:</td>
                                                    <td><input type="number" name="jumlah" class="form-control"
                                                               id="jumlah" required></td>
                                                    <input type="hidden" name="lokasi_dana" class="form-control"
                                                           id="lokasi_dana" value="Bank Mandiri">
                                                </tr>
                                                <tr>
                                                    <td><label class="control-label"
                                                               for="kwitansi_pendukung">Kwitansi</label></td>
                                                    <td style="width: 1%">:</td>
                                                    <td>
                                                        <div style="padding-bottom:5px">
                                                            <img src="" width="80px" id="pict">
                                                        </div>
                                                        <input type="file" name="kwitansi_pendukung"
                                                               class="form-control" id="kwitansi_pendukung">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" name="edit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
                            <script type="text/javascript">
                                $(document).on("click", "#edit_bank_mandiri", function () {
                                    var j_id_transaksi = $(this).data('id_transaksi');
                                    var j_no_voucher = $(this).data('no_voucher');
                                    var j_tanggal = $(this).data('tanggal');
                                    var j_deskripsi = $(this).data('deskripsi');
                                    var j_jenis = $(this).data('jenis');
                                    var j_jumlah = $(this).data('jumlah');
                                    var j_lokasi_dana = $(this).data('lokasi_dana');
                                    var j_kwitansi_pendukung = $(this).data('kwitansi_pendukung');
                                    $("#modal_edit #id_transaksi").val(j_id_transaksi);
                                    $("#modal_edit #no_voucher").val(j_no_voucher);
                                    $("#modal_edit #deskripsi").val(j_deskripsi);
                                    $("#modal_edit #tanggal").val(j_tanggal);
                                    $("#modal_edit #jenis").val(j_jenis);
                                    $("#modal_edit #jumlah").val(j_jumlah);
                                    $("#modal_edit #lokasi_dana").val(j_lokasi_dana);
                                    $("#modal_edit #pict").attr("src", "../../assets/img/kwitansi/" + j_kwitansi_pendukung);
                                });

                                $(document).ready(function (e) {
                                    $("#form").on("submit", (function (e) {
                                        e.preventDefault();
                                        $.ajax({
                                            url: '../../models/admin/proses_edit_bank_mandiri.php',
                                            type: 'POST',
                                            data: new FormData(this),
                                            contentType: false,
                                            cache: false,
                                            processData: false,
                                            success: function (msg) {
                                                $('.table').html(msg);
                                            }
                                        });
                                    }));
                                })
                            </script>
                            <!-- Edit Data area End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Data Transaksi <font color=#0066ff>Bank Mandiri</font></h2>
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Voucher</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Kwitansi</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                $tampil = $bankmandiri->tampil();
                                while ($data = $tampil->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data->no_voucher; ?></td>
                                        <td><?php echo $data->tanggal; ?></td>
                                        <td><?php echo $data->deskripsi; ?></td>
                                        <td><?php echo $data->jenis; ?></td>
                                        <td><?php echo number_format($data->jumlah, 0, ",", "."); ?></td>
                                        <td>
                                            <button type="button" title="Lihat kwitansi" class="btn btn-info btn-xs"
                                                    data-toggle="modal"
                                                    data-target="#lihatkwitansi<?= $data->id_transaksi; ?>"><i
                                                        class="fa fa-eye"></i></button>
                                            <div class="modal fade" id="lihatkwitansi<?= $data->id_transaksi; ?>"
                                                 role="dialog">
                                                <div class="modal-dialog modals-default">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" align="middle">
                                                            <img src="../../assets/img/kwitansi/<?php echo $data->kwitansi_pendukung; ?>"
                                                                 alt="Kwitansi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a id="edit_bank_mandiri" data-toggle="modal" data-target="#edit"
                                               data-id_transaksi="<?php echo $data->id_transaksi; ?>"
                                               data-no_voucher="<?php echo $data->no_voucher; ?>"
                                               data-tanggal="<?php echo $data->tanggal; ?>"
                                               data-deskripsi="<?php echo $data->deskripsi; ?>"
                                               data-jenis="<?php echo $data->jenis; ?>"
                                               data-jumlah="<?php echo $data->jumlah; ?>"
                                               data-lokasi_dana="<?php echo $data->lokasi_dana; ?>"
                                               data-kwitansi_pendukung="<?php echo $data->kwitansi_pendukung; ?>">
                                                <button class="btn btn-warning btn-xs" title="Edit data"><i
                                                            class="fa fa-edit"></i></button>
                                            </a>
                                            <a href="?page=bank_mandiri&act=del&id=<?php echo $data->id_transaksi; ?>"
                                               onclick="return confirm('Hapus transaksi <?php echo $data->no_voucher; ?>?')">
                                                <button class="btn btn-danger btn-xs" title="Hapus data"><i
                                                            class="fa fa-trash-o"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Voucher</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Jenis</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Kwitansi</th>
                                    <th>Opsi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

    <?php
} else if (@$_GET['act'] == 'del') {
    $kwitansi_awal = $bankmandiri->tampil($_GET['id'])->fetch_object()->kwitansi_pendukung;
    unlink("../../assets/img/kwitansi/" . $kwitansi_awal);

    $bankmandiri->hapus($_GET['id']);
    header("location: ?page=bank_mandiri");
}
?>