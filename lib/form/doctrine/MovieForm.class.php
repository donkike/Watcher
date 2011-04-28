<?php

/**
 * Movie form.
 *
 * @package    Watcher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MovieForm extends BaseMovieForm
{
  public function configure()
  {
    unset($this->validatorSchema['created_at']);
    unset($this->validatorSchema['updated_at']);
    $this->validatorSchema->setOption('allow_extra_fields', true);
    $this->validatorSchema->setOption('filter_extra_fields', false);
    $this->widgetSchema['image_file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['image_file'] = new sfValidatorFile(array( 'required' => false ));
  }
  
  
  protected function doSave($con = null) {
    $upload = $this->getValue('image_file');
    if ($upload) {
      $filename = 'movie_image_'.sha1($upload->getOriginalName());
      $extension = $upload->getExtension($upload->getOriginalExtension());
      $filepath = sfConfig::get('sf_upload_dir').'/'.$filename.$extension;
      /*$oldfilepath = sfConfig::get('sf_upload_dir').'/'.$this->getObject()->getImageLink();
      if (file_exists($oldfilepath)) {
        unlink($oldfilepath);
      }*/
      $this->values['image_link'] = $filename.$extension;
      $upload->save($filepath);
    } 
    return parent::doSave($con);
  }
  
}
