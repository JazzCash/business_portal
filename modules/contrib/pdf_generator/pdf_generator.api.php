<?php

/**
 * @file
 * Hooks and documentation related to pdf_generator module.
 */

/**
 * Alter Dompdf object before rendering.
 *
 * @param \Dompdf\Dompdf $dompdf
 *   Dompdf instance.
 */
function hook_mymodule_pdf_generator_pre_render_alter(\Dompdf\Dompdf &$dompdf) {
  // Allows other modules to alter the Dompdf instance before it is rendered.
}

/**
 * Alter Dompdf object after rendering.
 *
 * @param \Dompdf\Dompdf $dompdf
 *   Dompdf instance.
 */
function hook_mymodule_pdf_generator_post_render_alter(\Dompdf\Dompdf &$dompdf) {
  // Allows other modules to alter the Dompdf instance after it is rendered.
}
