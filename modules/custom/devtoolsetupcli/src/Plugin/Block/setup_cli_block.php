<?php

namespace Drupal\devtoolsetupcli\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'developer tools setup cli block' Block.
 *
 * @Block(
 *   id = "setupcli_block",
 *   admin_label = @Translation("developer tools setup cli block module"),
 *   category = @Translation("developer tools setup cli block module"),
 * )
 */
class setup_cli_block extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $database = \Drupal::database();

    
   // $query = $database->query("SELECT * FROM {config} " );

    $query = $database->query("SELECT * FROM {config} WHERE name = 'frontpageexploreproducts.settings'");  

    $result = $query->fetchAll();


    foreach($result as  $row){
        $id = $row->data;
       
      }
   $Da = unserialize($id) ;
      
      $getStartedLink_1 =  $Da['frontpageexploreproducts']['get_started'];

    return [
      '#theme' => 'dev_tool_setup_cli',
      '#dev_tool_setup_cli_array' => $getStartedLink_1 ,
    ];
  }

}