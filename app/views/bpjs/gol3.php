<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 11/09/18
 * Time: 11:44
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1></h1>
        <div class="card-box">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Upah</th>
                    <th>NPWP</th>
                    <th>Gol</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data as $pegawai): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $pegawai->namaKtp ?></td>
                        <td><?= $pegawai->nip ?></td>
                        <td><?= $pegawai->gajiPokok ?></td>
                        <td><?= $pegawai->npwp ?></td>
                        <td><?= $pegawai->gol ?></td>
                        <td><?= $pegawai->jabatan ?></td>
                        <td><a href="<?= $this->url->get('bpjs/gajidetail/' . $pegawai->nip) ?>" class="btn btn-info">Kelola
                                Data Gaji</a>
                        </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
