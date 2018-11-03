<?php

class Pegawai extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idPegawai;
    public $validasi;

    /**
     *
     * @var string
     */
    public $nip;

    /**
     *
     * @var string
     */
    public $namaKtp;

    /**
     *
     * @var string
     */
    public $tglMulaiKerja;

    /**
     *
     * @var string
     */
    public $bulanMulai;

    /**
     *
     * @var string
     */
    public $bulanBerhenti;

    /**
     *
     * @var string
     */
    public $nik;

    /**
     *
     * @var string
     */
    public $npwp;

    /**
     *
     * @var string
     */
    public $status;

    /**
     *
     * @var string
     */
    public $jenisKelamin;

    /**
     *
     * @var string
     */
    public $tempatTanggalLahir;

    /**
     *
     * @var string
     */
    public $pendidikan;

    /**
     *
     * @var string
     */
    public $alamat;

    /**
     *
     * @var string
     */
    public $agama;

    /**
     *
     * @var string
     */
    public $jabatan;

    /**
     *
     * @var string
     */
    public $gol;

    /**
     *
     * @var string
     */
    public $gajiPokok;

    /**
     *
     * @var string
     */
    public $total;

    /**
     *
     * @var string
     */
    public $noRekeningMandiri;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gaji");
        $this->setSource("pegawai");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pegawai';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pegawai[]|Pegawai|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pegawai|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
