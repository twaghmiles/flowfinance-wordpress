<?php
  /**
   * Plugin Name: Loan Calculator
   * Description: Loan Calculator
   */

  function loan_calculator() {
    setcookie("TestCookie", "value");
    $scripts = array('runtime.js', 'es2015-polyfills.js', 'polyfills.js', 'styles.js', 'vendor.js', 'main.js');
    $dist_path = 'LoanCalculator/dist/LoanCalculator';
    $scripts_str = '<app-loan-calculator></app-loan-calculator>';
    foreach ($scripts as $script) {
      $scripts_str = $scripts_str."<script src='{$dist_path}/$script'></script>";
    }
    return $scripts_str;
  }
  add_shortcode('loan_calculator', 'loan_calculator');