<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 07/09/18
 * Time: 12:11
 */
function tanggal_indo($tanggal)
{
    $bulan = array(1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function hitungLembur($status, $jam)
{
}

?>

<div id="load">
    <div class="row">
        <div class="col-lg-12">
            <h1>PT SEMUNAI SAWIT PERKASA</h1>
            <div class="col-lg-12">
                <div class="card-box">
                    <HR>
                    <h3>Slip Gaji</h3>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Nama</th>
                            <td><b><?= $dataPegawai->namaKtp ?></b></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?= $dataPegawai->jabatan ?></td>
                        </tr>
                        <tr>
                            <th>Golongan / Kelas</th>
                            <td><?= $dataPegawai->gol ?></td>
                        </tr>
                        <tr>
                            <th>Gaji</th>
                            <td>Rp, <?= $dataPegawai->gajiPokok ?></td>
                        </tr>
                        <tr>
                            <th>Tunjangan Jabatan / Kelas</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Tunjangan Penempatan</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>THR</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Bonus</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Lain-Lain</th>
                            <td>-</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-box">
                    <h2><b><strong>RINCIAN IURAN TENAGA KERJA</strong></b></h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>IURAN JKK</th>
                            <td>Rp, <?= $v1 ?></td>
                        </tr>
                        <tr>
                            <th>IURAN JKM</th>
                            <td>Rp, <?= $v2 ?></td>
                        </tr>
                        <tr>
                            <th>IURAN PENSIUN 2% (MAX Rp. 7,703,500) PRSH</th>
                            <td>Rp, <?= $v3 ?></td>
                        </tr>
                        <tr>
                            <th>IURAN PENSIUN 1% (MAX Rp. 7,703,500) TK</th>
                            <td>Rp, <?= $v4 ?></td>
                        </tr>
                        <tr>
                            <th>IURAN JHT TK</th>
                            <td>Rp, <?= $v5 ?></td>
                        </tr>
                        <tr>
                            <th class="text-center">Total Semua</th>
                        </tr>
                        <tr>
                            <th>TOTAL IURAN</th>
                            <td>Rp, <?= $total ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-12" style="margin-bottom: -90px !important; mar">
                <div class="card-box">
                    <h2><b><strong>RINCIAN IURAN BPJS KESEHATAN</strong></b></h2>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>TK</th>
                            <th>Kesahatan 1</th>
                            <td>Rp,<?= $v7 ?></td>
                        </tr>
                        <tr>
                            <th>PRSH</th>
                            <th>KESEHATAN 4%</th>
                            <td>Rp,<?= $v8 ?></td>
                        </tr>
                        <tr>
                            <th>Total Iuran</th>
                            <th>KESEHATAN 5%</th>
                            <td><?= $totalbpsj ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">

                <div class="card-box">
                    <h2><b><strong>Data Lembur</strong></b></h2>
                    <hr>
                    <h2>Gaji Pegawai :Rp, <?= $gaji ?> / 173
                        = <?= $hasilLembur = substr(intval($gaji) / 137, 0, 5) ?></h2>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Lembur</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai Lembur</th>
                            <th>Jenis Lembur</th>
                            <th>Lama Jam Lembur</th>
                            <th>Upah Lembur</th>
                            <th>Point</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($dataSpl as $lembur): ?>
                            <tr>
                                <td>Lembur Ke - <?= $no ?></td>
                                <td><?= tanggal_indo($lembur->tanggallembur) ?></td>
                                <td><?= $lembur->jammulai ?></td>
                                <td><?= $lembur->jamselesai ?></td>
                                <td><?= $lembur->jenislembur ?></td>
                                <td>
                                    <?php
                                    $jammulai1 = explode(":", $lembur->jammulai)[0];
                                    $menitmulai1 = explode(":", $lembur->jammulai)[1];

                                    $jamselesai1 = explode(":", $lembur->jamselesai)[0];
                                    $menitmulai12 = explode(":", $lembur->jamselesai)[1];
                                    $hasil = (intval($jamselesai1) - intval($jammulai1)) * 60 + (intval($menitmulai2) - intval($menitmulai1));
                                    $hasil = $hasil / 60;
                                    echo $hasil = number_format($hasil, 2) . " Jam";
                                    ?>
                                </td>
                                <td>2000000</td>
                                <td></td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="memberModalLabel">Peraturan Lembur</h4>

                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <p style="font-size: 30px">1. Untuk lembur pada hari kerja, rate upah lembur adalah 1,5x upah sejam pada jam pertama
                            lembur
                            dan 2x upah sejam pada jam seterusnya</p>
                        <p style="font-size: 30px">2. Untuk lembur pada hari istirahat mingguan dan hari libur nasional:

                            a. Untuk perusahaan dengan 5 hari kerja, rate adalah 2x upah sejam untuk 8 jam pertama, 3x
                            upah
                            sejam untuk jam ke-9, dan 4x upah sejam untuk jam ke-10 dan ke-11
                            b. Untuk perusahaan dengan 6 hari kerja, rate adalah 2x upah sejam untuk 7 jam pertama, 3x
                            upah
                            sejam untuk jam ke-8, dan 4x upah sejam untuk jam ke-9 dan ke-10
                            c. Untuk hari libur yang jatuh pada hari kerja terpendek (misalnya Jumat), rate adalah 2x
                            upah
                            sejam untuk 5 jam pertama, 3x upah sejam pada jam ke-6, dan 4x upah sejam pada jam ke-7 dan
                            ke-8</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

