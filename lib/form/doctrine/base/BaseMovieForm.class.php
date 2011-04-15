<?php

/**
 * Movie form base class.
 *
 * @method Movie getObject() Returns the current form's model object
 *
 * @package    Watcher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMovieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'director_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Director'), 'add_empty' => false)),
      'genre_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'), 'add_empty' => false)),
      'year'         => new sfWidgetFormInputText(),
      'synopsis'     => new sfWidgetFormTextarea(),
      'image_link'   => new sfWidgetFormInputText(),
      'trailer_link' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'director_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Director'))),
      'genre_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Genre'))),
      'year'         => new sfValidatorInteger(),
      'synopsis'     => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'image_link'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'trailer_link' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Movie', 'column' => array('title'))),
        new sfValidatorDoctrineUnique(array('model' => 'Movie', 'column' => array('image_link'))),
        new sfValidatorDoctrineUnique(array('model' => 'Movie', 'column' => array('trailer_link'))),
      ))
    );

    $this->widgetSchema->setNameFormat('movie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Movie';
  }

}
