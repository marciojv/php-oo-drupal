<?php

namespace Drupal\escola\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller para o modulo Escola.
 */
class EscolaController extends ControllerBase {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * EscolaController constructor.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }

  /**
   * Renderiza uma tabela com alunos.
   *
   * @return array
   *   list alunos
   */
  public function alunos() {
    // Numero do itens por pagina.
    $limit = 5;
    $query = $this->database->select('escola_aluno', 'p')
      ->fields('p')
      ->extend('\Drupal\Core\Database\Query\PagerSelectExtender')
      ->limit($limit);

    $result = $query->execute()->fetchAll();
    $header = [$this->t('nome')];
    $rows = [];

    foreach ($result as $row) {
      $rows[] = [
        $row->nome,
      ];
    }

    $build = [];
    $build[] = [
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    ];

    $build[] = [
      '#type' => 'pager',
    ];

    return $build;
  }

}
