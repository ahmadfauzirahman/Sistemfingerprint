<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 30/08/18
 * Time: 16:53
 */
?>
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
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data as $datum): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $datum->namapegawai ?></td>
                        <td><?= $datum->nippegawai ?></td>
                        <td><?= $datum->tanggal ?></td>
                        <td><?= $datum->hari ?></td>
                        <td><?= $datum->jabatan ?></td>
                    </tr>
                    <?php
                    $no++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
