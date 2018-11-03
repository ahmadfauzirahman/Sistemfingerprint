<?php

class Bpjs extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idBpjs;

    /**
     *
     * @var string
     */
    public $tk;

    /**
     *
     * @var string
     */
    public $prsh;

    /**
     *
     * @var string
     */
    public $totalIuran;

    /**
     *
     * @var string
     */
    public $nip;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gaji");
        $this->setSource("bpjs");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'bpjs';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bpjs[]|Bpjs|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Bpjs|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
