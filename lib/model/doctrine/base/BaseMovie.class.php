<?php

/**
 * BaseMovie
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property integer $director_id
 * @property integer $genre_id
 * @property integer $year
 * @property string $synopsis
 * @property string $image_link
 * @property string $trailer_link
 * @property MovieRating $MovieRating
 * @property Director $Director
 * @property Genre $Genre
 * 
 * @method string      getTitle()        Returns the current record's "title" value
 * @method integer     getDirectorId()   Returns the current record's "director_id" value
 * @method integer     getGenreId()      Returns the current record's "genre_id" value
 * @method integer     getYear()         Returns the current record's "year" value
 * @method string      getSynopsis()     Returns the current record's "synopsis" value
 * @method string      getImageLink()    Returns the current record's "image_link" value
 * @method string      getTrailerLink()  Returns the current record's "trailer_link" value
 * @method MovieRating getMovieRating()  Returns the current record's "MovieRating" value
 * @method Director    getDirector()     Returns the current record's "Director" value
 * @method Genre       getGenre()        Returns the current record's "Genre" value
 * @method Movie       setTitle()        Sets the current record's "title" value
 * @method Movie       setDirectorId()   Sets the current record's "director_id" value
 * @method Movie       setGenreId()      Sets the current record's "genre_id" value
 * @method Movie       setYear()         Sets the current record's "year" value
 * @method Movie       setSynopsis()     Sets the current record's "synopsis" value
 * @method Movie       setImageLink()    Sets the current record's "image_link" value
 * @method Movie       setTrailerLink()  Sets the current record's "trailer_link" value
 * @method Movie       setMovieRating()  Sets the current record's "MovieRating" value
 * @method Movie       setDirector()     Sets the current record's "Director" value
 * @method Movie       setGenre()        Sets the current record's "Genre" value
 * 
 * @package    Watcher
 * @subpackage model
 * @author     Esteban Alarcón Ceballos, Enrique Arango Lyons, Daniel Múnera Sánchez
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMovie extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('movie');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('director_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('genre_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('year', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('synopsis', 'string', 4000, array(
             'type' => 'string',
             'length' => 4000,
             ));
        $this->hasColumn('image_link', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('trailer_link', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MovieRating', array(
             'local' => 'id',
             'foreign' => 'movie_id'));

        $this->hasOne('Director', array(
             'local' => 'director_id',
             'foreign' => 'id'));

        $this->hasOne('Genre', array(
             'local' => 'genre_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}