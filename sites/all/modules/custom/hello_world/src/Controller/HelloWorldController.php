<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloWorldController.
 */

namespace Drupal\hello_world\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

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

  /**
   * Return the 'Hello World Node' page.
   *
   * @return string
   *   A render array containing the title of a node pased has argument.
   */
  public function helloWorldNode(NodeInterface $node) {
    $output = array();

    $output['hello_world'] = array(
      '#markup' => $node->getTitle(),
    );
    return $output;
  }

  /**
   * Return the 'Hello World Access Check' page.
   *
   * @return string
   *   A render array containing a message if you have access to the page.
   */
  public function helloWorldAccessCheck() {
    $output = array();

    $output['hello_world'] = array(
      '#markup' => $this->t('Congratulation you have access to this page.'),
    );
    return $output;
  }
}
