<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 07/09/18
 * Time: 11:22
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success fade in m-b-0">

            <h2>Gaji Pokok akan dipotong dengan Rincian Iuran Tenaga Kerja, BPJS</h2>
            <p>1. Seperti, IURAN JKK (0,89%), IURAN JKM (0,30%), IURAN PENSIUNAN JK(2%), IURAN PENSIUNAN TK(1%),IURAN
                JHT TK
                (2%), IURAN JHT PRSH (3,70%)</p>
            <p>2. TK (1%), PRSH (4%) biaya Kesahatan</p>
        </div>
        <br>
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
