<?php

// Theme setup function
if (!function_exists('breakdance_zero_theme_setup')) {
    function breakdance_zero_theme_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
    }
}

add_action('after_setup_theme', 'breakdance_zero_theme_setup');

// Admin notice if Breakdance is disabled
add_action('admin_notices', 'warn_if_breakdance_is_disabled');
function warn_if_breakdance_is_disabled()
{
    if (!defined('__BREAKDANCE_DIR__')) {
        ?>
        <div class="notice notice-error is-dismissible">
            <p>You're using Breakdance's Zero Theme but Breakdance is not enabled. This isn't supported.</p>
        </div>
        <?php
    }
}

// Breakdance Custom Elements
namespace BreakdanceCustomElements;

use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;

add_action('breakdance_loaded', function () {
    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/elements',
        'BreakdanceCustomElements',
        'element',
        'Custom Elements',
        false
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/macros',
        'BreakdanceCustomElements',
        'macro',
        'Custom Macros',
        false
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/presets',
        'BreakdanceCustomElements',
        'preset',
        'Custom Presets',
        false
    );
}, 9); // Register elements before loading them

