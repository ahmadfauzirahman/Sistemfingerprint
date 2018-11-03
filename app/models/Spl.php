<?php

class Spl extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idSpl;

    /**
     *
     * @var integer
     */
    public $nip;

    /**
     *
     * @var string
     */
    public $tanggallembur;

    /**
     *
     * @var string
     */
    public $jammulai;

    /**
     *
     * @var string
     */
    public $jamselesai;

    /**
     *
     * @var string
     */
    public $tanggal_surat;

    /**
     *
     * @var string
     */
    public $jabatan;

    /**
     *
     * @var string
     */
    public $jenislembur;

    /**
     *
     * @var string
     */
    public $keterangan;

    /**
     *
     * @var string
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gaji");
        $this->setSource("spl");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'spl';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Spl[]|Spl|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Spl|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
