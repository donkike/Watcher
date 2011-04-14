<?php

/**
 * BaseGenre
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Movies
 * 
 * @method string              getName()   Returns the current record's "name" value
 * @method Doctrine_Collection getMovies() Returns the current record's "Movies" collection
 * @method Genre               setName()   Sets the current record's "name" value
 * @method Genre               setMovies() Sets the current record's "Movies" collection
 * 
 * @package    Watcher
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGenre extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('genre');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Movie as Movies', array(
             'local' => 'id',
             'foreign' => 'genre_id'));
    }
}