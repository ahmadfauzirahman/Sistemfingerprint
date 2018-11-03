<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 28/08/18
 * Time: 20:41
 */
?>
<?php $this->flashSession->output(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Aktifkan User</th>
                    <th>Nip</th>
                    <th>Gol</th>
                    <th>Nama Ktp</th>
                    <th>Tanggal Mulai Kerja</th>
                    <th>Bulan Mulai</th>
                    <th>Bulan Berhenti</th>
                    <th>Nik</th>
                    <th>Npwp</th>
                    <th>Status</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Pendidikan</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Jabatan</th>

                    <th>Gaji Pokok</th>
                    <th>Total</th>
                    <th>No Rekening Mandiri</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data as $datum): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?php if (empty($datum->validasi)): ?>
                                <a href="<?= $this->url->get("pegawai/check/" . $datum->nip) ?>"
                                   class="btn btn-primary"><span
                                            class="fa fa-check"></span></a>
                            <?php else: ?>
                                <a href="<?= $this->url->get('pegawai/reset/' . $datum->nip) ?>"
                                   class="btn btn-warning"><span
                                            class="fa fa-arrows-alt"></span></a>
                            <?php endif; ?>
                        </td>
                        <td><?= $datum->nip ?></td>
                        <td><?= $datum->gol ?></td>

                        <td><?= $datum->namaKtp ?></td>
                        <td><?= $datum->tglMulaiKerja ?></td>
                        <td><?= $datum->bulanMulai ?></td>
                        <td><?= $datum->bulanBerhenti ?></td>
                        <td><?= $datum->nik ?></td>
                        <td><?= $datum->npwp ?></td>
                        <td><?= $datum->status ?></td>
                        <td><?= $datum->jenisKelamin ?></td>
                        <td><?= $datum->tempatTanggalLahir ?></td>
                        <td><?= $datum->pendidikan ?></td>
                        <td><?= $datum->alamat ?></td>
                        <td><?= $datum->agama ?></td>
                        <td><?= $datum->jabatan ?></td>
                        <td><?= $datum->gajiPokok ?></td>
                        <td><?= $datum->total ?></td>
                        <td><?= $datum->noRekeningMandiri ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>