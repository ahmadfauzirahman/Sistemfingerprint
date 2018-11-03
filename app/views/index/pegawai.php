<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 29/08/18
 * Time: 13:45
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
                    <th>Nip</th>
                    <th>Password</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data as $datum): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $datum->nip ?></td>
                        <td><?= $datum->password ?></td>
                        <td><?= $datum->namatenagakerja ?></td>
                        <td><?= $datum->hak_akses ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
