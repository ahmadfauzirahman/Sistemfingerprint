<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 27/10/18
 * Time: 14.32
 */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <form action="" role="form">
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-lg-2">Nip</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?= $this->session->get('nip') ?>" readonly class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-lg-2">Nama Tenaga Kerja</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?= $this->session->get('namatenagakerja') ?>"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-lg-2">Hak Akses</label>
                        <div class="col-lg-10">
                            <input type="text" name="hak_akses" readonly value="<?= $this->session->get('hak') ?>"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
