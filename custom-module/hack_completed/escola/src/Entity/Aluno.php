<?php

namespace Drupal\escola\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the Aluno entity.
 *
 * @ContentEntityType(
 *   id = "aluno",
 *   label = @Translation("aluno"),
 *   bundle_label = @Translation("Aluno"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\escola\AlunoListBuilder",
 *
 *     "form" = {
 *       "default" = "Drupal\escola\Form\AlunoForm",
 *       "add" = "Drupal\escola\Form\AlunoForm",
 *       "edit" = "Drupal\escola\Form\AlunoForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *    "route_provider" = {
 *      "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *    }
 *   },
 *   base_table = "aluno",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "bundle" = "type"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/aluno/{aluno}",
 *     "add-page" = "/admin/structure/aluno/add",
 *     "edit-form" = "/admin/structure/aluno/{aluno}/edit",
 *     "delete-form" = "/admin/structure/aluno/{aluno}/delete",
 *     "collection" = "/admin/structure/aluno",
 *   }
 * )
 */
class Aluno extends ContentEntityBase implements AlunoInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getMatricula() {
    return $this->get('matricula')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setMatricula($matricula) {
    $this->set('matricula', $matricula);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getNome() {
    return $this->get('nome')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setNome($nome) {
    $this->set('nome', $nome);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCidade() {
    return $this->get('cidade')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCidade($cidade) {
    $this->set('cidade', $cidade);
    return $this;
  }

  /**
   * {@inheritDoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['matricula'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('Matricula'))
      ->setDescription(t('Matricula do Aluno.'))
      ->setSettings([
        'min' => 1,
        'max' => 10000,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'int',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number_unformatted',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['nome'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Nome'))
      ->setDescription(t('Nome do Aluno'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['cidade'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Cidade'))
      ->setDescription(t('Nome da Cidade'))
      ->setSettings([
        'max_length' => 100,
        'text_processing' => 0,
      ])
      ->setDefaultValue('');

    return $fields;
  }

}
