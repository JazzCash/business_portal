<?php

namespace Drupal\user_profile\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a 'userprofileblock' block.
 *
 * @Block(
 *  id = "userprofileblock",
 *  admin_label = @Translation("User profile block"),
 * )
 */
class userprofileblock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $path = \Drupal::request()->getpathInfo();
    $arg  = explode('/', $path);
    $user_id =  $arg[3];

    $user = \Drupal\user\Entity\User::load($user_id);

    // user information


    
    $term_id = $user->field_company_type[0]->target_id;
    if ($term_id) {
      $company_type = \Drupal\taxonomy\Entity\Term::load($term_id)->get('name')->value;
    }

    $term_id2 = $user->field_status[0]->target_id;
    if ($term_id2) {
      $status = \Drupal\taxonomy\Entity\Term::load($term_id2)->get('name')->value;
    }
    if ($term_id2 == 56) {
      $status = 'Pending';
    }
    if ($term_id2 == 57) {
      $status = 'Pending';
    }

    $term_id3 = $user->field_account_status[0]->target_id;
    if ($term_id3) {
      $businessstatus = \Drupal\taxonomy\Entity\Term::load($term_id3)->get('name')->value;
    }
    if ($term_id3 == 56) {
      $businessstatus = 'Pending';
    }
    if ($term_id3 == 57) {
      $businessstatus = 'Pending';
    }

    $term_id4 = $user->field_account_bank_status[0]->target_id;
    if ($term_id4) {
      $bankstatus = \Drupal\taxonomy\Entity\Term::load($term_id4)->get('name')->value;
    }
    if ($term_id4 == 56) {
      $bankstatus = 'Pending';
    }
    if ($term_id4 == 57) {
      $bankstatus = 'Pending';
    }

    // end user information


    $paras = array_map(function ($p) {
      $business_name = $p->field_business_name->value;
      $business_mailing_address = $p->field_business_mailing_address->value;
      $phone = $p->field_phone->value;
      $fax_number = $p->field_fax_number->value;
      $email_address = $p->email_address->value;
      $nature_of_business   = $p->field_nature_of_business->value;
      $date_of_incorporation = $p->field_date_of_incorporation->value;
      $ntn_number = $p->field_ntn_number->value;
      $ntn_issuing_authority = $p->field_ntn_issuing_authority->value;
      $ntn_date_of_issue = $p->field_ntn_date_of_issue->value;
      $registration_date = $p->field_registration_date->value;
      $monthly_turnover = $p->field_monthly_turnover->value;
      $number_of_employees = $p->field_number_of_employees->value;
      $frequency_of_salary_disbur = $p->field_frequency_of_salary_disbur->value;
      $average_salary_amount = $p->field_average_salary_amount->value;
      return [
        'business_name' => $business_name,
        'business_mailing_address' => $business_mailing_address,
        'phone' => $phone,
        'fax_number' => $fax_number,
        'email_address' => $email_address,
        'nature_of_business' => $nature_of_business,
        'date_of_incorporation' => $date_of_incorporation,
        'ntn_number' => $ntn_number,
        'ntn_issuing_authority' => $ntn_issuing_authority,
        'ntn_date_of_issue' => $ntn_date_of_issue,
        'registration_date' => $registration_date,
        'monthly_turnover' => $monthly_turnover,
        'number_of_employees' => $number_of_employees,
        'frequency_of_salary_disbur' => $frequency_of_salary_disbur,
        'average_salary_amount' => $average_salary_amount,
      ];
    }, $user->field_business_information->referencedEntities());

    $d_paras = array_map(function ($d) {
      $full_name = $d->field_full_name->value;
      $official_email = $d->field_official_email->value;
      $contact_number = $d->field_contact_number->value;
      $title = $d->field_title->value;
      return [
        'full_name' => $full_name,
        'official_email' => $official_email,
        'contact_number' => $contact_number,
        'title' => $title,
      ];
    }, $user->field_directors_information->referencedEntities());

    $t_paras = array_map(function ($t) {
      $name = $t->field_full_name->value;
      $email = $t->field_official_email->value;
      $contact = $t->field_contact_number->value;
      return [
        'name' => $name,
        'email' => $email,
        'contact' => $contact,
      ];
    }, $user->field_directors_information->referencedEntities());

    $a_paras = array_map(function ($a) {
      $name = $a->field_full_name->value;
      $email = $a->field_official_email->value;
      $contact = $a->field_contact_number->value;
      $title = $a->field_title->value;
      return [
        'name' => $name,
        'email' => $email,
        'contact' => $contact,
        'title' => $title,
      ];
    }, $user->field_authorize_personnel_detail->referencedEntities());

    $s_paras = array_map(function ($s) {
      $bank_name = $s->field_select_bank->value;
      $account_holder_name = $s->field_account_holder_name->value;
      $bank_account_number = $s->field_bank_account_number->value;
      $account_holder_mobile_numb = $s->field_account_holder_mobile_numb->value;
      $account_holder_email = $s->field_account_holder_email->value;
      return [
        'bank_name' => $bank_name,
        'account_holder_name' => $account_holder_name,
        'bank_account_number' => $bank_account_number,
        'account_holder_mobile_numb' => $account_holder_mobile_numb,
        'account_holder_email' => $account_holder_email,
      ];
    }, $user->field_settlement_details->referencedEntities());

    // bank approver details
    $b_paras = array_map(function ($b) {
      $account_acc = $b->field_acc->value;
      $account_opened_by = $b->field_account_opened_by->value;
      $account_agent_id = $b->field_agent_id->value;
      $account_approved_by = $b->field_approved_by->value;
      $account_cbc_status = $b->field_cbc_status->value;
      $account_ecib_status = $b->field_ecib_status->value;
      $account_risk_category_1 = $b->field_risk_category_1->value;
      $account_supervised_by = $b->field_supervised_by->value;
      return [
        'Account' => $account_acc,
        'openedby' => $account_opened_by,
        'agentid' => $account_agent_id,
        'apprivedby' => $account_approved_by,
        'cbcstatus' => $account_cbc_status,
        'ecibstatus' => $account_ecib_status,
        'riskcategory' => $account_risk_category_1,
        'suppervisedby' => $account_supervised_by,
      ];
    }, $user->field_bank_approver_details->referencedEntities());
    // end bank approver details

    $files = $user->field_certificate_of_commencemen->referencedEntities();
    $file_urls = [];
    foreach ($files as $file) {
      $url = $file->url();
      $file_urls[] = $url;
    }

    $files_certificate_of_incorporati = $user->field_certificate_of_incorporati->referencedEntities();
    $file_urls_certificate_of_incorporati = [];
    foreach ($files_certificate_of_incorporati as $file) {
      $url = $file->url();
      $file_urls_certificate_of_incorporati[] = $url;
    }

    $files_level_2_branchless_banking = $user->field_level_2_branchless_banking->referencedEntities();
    $file_urls_files_level_2_branchless_banking = [];
    foreach ($files_level_2_branchless_banking as $file) {
      $url = $file->url();
      $file_urls_files_level_2_branchless_banking[] = $url;
    }

    $files_files_list_of_directors_on_form_ = $user->field_list_of_directors_on_form_->referencedEntities();
    $file_urls_files_list_of_directors_on_form_ = [];
    foreach ($files_files_list_of_directors_on_form_ as $file) {
      $url = $file->url();
      $file_urls_files_list_of_directors_on_form_[] = $url;
    }

    $files_memorandum_and_articles_of = $user->field_memorandum_and_articles_of->referencedEntities();
    $file_urls_memorandum_and_articles_of = [];
    foreach ($files_memorandum_and_articles_of as $file) {
      $url = $file->url();
      $file_urls_memorandum_and_articles_of[] = $url;
    }

    $files_ntn_certificate = $user->field_ntn_certificate->referencedEntities();
    $file_urls_ntn_certificate = [];
    foreach ($files_ntn_certificate as $file) {
      $url = $file->url();
      $file_urls_ntn_certificate[] = $url;
    }

    $files_photocopies_of_cnic_of_all = $user->field_photocopies_of_cnic_of_all->referencedEntities();
    $file_urls_photocopies_of_cnic_of_all = [];
    foreach ($files_photocopies_of_cnic_of_all as $file) {
      $url = $file->url();
      $file_urls_photocopies_of_cnic_of_all[] = $url;
    }

    $files_resolution_of_board_of_dir = $user->field_resolution_of_board_of_dir->referencedEntities();
    $file_urls_resolution_of_board_of_dir = [];
    foreach ($files_resolution_of_board_of_dir as $file) {
      $url = $file->url();
      $file_urls_resolution_of_board_of_dir[] = $url;
    }

    

    $lastUpdatedByUsers = $user->field_last_updated_by->referencedEntities();
    $lastUpdatedByUserName = "";
    if(isset($lastUpdatedByUsers[0]))
    {
      $lastUpdatedByUserName = $lastUpdatedByUsers[0]->getUsername();
    }



    $content[] = [
      'id' => $user->id(),
      'business' => $paras,
      'directors' => $d_paras,
      'technology' => $t_paras,
      'authorize' => $a_paras,
      'settelment' => $s_paras,
      'bank_approver_detail' => $b_paras,
      'Certificate_of_Commencement_of_Business' => $file_urls,
      'certificate_of_incorporati' => $file_urls_certificate_of_incorporati,
      'level_2_branchless_banking' => $file_urls_files_level_2_branchless_banking,
      'list_of_directors_on_form_' => $file_urls_files_list_of_directors_on_form_,
      'memorandum_and_articles_of' => $file_urls_memorandum_and_articles_of,
      'ntn_certificate' => $file_urls_ntn_certificate,
      'photocopies_of_cnic_of_all' => $file_urls_photocopies_of_cnic_of_all,
      'resolution_of_board_of_dir' => $file_urls_resolution_of_board_of_dir,
      'id' => $user->id(),
      "full_name" => $user->field_full_name->value,

      "email" => $user->mail->value,
      "status" => $status,
      "businessstatus" => $businessstatus,
      "bankstatus" => $bankstatus,
      "mobile" => $user->field_mobile_number->value,
      'image' => $user->user_picture->entity ? $user->user_picture->entity->url() : null,
      "company_type" => $company_type,
      'lastUpdatedByUserName' => $lastUpdatedByUserName
    ];



    $build['#attached']['library'][] = 'user_profile/userprofile';
    $build['user_profile'] = [
      '#theme' => 'user_profile_block',
      '#data' => [
        'content' => $content,
      ]
    ];
    // print_r($content);

    return $build;
  }
}
