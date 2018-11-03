<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 05/09/18
 * Time: 22:33
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

?>
<?php $this->flashSession->output() ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h2 class="right">Data SPL</h2>
            <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#panel-modal">Buat
                Penunjukan SPL <span class="fa fa-plus"></span></button>
            <hr>
            <div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content p-0 b-0">
                        <div class="panel panel-color panel-danger">
                            <div class="panel-heading">
                                <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×
                                </button>
                                <h3 class="panel-title">Pembuatan SPL</h3>
                            </div>
                            <div class="panel-body">
                                <form action="<?= $this->url->get('spl/splnew') ?>" method="post">
                                    <div class="form-group">
                                        <label for="">Nip Pegawai</label>
                                        <select name="nip" id="" class="form-control select2">
                                            <?php $data = Pegawai::find(['order' => "nip ASC"]);
                                            foreach ($data as $pegawai):
                                                ?>
                                                <option value="<?= $pegawai->nip ?>"><?= $pegawai->namaKtp ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lembur</label>
                                        <input type="text" class="form-control" name="tanggallembur"
                                               placeholder="mm/dd/yyyy"
                                               id="datepicker-autoclose">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="">Jam Mulai Lembur <span
                                                            class="fa fa-clock-o"></span></label>
                                                <div class="bootstrap-timepicker">
                                                    <input id="timepicker2" name="jammulai" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Jam Selesai Lembur <span
                                                            class="fa fa-clock-o"></span></label>
                                                <div class="bootstrap-timepicker">
                                                    <input id="timepicker4" name="jamselesai" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Lembur</label>
                                        <select name="jenislembur" id="" class="form-control select2">
                                            <option value="">Pilih</option>
                                            <option value="Lembur Mati">Lembur Mati</option>
                                            <option value="Lembur Hidup">Lembur Hidup</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan Lembur / Deskripsi Singkat</label>
                                        <textarea name="keterangan" id="" cols="30" rows="4"
                                                  class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block waves-effect" type="submit">Buat SPL
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Tanggal Lembur</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Tanggal Surat Dikeluarkan</th>
                    <th>Jabatan</th>
                    <th>Jenis Lembur</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($spl as $spls): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $spls->nip ?></td>
                        <td><?= tanggal_indo($spls->tanggallembur) ?></td>
                        <td><?= $spls->jammulai ?></td>
                        <td><?= $spls->jamselesai ?></td>
                        <td><?= tanggal_indo($spls->tanggal_surat) ?></td>
                        <td><?= $spls->jabatan ?></td>
                        <td><?= $spls->jenislembur ?></td>
                        <td><?= $spls->keterangan ?></td>
                        <td><?php
                            if ($spls->status == "Belum Konfirmasi") {
                                echo "<label class='label label-primary'>Belum Konfirmasi</label>";
                            } else {
                                echo "<label class='label label-info'>Sudah Dikonfirmasi</label>";

                            }
                            ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
