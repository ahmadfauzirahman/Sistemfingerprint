<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 11/09/18
 * Time: 11:54
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
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
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
                foreach ($data as $spls): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $spls->nip ?></td>
                        <td><?= Pegawai::findFirstByNip($spls->nip)->namaKtp ?></td>
                        <td><?= tanggal_indo($spls->tanggallembur) ?></td>
                        <td><?= $spls->jammulai ?></td>
                        <td><?= $spls->jamselesai ?></td>
                        <td><?= tanggal_indo($spls->tanggal_surat) ?></td>
                        <td><?= $spls->jabatan ?></td>
                        <td><?= $spls->jenislembur ?></td>
                        <td><?= $spls->keterangan ?></td>
                        <td><?= $spls->status ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
