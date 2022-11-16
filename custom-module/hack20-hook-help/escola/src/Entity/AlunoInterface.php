<?php

namespace Drupal\escola\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Represents a Product entity.
 */
interface AlunoInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the Aluno name.
   *
   * @return string
   *   The Aluno name.
   */
  public function getNome();

  /**
   * Sets the Aluno name.
   *
   * @param string $name
   *   The product name.
   *
   * @return \Drupal\escola\Entity\AlunoInterface
   *   The called Product entity.
   */
  public function setNome($nome);


}
