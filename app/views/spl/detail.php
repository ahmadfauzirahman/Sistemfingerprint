<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 05/09/18
 * Time: 23:35
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
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h2>Surat Penunjukan Lembur Saya</h2>
            <hr>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th width="4%">No</th>
                    <th width="10%">Surat</th>
                    <th>Jabatan</th>
                    <th>Tanggal Lembur</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data

                as $spl): ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>
                        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#full-width-modal-<?= $spl->idSpl ?>">Lihat Surat
                        </button>
                    </td>
                    <td><?= $spl->jabatan ?></td>
                    <td><?= tanggal_indo($spl->tanggallembur) ?></td>
                    <td>
                        <?php if ($spl->status == 'Belum Konfirmasi'): ?>
                            <a href="<?= $this->url->get('spl/updatestatus/' . $spl->nip . "/" . $spl->idSpl) ?>"
                               class="btn btn-warning"><?= $spl->status ?></a>
                        <?php else: ?>
                            <label for="" class="label label-info"><?= $spl->status ?></label>
                        <?php endif; ?>
                    </td>
                </tr>
                <div id="full-width-modal-<?= $spl->idSpl ?>" class="modal fade" tabindex="-1" role="dialog"
                     aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                </button>
                                <h4 class="modal-title" id="full-width-modalLabel">Surat Penungasan Lembur</h4>
                            </div>
                            <div class="modal-body">
                                <div class="card-box">
                                    <h2 class="text-center">Kop</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <h2 class="text-center">Surat Perintah Lembur</h2>
                                    <hr>
                                    <h3 style="margin-left: 30px">Yang Bertanda Tangan Dibawah Ini :</h3>
                                    <h3 style="margin-left: 30px">Nama      : Ahmad Fauzi Rahman</h3>
                                    <h3 style="margin-left: 30px">Jabatan   : MTA</h3>
                                    <h2 class="text-center text-primary">Memerintahkan Kepada</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Save
                                changes
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <?php $no++;
        endforeach; ?>
        </tbody>
        </table>
    </div>
</div>