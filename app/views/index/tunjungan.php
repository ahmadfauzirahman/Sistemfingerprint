<?php
/**
 * Created by PhpStorm.
 * User: ahmadfauzirahman
 * Date: 08/09/18
 * Time: 13:34
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <hr>
            <!--            <button class="btn btn-primary btn-lg btn-block">Tambah Data</button>-->
            <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Tambah Data
            </button>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">TAMBAH DATA</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nama Tunjangan</label>
                                    <input type="text" class="form-control" placeholder="Ex: TK/0" name="nama">
                                </div>
                                <div class=" form-group">
                                    <label for="">Jumlah Tunjangan</label>
                                    <input type="text" class="form-control" placeholder="Ex: 200000"
                                           name="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="">Status Aktif</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <hr>
            <?php $this->flashSession->output() ?>
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tunjangan</th>
                    <th>Jumlah Tunjangan</th>
                    <th>Status</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                foreach ($data as $tunjangan): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $tunjangan->namatunjangan ?></td>
                        <td><?= $tunjangan->jumlahtunjangan ?></td>
                        <td><?= $tunjangan->status ?></td>
                        <td>
                            <button class="btn btn-danger btn-block" data-toggle="modal"
                                    data-target="#myModal-<?= $tunjangan->idtunjangan ?>">
                                Edit Data
                            </button>
                        </td>
                        <div id="myModal-<?= $tunjangan->idtunjangan ?>" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel-<?= $tunjangan->idtunjangan ?>"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel-<?= $tunjangan->idtunjangan ?>">EDIT
                                            DATA</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= $this->url->get('index/edittunjangan') ?>" method="post">
                                            <input type="hidden" value="<?= $tunjangan->idtunjangan ?>" name="id">
                                            <div class="form-group">
                                                <label for="">Nama Tunjangan</label>
                                                <input type="text" class="form-control" placeholder="Ex: TK/0"
                                                       name="nama" value="<?= $tunjangan->namatunjangan ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label for="">Jumlah Tunjangan</label>
                                                <input type="text" class="form-control" placeholder="Ex: 200000"
                                                       name="jumlah" value="<?= $tunjangan->jumlahtunjangan ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Status Aktif</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                        </button>
                                    </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
