<?php

/**
 * MovieRating filter form base class.
 *
 * @package    Watcher
 * @subpackage filter
 * @author     Esteban Alarcón Ceballos, Enrique Arango Lyons, Daniel Múnera Sánchez
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMovieRatingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'movie_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Movie'), 'add_empty' => true)),
      'aggregate'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'votes'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'average'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'movie_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Movie'), 'column' => 'id')),
      'aggregate'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'votes'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'average'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('movie_rating_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MovieRating';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'movie_id'   => 'ForeignKey',
      'aggregate'  => 'Number',
      'votes'      => 'Number',
      'average'    => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
