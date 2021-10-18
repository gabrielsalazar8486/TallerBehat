<?php

class Shelf
{
    private $prieceMap = array();
    public function __construct()
    {
    }

    public function setProductPriece($product, $cost)
    {
        $this->prieceMap[$product] = $cost;
    }

    public function getProductPriece($product)
    {
        return $this->prieceMap[$product];
    }
}