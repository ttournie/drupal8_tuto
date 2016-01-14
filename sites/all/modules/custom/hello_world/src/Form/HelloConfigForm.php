<?php

/**
 * @file
 * Contains Drupal\hello_world\Form\HelloConfigForm.
 */

namespace Drupal\hello_world\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure locale settings for this site.
 */
class HelloConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hello_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['hello.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hello.settings');

    $form['hello_sentence'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Sentence to display'),
      '#default_value' => $config->get('sentence'),
      '#description' => $this->t('Sentece to display on the page'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('hello.settings')
      ->set('sentence', $form_state->getValue('hello_sentence'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
