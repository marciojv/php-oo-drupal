<?php

namespace Drupal\escola;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * EntityListBuilderInterface implementation responsible for the Product entities.
 */
class AlunoListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('id');
    $header['nome'] = $this->t('Nome');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\escola\Entity\Aluno */
    $row['id'] = $entity->id();
    $row['nome'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
