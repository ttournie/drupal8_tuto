<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloWorldController.
 */

namespace Drupal\hello_world\Controller;
use Drupal\Core\Controller\ControllerBase;

/**
 * Controller routines for hello_world module routes.
 */
class HelloWorldController extends ControllerBase {

 /**
  * Return the 'Hello World' page.
  *
  * @return string
  *   A render array containing our 'Hello World' page content.
  */
  public function helloWorld() {
    $output = array();
    // get the sentence from onfig file.
    $sentence = \Drupal::config('hello.settings')->get('sentence');
    $output['hello_world'] = array(
      '#markup' => $sentence,
    );
    return $output;
  }
}
