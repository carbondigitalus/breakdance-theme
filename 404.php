<?php
    // Include the header
    get_header();

    // Output the Breakdance template content dynamically
    if (class_exists('\Breakdance\DynamicData\Templates')) {
        $template = \Breakdance\DynamicData\Templates::getTemplateFor('404');
        if ($template) {
            echo do_shortcode('[breakdance id="' . $template->ID . '"]');
        } else {
            // Fallback content if no Breakdance template is found
            echo '<div class="custom-404-content">';
            echo '<h1>Page Not Found</h1>';
            echo '<p>Sorry, the page you are looking for does not exist. Please use the navigation or search to find what you are looking for.</p>';
            echo '</div>';
        }
    } else {
        // Fallback content if Breakdance is not available
        echo '<div class="custom-404-content">';
        echo '<h1>Page Not Found</h1>';
        echo '<p>Sorry, the page you are looking for does not exist. Please use the navigation or search to find what you are looking for.</p>';
        echo '</div>';
    }

    // Include the footer
    get_footer();