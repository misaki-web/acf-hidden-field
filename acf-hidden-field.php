<?php

/**
 * Plugin Name: ACF Hidden Field
 * Description: New hidden input field type for ACF
 * Text Domain: acf-hidden-field
 * Author: Misaki F.
 * Version: 1.0.0
 */

namespace AcfHiddenField;

if (!defined('ABSPATH')) {
	return;
}

################################################################################
# @title Constants
################################################################################

define('ACF_HIDDEN_FIELD_VERSION', '1.0.0');

################################################################################
# @title Inclusions
################################################################################

require_once(__DIR__ . '/includes/init.php');
require_once(__DIR__ . '/includes/plugin-update-checker/plugin-update-checker.php');

################################################################################
# @title Update checker
################################################################################

$update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
	'https://github.com/misaki-web/acf-hidden-field',
	__FILE__,
	'acf-hidden-field'
);
$update_checker->getVcsApi()->enableReleaseAssets();
