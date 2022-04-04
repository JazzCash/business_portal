<?php

namespace Drupal\business_workflow\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the business_workflow module.
 */
class OtpControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "business_workflow OtpController's controller functionality",
      'description' => 'Test Unit for module business_workflow and controller OtpController.',
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
   * Tests business_workflow functionality.
   */
  public function testOtpController() {
    // Check that the basic functions of module business_workflow.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
