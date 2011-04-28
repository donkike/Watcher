<?php

/**
 * Genre filter form base class.
 *
 * @package    Watcher
 * @subpackage filter
 * @author     Esteban Alarcón Ceballos, Enrique Arango Lyons, Daniel Múnera Sánchez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGenreFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genre_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genre';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'name' => 'Text',
    );
  }
}
