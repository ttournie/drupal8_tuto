<?php
/**
 * @file
 * Contains \Drupal\hello_world\Plugin\Block\HelloBlock.
 */

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 * )
 */
class HelloBlock extends BlockBase {

  /**
  * {@inheritdoc}
  */
  public function build() {
    $config = $this->getConfiguration();
    $hello_text = isset($config['hello_text']) ? $config['hello_text'] : '';

    // Load the current user.
    $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
    $name = $user->get('name')->value;

    return array(
      '#markup' => $hello_text . ' ' . $name,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    // Retrieve existing configuration for this block.
    $config = $this->getConfiguration();

    // Add a form field to the existing block configuration form.
    $form['hello_text'] = array(
      '#type' => 'textfield',
      '#title' => t('Hello text'),
      '#default_value' => isset($config['hello_text']) ? $config['hello_text'] : '',
    );
    return $form;
  }

 /**
  * {@inheritdoc}
  */
  public function blockSubmit($form, FormStateInterface $form_state) {
      // Save our custom settings when the form is submitted.
    $this->setConfigurationValue('hello_text', $form_state->getValue('hello_text'));
  }
}
