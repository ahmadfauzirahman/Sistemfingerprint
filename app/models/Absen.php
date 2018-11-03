<?php

class Absen extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idabsen;

    /**
     *
     * @var string
     */
    public $namapegawai;

    /**
     *
     * @var string
     */
    public $nippegawai;

    /**
     *
     * @var string
     */
    public $tanggal;

    /**
     *
     * @var string
     */
    public $hari;

    /**
     *
     * @var string
     */
    public $jabatan;

    /**
     *
     * @var string
     */
    public $gaji;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gaji");
        $this->setSource("absen");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'absen';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Absen[]|Absen|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Absen|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
