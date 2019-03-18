<?php
  /**
   * Plugin Name: Loan Calculator
   * Description: Loan Calculator
   */

  function loan_calculator() {
    $scripts_str = '<app-loan-calculator></app-loan-calculator>';
    // development start
    // angular is built in development env (npm run build)
    // $scripts = array('runtime.js', 'es2015-polyfills.js', 'polyfills.js', 'styles.js', 'vendor.js', 'main.js');
    // $dist_path = 'LoanCalculator/dist/LoanCalculator';
    // foreach ($scripts as $script) {
    //   $scripts_str = $scripts_str."<script src='{$dist_path}/$script'></script>";
    // }
    // return $scripts_str;
    // development end

    // production start
    // angular is build in prod env (npm run build:prod)
    $scripts = array('runtime.js', 'es2015-polyfills.js', 'polyfills.js', 'main.js');
    $styles = array('styles.css');
    $dist_path = 'LoanCalculator/dist/LoanCalculator';
    foreach ($scripts as $script) {
      $scripts_str = $scripts_str."<script src='{$dist_path}/$script'></script>";
    }
    foreach ($styles as $style) {
      $scripts_str = $scripts_str."<link rel='stylesheet' type='text/css' href='{$dist_path}/$style'>";
    }
    return $scripts_str;
    // production end
  }
  add_shortcode('loan_calculator', 'loan_calculator');