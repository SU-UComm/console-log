<?php
/**
 * Plugin Name: Console Log
 * Description: Provide a console_log() function to allow PHP to write to the browser's console.
 * Author: JB Christy
 * Author URI: https://www.stanford.edu/site
 * Text Domain: stanford
 * Version: 1.0
 * License: GPLv2
 */

namespace Stanford\ConsoleLog;

if ( !function_exists('console_log')) {
  /***
   * For each element in the $vars array, log the key (label) followed by the
   * value to the browser's console.
   *
   * Scalar values are emitted in the format
   *   key (value type): value
   * i.e. on the same line.
   *
   * Objects and arrays are emitted in the format
   *   key (value type):
   *   json-ified value
   * i.e. on separate lines, to allow easier viewing of the object in the console.
   * Note that the console always renders the json-ified element as an object.
   * Note the actual type of the element in PHP (array or object) after the label.
   *
   * @param array $vars - [ 'label' => value ]
   */
  function console_log( $vars ) {
    $log_style = "color:blue;";
    echo "<script>\n";
    foreach ( $vars as $name => $value ) {
      $type = gettype( $value );
      switch ( $type ) {
        case 'object':
        case 'array':
          echo "console.log( '%c{$name} ({$type}):', '{$log_style}');";
          echo "console.log( " . json_encode( $value ) . " );";
          break;
        default:
          echo "console.log( '%c{$name} ({$type}): {$value}', '{$log_style}');";
          break;
      }
    }
    echo "</script>\n";
  }
}
