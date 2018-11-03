<?php

class RincianIuran extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idRincian;

    /**
     *
     * @var string
     */
    public $iuranjjk;

    /**
     *
     * @var string
     */
    public $iuranjkm;

    /**
     *
     * @var string
     */
    public $iuranjjktspensiunan;

    /**
     *
     * @var string
     */
    public $iuranjkmpensiunan;

    /**
     *
     * @var string
     */
    public $iuranjhttk;

    /**
     *
     * @var string
     */
    public $iuranjhtprsh;

    /**
     *
     * @var string
     */
    public $total_iuran;

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
        $this->setSource("rincian_iuran");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rincian_iuran';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RincianIuran[]|RincianIuran|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RincianIuran|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
