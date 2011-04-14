<?php

/**
 * BaseMovieRating
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $movie_id
 * @property float $aggregate
 * @property integer $votes
 * @property float $average
 * @property Movie $Movie
 * 
 * @method integer     getMovieId()   Returns the current record's "movie_id" value
 * @method float       getAggregate() Returns the current record's "aggregate" value
 * @method integer     getVotes()     Returns the current record's "votes" value
 * @method float       getAverage()   Returns the current record's "average" value
 * @method Movie       getMovie()     Returns the current record's "Movie" value
 * @method MovieRating setMovieId()   Sets the current record's "movie_id" value
 * @method MovieRating setAggregate() Sets the current record's "aggregate" value
 * @method MovieRating setVotes()     Sets the current record's "votes" value
 * @method MovieRating setAverage()   Sets the current record's "average" value
 * @method MovieRating setMovie()     Sets the current record's "Movie" value
 * 
 * @package    Watcher
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMovieRating extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('movie_rating');
        $this->hasColumn('movie_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('aggregate', 'float', null, array(
             'type' => 'float',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('votes', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('average', 'float', null, array(
             'type' => 'float',
             'default' => 0,
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Movie', array(
             'local' => 'movie_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}