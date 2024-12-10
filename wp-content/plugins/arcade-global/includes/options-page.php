<?php
/**
 * Generated Options Page
 */

/**
 * Registers an options page for the plugin in the WordPress admin menu.
 *
 * This function creates a menu item in the WordPress admin dashboard
 * that links to the plugin's settings page.
 */
function my_plugin_menu() {
    add_menu_page(
        'My Plugin Settings',      // Page title
        'Plugin Settings',         // Menu title
        'manage_options',          // Capability required to access the menu
        'my-plugin-settings',      // Slug used to identify the menu
        'my_plugin_options_page',  // Callback function to render the page content
        'dashicons-admin-generic'  // Icon for the menu
    );
}
add_action('admin_menu', 'my_plugin_menu');

/**
 * Renders the content of the plugin's options page.
 *
 * This function outputs the HTML for the options page,
 * including the form for saving plugin settings.
 */
function my_plugin_options_page() {
    ?>
    <div class="wrap">
        <h1>My Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_plugin_options_group'); // Generates the settings fields for the specified group
            do_settings_sections('my-plugin-settings'); // Outputs the settings sections
            submit_button(); // Displays the save button
            ?>
        </form>
    </div>
    <?php
}

/**
 * Registers settings, sections, and fields for the plugin.
 *
 * This function sets up the plugin's settings, adds a section to the options page,
 * and registers a field for showing or hiding an element.
 */
function my_plugin_settings() {
    // Register a settings group and the associated option
    register_setting('my_plugin_options_group', 'my_plugin_show_element');

    // Add a section to the settings page
    add_settings_section(
        'my_plugin_section', // Section ID
        'General Settings',  // Section title
        null,                // Callback for description (not used)
        'my-plugin-settings' // The settings page where the section will appear
    );

    // Add a field to the section (checkbox for showing the element)
    add_settings_field(
        'my_plugin_show_element',          // Field ID
        'Show Element',                    // Field label
        'my_plugin_show_element_callback', // Callback function to render the field
        'my-plugin-settings',              // The settings page
        'my_plugin_section'                // The section in which this field will appear
    );
}
add_action('admin_init', 'my_plugin_settings');

/**
 * Renders the "Show Element" checkbox on the options page.
 *
 * This callback function outputs a checkbox for enabling or disabling the display of an element.
 */
function my_plugin_show_element_callback() {
    // Retrieve the current value of the option
    $show_element = get_option('my_plugin_show_element');
    ?>
    <input type="checkbox" name="my_plugin_show_element" value="1" <?php checked(1, $show_element, true); ?> />
    <label for="my_plugin_show_element">Check to show the sidebar element</label>
    <p class="description"><?php esc_html_e( 'When the checkbox is checked, the sidebar will be hidden. Otherwise, the sidebar will be displayed.', 'arcade' ); ?></p>
    <?php
}

/**
 * Determines whether the element should be displayed.
 *
 * @return bool True if the element should be displayed, false otherwise.
 */
function my_plugin_display_element() {
    return (bool) get_option('my_plugin_show_element');
}
