<?php

namespace Drupal\escola\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Represents a Product entity.
 */
interface AlunoInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets da Matricula do Aluno.
   *
   * @return int
   *   Matricula do Aluno
   */
  public function getMatricula();

  /**
   * Sets the Product name.
   *
   * @param int $matricula
   *   The product name.
   *
   * @return \Drupal\alunos\Entity\AlunoInterface
   *   The called Product entity.
   */
  public function setMatricula($matricula);

  /**
   * Gets the Product number.
   *
   * @return nome
   *   The product number.
   */
  public function getNome();

  /**
   * Sets the Product number.
   *
   * @param string $nome
   *   The product number.
   *
   * @return \Drupal\alunos\Entity\AlunoInterface
   *   The called Product entity.
   */
  public function setNome($nome);

  /**
   * Gets the Product remote ID.
   *
   * @return string
   *   The product remote ID.
   */
  public function getCidade();

  /**
   * Sets the Product remote ID.
   *
   * @param string $cidade
   *   The product remote ID.
   *
   * @return \Drupal\alunos\Entity\AlunoInterface
   *   The called Product entity.
   */
  public function setCidade($cidade);

}
