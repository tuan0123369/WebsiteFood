<?php

class categoriesDTO
{
    private $id;
    private $category_name;

    public function __construct($id, $catergory_name)
    {
        $this->id = $id;
        $this->category_name = $catergory_name;
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
     * Get the value of category_name
     */
    public function getCategory_name()
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */
    public function setCategory_name($category_name)
    {
        $this->category_name = $category_name;

        return $this;
    }
}
