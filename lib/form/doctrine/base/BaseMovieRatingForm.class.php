<?php

/**
 * MovieRating form base class.
 *
 * @method MovieRating getObject() Returns the current form's model object
 *
 * @package    Watcher
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMovieRatingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'movie_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Movie'), 'add_empty' => false)),
      'aggregate'  => new sfWidgetFormInputText(),
      'votes'      => new sfWidgetFormInputText(),
      'average'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'movie_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Movie'))),
      'aggregate'  => new sfValidatorNumber(array('required' => false)),
      'votes'      => new sfValidatorInteger(array('required' => false)),
      'average'    => new sfValidatorNumber(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'MovieRating', 'column' => array('movie_id')))
    );

    $this->widgetSchema->setNameFormat('movie_rating[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MovieRating';
  }

}
