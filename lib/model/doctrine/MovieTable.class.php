<?php

/**
 * MovieTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MovieTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MovieTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Movie');
    }
}