<?php

/**
 * @file
 * Contains \Drupal\hello_world\Plugin\Field\FieldFormatter\UserNameFormatter.
 */

namespace Drupal\hello_world\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'hello' formatter.
 *
 * @FieldFormatter(
 *   id = "hello",
 *   label = @Translation("hello"),
 *   description = @Translation("Display hello multiple time."),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class HelloFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    $options = parent::defaultSettings();

    $options['how_many_hello'] = 1;
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form = parent::settingsForm($form, $form_state);

    $form['how_many_hello'] = [
      '#type' => 'select',
      '#title' => $this->t('Select the number of hello'),
      '#options' => array(
         1 => 1,
         2 => 2,
         3 => 3,
       ),
      '#default_value' => $this->getSetting('how_many_hello'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = array('#markup' => '');
      for ($i=0; $i < $this->getSetting('how_many_hello'); $i++) {
        $elements[$delta]['#markup'] .= 'HELLO -';
      }
    }

    return $elements;
  }
}
