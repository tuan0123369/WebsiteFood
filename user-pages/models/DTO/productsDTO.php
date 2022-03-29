<?php
class productsDTO
{
    private $categoryDTO;
    private $id;
    private $img;
    private $food_name;
    private $food_descripsion;
    private $price;

    public function __construct($id, $img, $food_name, $food_description, $price, $categoryDTO)
    {
        $this->id = $id;
        $this->img = $img;
        $this->food_name = $food_name;
        $this->food_descripsion = $food_description;
        $this->price = $price;
        $this->categoryDTO = $categoryDTO;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }


    /**
     * Get the value of food_name
     */
    public function getFood_name()
    {
        return $this->food_name;
    }

    /**
     * Set the value of food_name
     *
     * @return  self
     */
    public function setFood_name($food_name)
    {
        $this->food_name = $food_name;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
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
     * Get the value of id_cate
     */

    /**
     * Get the value of categoryDTO
     */
    public function getCategoryDTO()
    {
        return $this->categoryDTO;
    }

    /**
     * Set the value of categoryDTO
     *
     * @return  self
     */
    public function setCategoryDTO($categoryDTO)
    {
        $this->categoryDTO = $categoryDTO;

        return $this;
    }

    /**
     * Get the value of food_descripsion
     */ 
    public function getFood_descripsion()
    {
        return $this->food_descripsion;
    }

    /**
     * Set the value of food_descripsion
     *
     * @return  self
     */ 
    public function setFood_descripsion($food_descripsion)
    {
        $this->food_descripsion = $food_descripsion;

        return $this;
    }
}
