<?php

/**
 * genre actions.
 *
 * @package    Watcher
 * @subpackage genre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class genreActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->genres = Doctrine_Core::getTable('Genre')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new GenreForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new GenreForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($genre = Doctrine_Core::getTable('Genre')->find(array($request->getParameter('id'))), sprintf('Object genre does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenreForm($genre);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($genre = Doctrine_Core::getTable('Genre')->find(array($request->getParameter('id'))), sprintf('Object genre does not exist (%s).', $request->getParameter('id')));
    $this->form = new GenreForm($genre);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($genre = Doctrine_Core::getTable('Genre')->find(array($request->getParameter('id'))), sprintf('Object genre does not exist (%s).', $request->getParameter('id')));
    $genre->delete();

    $this->redirect('genre/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $genre = $form->save();

      $this->redirect('genre/edit?id='.$genre->getId());
    }
  }
}
