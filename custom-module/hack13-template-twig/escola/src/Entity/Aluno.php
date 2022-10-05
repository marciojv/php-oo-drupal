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
 *   label = @Translation("Aluno"),
 *   bundle_label = @Translation("Aluno type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\escola\ProductListBuilder",
 *
 *     "form" = {
 *       "default" = "Drupal\products\Form\ProductForm",
 *       "add" = "Drupal\escola\Form\ProductForm",
 *       "edit" = "Drupal\escola\Form\ProductForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *    "route_provider" = {
 *      "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *    }
 *   },
 *   base_table = "escola_aluno",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "bundle" = "type"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/product/{product}",
 *     "add-form" = "/admin/structure/product/add/{product_type}",
 *     "add-page" = "/admin/structure/product/add",
 *     "edit-form" = "/admin/structure/product/{product}/edit",
 *     "delete-form" = "/admin/structure/product/{product}/delete",
 *     "collection" = "/admin/structure/product",
 *   },
 *   bundle_entity_type = "product_type",
 *   field_ui_base_route = "entity.product_type.edit_form"
 * )
 */
class Aluno extends ContentEntityBase implements AlunoInterface {

  use EntityChangedTrait;

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
   * {@inheritDoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['nome'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Nome'))
      ->setDescription(t('Nome do Aluno.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['matricula'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('matricula'))
      ->setDescription(t('Matricula do Aluno'))
      ->setSettings([
        'min' => 1,
        'max' => 10000,
      ])
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number_unformatted',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }
}

