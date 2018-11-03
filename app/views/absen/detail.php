<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 30/08/18
 * Time: 16:53
 */
function tanggal($tanggal)
{

    $day = date('D', strtotime($tanggal));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    return $dayList[$day];
}

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


?>
<div class="row">
    <div class="col-lg-2">
        <div class="card-box">
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#panel-modal">Isi
                Absen <span class="fa fa-plus"></span></button>
            <div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content p-0 b-0">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×
                                </button>
                                <h3 class="panel-title">Absen Manual</h3>
                            </div>
                            <div class="panel-body">
                                <form action="" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="">NIP</label>
                                        <input type="text" name="nip" class="form-control" readonly
                                               value="<?= $this->session->get('nip') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Pegawai</label>
                                        <input type="text" name="nama" class="form-control" readonly
                                               value="<?= $this->session->get('namatenagakerja') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Absen</label>
                                        <input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>">
                                        <input type="text" class="form-control" readonly
                                               placeholder="<?= tanggal_indo(date('Y-m-d')) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hari</label>
                                        <input type="text" name="hari" class="form-control" readonly
                                               value="<?= tanggal(date('Y-m-d')) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <input type="text" value="Hadir" name="keterangan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Isi Absen</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Nip Pegawai</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Jabatan</th>
                    <th>Gaji Hari Ini</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                $jumlahgaji = 0;
                foreach ($data as $datum): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $datum->namapegawai ?></td>
                        <td><?= $datum->nippegawai ?></td>
                        <td><?= tanggal_indo($datum->tanggal) ?></td>
                        <td><?= $datum->hari ?></td>
                        <td><?= $datum->jabatan ?></td>
                        <td>Rp,.<?= substr($datum->gaji, 0, 6) ?></td>
                    </tr>
                    <?php
                    $no++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Total Gaji : <?= $jumlahgaji ?></h2>
    </div>
</div>
