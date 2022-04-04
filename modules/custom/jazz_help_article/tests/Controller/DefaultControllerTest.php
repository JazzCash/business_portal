<?php

namespace Drupal\jazz_help_article\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the jazz_help_article module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "jazz_help_article DefaultController's controller functionality",
      'description' => 'Test Unit for module jazz_help_article and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests jazz_help_article functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module jazz_help_article.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
