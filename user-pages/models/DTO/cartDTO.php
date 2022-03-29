<?php

class cartDTO
{
    private $id;
    private $id_user;
    private $id_product;

    public function __construct($id, $id_user, $id_product)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_product = $id_product;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_product
     */
    public function getId_product()
    {
        return $this->id_product;
    }

    /**
     * Set the value of id_product
     *
     * @return  self
     */
    public function setId_product($id_product)
    {
        $this->id_product = $id_product;

        return $this;
    }
}
