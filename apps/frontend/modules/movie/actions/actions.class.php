<?php

/**
 * movie actions.
 *
 * @package    Watcher
 * @subpackage movie
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class movieActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->movies = Doctrine_Core::getTable('Movie')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->movie = Doctrine_Core::getTable('Movie')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->movie);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MovieForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MovieForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($movie = Doctrine_Core::getTable('Movie')->find(array($request->getParameter('id'))), sprintf('Object movie does not exist (%s).', $request->getParameter('id')));
    $this->form = new MovieForm($movie);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($movie = Doctrine_Core::getTable('Movie')->find(array($request->getParameter('id'))), sprintf('Object movie does not exist (%s).', $request->getParameter('id')));
    $this->form = new MovieForm($movie);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($movie = Doctrine_Core::getTable('Movie')->find(array($request->getParameter('id'))), sprintf('Object movie does not exist (%s).', $request->getParameter('id')));
    $movie->delete();

    $this->redirect('movie/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $movie = $form->save();
      $this->redirect('movie/show?id='.$movie->getId());
    }
  }
}
