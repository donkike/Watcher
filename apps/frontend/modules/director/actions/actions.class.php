<?php

/**
 * director actions.
 *
 * @package    Watcher
 * @subpackage director
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class directorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->directors = Doctrine_Core::getTable('Director')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DirectorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DirectorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($director = Doctrine_Core::getTable('Director')->find(array($request->getParameter('id'))), sprintf('Object director does not exist (%s).', $request->getParameter('id')));
    $this->form = new DirectorForm($director);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($director = Doctrine_Core::getTable('Director')->find(array($request->getParameter('id'))), sprintf('Object director does not exist (%s).', $request->getParameter('id')));
    $this->form = new DirectorForm($director);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($director = Doctrine_Core::getTable('Director')->find(array($request->getParameter('id'))), sprintf('Object director does not exist (%s).', $request->getParameter('id')));
    $director->delete();

    $this->redirect('director/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $director = $form->save();
      $this->redirect('movie_edit', $_SESSION['current_movie']);

    }
  }
}
