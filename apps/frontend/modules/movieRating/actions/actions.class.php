<?php

/**
 * movieRating actions.
 *
 * @package    Watcher
 * @subpackage movieRating
 * @author     Esteban Alarcón Ceballos, Enrique Arango Lyons, Daniel Múnera Sánchez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class movieRatingActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('movie', 'index');
  }
  
  public function executeRateMovie(sfWebRequest $request)
  {
    $movie= Doctrine_Core::getTable('Movie')->find(array($request->getParameter('movie_id')));
    $rating = $movie->getMovieRating();
    $rating->submitVote($request->getParameter('rate'));
    $rating->save();
  }
}
