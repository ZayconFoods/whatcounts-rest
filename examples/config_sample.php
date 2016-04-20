<?php
/**
 * Created by PhpStorm.
 * User: Mark Simonds
 * Date: 3/15/16
 * Time: 2:31 PM
 *
 * Copy to config.php and input your realm and password for testing
 */

error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once( dirname( __DIR__ ) . '/vendor/autoload.php');
require_once( dirname( __DIR__ ) . '/src/whatcounts_required.php' );

define( 'WC_REALM', '[YOUR_REALM]');
define( 'WC_PASSWORD', '[YOUR_PASSWORD]' );
