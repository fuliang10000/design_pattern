<?php


namespace common\builder;


class Product
{
    protected $_type = '';
    protected $_size = '';
    protected $_color = '';
    protected $_cate = '';

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @param string $cate
     */
    public function setCate(string $cate)
    {
        $this->_cate = $cate;
    }
}