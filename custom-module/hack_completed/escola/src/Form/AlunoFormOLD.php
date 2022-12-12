<?php

namespace Drupal\escola\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class AlunoForm extends FormBase {
  /**
   * {@inheritdoc}
   */

  public function getFormId() {
      return 'aluno_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
      $form['aluno_nome'] = array(
        '#type' => 'textfield',
        '#title' => t('Nome:'),
        '#required' => TRUE,
      );
      $form['aluno_cidade'] = array(
        '#type' => 'textfield',
        '#title' => t('Cidade:'),
        '#required' => TRUE,
      );
 
      $form['actions']['#type'] = 'actions';
      $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('save'),
        '#button_type' => 'primary',
      );

      return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
      if(strlen($form_state->getValue('aluno_nome')) < 3) {
        $form_state->setErrorByName('aluno_nome', $this->t('O nome do aluno deve ter mais que 3 caracteres'));
      }
      if(strlen($form_state->getValue('aluno_cidade')) < 4) {
        $form_state->setErrorByName('aluno_cidade', $this->t('A cidade deve ter mais que 4 caracteres'));
      }
    }

  public function submitForm(array &$form, FormStateInterface $form_state) {

      \Drupal::messenger()->addMessage(t("O Aluno foi cadastrado:"));
  	  foreach ($form_state->getValues() as $key => $value) {
	    \Drupal::messenger()->addMessage($key . ': ' . $value);
          }

     // parent::submitForm($form, $form_state);
    }

}
