<?php

namespace Drupal\node_json_data\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ApiKeyForm extends ConfigFormBase {

 
  protected function getEditableConfigNames() {
    return [
      'node_json_data.apikey',
    ];
  }

  
  public function getFormId() {
    return 'api_key_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('node_json_data.apikey');
    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => t('Enter API Key'),
      '#maxlength' => 16,
      '#size' => 16,
    ];
    return parent::buildForm($form, $form_state);
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('node_json_data.apikey')
      ->set('Api_key', $form_state->getValue('api_key'))
      ->save();
  }

}
