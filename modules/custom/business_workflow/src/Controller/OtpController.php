<?php

namespace Drupal\business_workflow\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class OtpController.
 */
class OtpController extends ControllerBase
{

  /**
   * Otp.
   *
   * @return string
   *   Return Hello string.
   */
  public function otpGenerate()
  {
    $data = $name = \Drupal::request()->request->all();
    $otpMobile = $this->generateNumericOTP(4);
    $otpMail = $this->generateNumericOTP(4);
    $_SESSION['otp-data'] = [
      'mobile' => $data['mobile'],
      'mail' => $data['mail'],
      'otpMobile' => $otpMobile,
      'otpMail' => $otpMail
    ];
    return new JsonResponse($_SESSION['otp-data'], 200);
  }

  public function otpVerify()
  {
    $data = \Drupal::request()->request->all();
    if (!isset($_SESSION['otp-data'])) {
      return new JsonResponse(["msg" => "Otp not generated"], 403);
    }
    $mobile = $data['mobile'];
    $mail = $data['mail'];
    $otpMobile = $data['otpMobile'];
    $otpMail = $data['otpMail'];

    $otpMobileCheck = $otpMobile === $_SESSION['otp-data']['otpMobile'];
    $otpMailCheck = $otpMail === $_SESSION['otp-data']['otpMail'];
    $mobileCheck = $mobile === $_SESSION['otp-data']['mobile'];
    $mailCheck = $mail === $_SESSION['otp-data']['mail'];

    if (
      $otpMobileCheck  &&
      $otpMailCheck  &&
      $mobileCheck  &&
      $mailCheck
    ) {
      return new JsonResponse($_SESSION['otp-data'], 200);
    } else {
      return new JsonResponse([
        "msg" => "Verification failed",
        "fields" => [
          'otpMobileCheck' => $otpMobileCheck,
          'otpMailCheck' => $otpMailCheck,
          'mobileCheck' => $mobileCheck,
          'mailCheck' => $mailCheck
        ],
        "session" => $_SESSION['otp-data'],
        "data" => [
          $mobile, $mail, $otpMobile, $otpMail
        ]
      ], 403);
    }
  }
  // Function to generate OTP
  public function generateNumericOTP($n)
  {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
      $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }
    // Return result
    return $result;
  }
}
