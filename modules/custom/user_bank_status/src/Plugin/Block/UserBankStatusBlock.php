<?php

namespace Drupal\user_bank_status\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a 'UserBankStatusBlock' block.
 *
 * @Block(
 *  id = "user_bank_status_block",
 *  admin_label = @Translation("User bank status block"),
 * )
 */
class UserBankStatusBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $uid = \Drupal::currentUser()->id();
    //load user by id
    $user = \Drupal\user\Entity\User::load($uid);

    $message = $user->field_message->value;
    $message_account_status = $user->field_account_status_message->value;
    $message_acount_bank_status_message = $user->field_account_bank_status_messag->value;

    $field_status = $user->field_status->getValue();
    $field_account_status = $user->field_account_status->getValue();
    $field_account_bank_status = $user->field_account_bank_status->getValue();

    $field_status_value = isset($field_status[0]['target_id']) ? $field_status[0]['target_id'] : '0';
    $field_account_status_value = isset($field_account_status[0]['target_id']) ? $field_account_status[0]['target_id'] : '0';
    $field_account_bank_status_value = isset($field_account_bank_status[0]['target_id']) ? $field_account_bank_status[0]['target_id'] : '0';

    $idsJoin = $field_status_value.','.$field_account_status_value.','.$field_account_bank_status_value;
    $url = Url::fromUserInput('/user-edit');
    $link =  Link::fromTextAndUrl(t('Update Profile'), $url)->toString()->__toString();
     


    $msgs = [
      "32,0,0" => "You are not approved yet",
      "32,57,57" => "You are not approved yet",
      "32,56,56" => "You are not approved yet",
      "32,32,57" => "You are not approved yet",
      "32,32,56" => "You are not approved yet",
      "32,32,0" => "You are not approved yet",
      "57,0,0" => "You are not approved yet",
      "57,57,0" => "You are not approved yet",
      "57,57,57" => "You are not approved yet",
      "56,56,56" => "You are not approved yet",
      
      "32,32,32" => "You are approved",
      
      "33,0,0" => "Rejected: ".$message." From account opening business team",
      "33,57,0" => "Rejected: ".$message." From account opening business team",
      "33,57,57" => "Rejected: ".$message." From account opening business team",
      "33,56,56" => "Rejected: ".$message." From account opening business team",
      "34,0,0" => "On hold: ".$message." From account opening business team",
      "34,57,0" => "On hold: ".$message." From account opening business team",
      "34,57,57" => "On hold: ".$message." From account opening business team",
      "34,56,56" => "On hold: ".$message." From account opening business team",
      "35,0,0" => $this->t("Discrepent: ".$message." From account opening business team $link"),
      "35,57,0" => $this->t("Discrepent: ".$message." From account opening business team $link"),
      "35,57,57" => $this->t("Discrepent: ".$message." From account opening business team $link"),
      "35,56,56" => $this->t("Discrepent: ".$message." From account opening business team $link"),
      
      "32,33,0" => "Rejected: ".$message_account_status." From business team approval",
      "32,33,57" => "Rejected: ".$message_account_status." From business team approval",
      "32,33,56" => "Rejected: ".$message_account_status." From business team approval",
      "32,34,0" => "On hold: ".$message_account_status." From business team approval",
      "32,34,57" => "On hold: ".$message_account_status." From business team approval",
      "32,34,56" => "On hold: ".$message_account_status." From business team approval",
      "32,35,0" => $this->t("Discrepent: ".$message_account_status." From business team approval $link"),
      "32,35,57" => $this->t("Discrepent: ".$message_account_status." From business team approval $link"),
      "32,35,56" => $this->t("Discrepent: ".$message_account_status." From business team approval $link"),
      
      "32,32,33" => "Rejected: ".$message_acount_bank_status_message." From Bank Approval",
      "32,32,34" => "On hold: ".$message_acount_bank_status_message." From Bank Approval",
      "32,32,35" => $this->t("Discrepent: ".$message_acount_bank_status_message." From Bank Approval $link"),
    
    ];
    $classes = [
      "32,32,32" => "alert alert-success",
    ];

    $msg = isset($msgs[$idsJoin]) ? $msgs[$idsJoin] : 'Not set';
    $class = isset($classes[$idsJoin]) ? $classes[$idsJoin] : 'alert alert-danger';
   
    // d_limit($idsJoin);

    // $msg .= ": ".$message;

    $build = [];
    $build['#theme'] = 'user_bank_status_block';
    $build['#data'] = [
      'msg' => $msg,
      'class' => $class,
    ];

    return $build;
  }

}
