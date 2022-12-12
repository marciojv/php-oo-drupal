<?php

namespace Drupal\escola\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure form_simple settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'form_aluno_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['form_aluno.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['maximo_alunos'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Maximo de Alunos por Pagina'),
      '#default_value' => $this->config('form_aluno.settings')->get('maximo_alunos'),
    ];

    $form['cor_grid'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Cor da Grid de Alunos'),
      '#default_value' => $this->config('form_aluno.settings')->get('cor_grid'),
    ];


    $devaultValue = '';
    $dbValue = $this->config('form_aluno.settings')->get('cor_grid');
    empty($dbValue) ? $devaultValue = $this->config('form_aluno.settings')->get('cor_grid'): $devaultValue = 5;
   
    $form['cor_linha'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Cor da Linha de Alunos'),
      '#default_value' => $devaultValue, 
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    //if ($form_state->getValue('example') != 'example') {
    //  $form_state->setErrorByName('example', $this->t('The value is not correct.'));
    //}
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('form_aluno.settings')
      ->set('maximo_alunos', $form_state->getValue('maximo_alunos'))
      ->set('cor_grid', $form_state->getValue('cor_grid'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
