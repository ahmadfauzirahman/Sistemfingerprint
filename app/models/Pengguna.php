<?php

class Pengguna extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idPengguna;

    /**
     *
     * @var string
     */
    public $nip;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $namatenagakerja;

    /**
     *
     * @var string
     */
    public $hak_akses;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gaji");
        $this->setSource("pengguna");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'pengguna';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pengguna[]|Pengguna|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pengguna|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
