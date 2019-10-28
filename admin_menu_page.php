<?php
/**
*
*   This File contains all of the settings page code
*   This file will store all of the settings of Wordpress plugin into database using wp_options
*
*/

function data_retriever_admin_menu_option()
{
    add_menu_page(
        'Settings for Data Retriever',
        'Data Retriever',
        'manage_options',
        'data-retriever-settings',
        'data_retriever_settings_page',
        '',
        200
    );
}

add_action('admin_menu', 'data_retriever_admin_menu_option');

function data_retriever_settings_page()
{

    if (array_key_exists('submit_settings', $_POST)) {
        update_option('api_url', $_POST['url']);
        update_option('api_authorization_key', $_POST['authorization_key']);
    }
    ?>
        <div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <strong>Settings have been saved</strong>
        </div>
        <?php

            $url = get_option('api_url', 'None');
            $authorization_key = get_option('api_authorization_key', 'None');
        ?>
        <div class="wrap">
            <h2>Update Settings for Api</h2>
            <form method="post" action="">
                <label for="url">Url</label>
                <input type="url" class="large-text" name="url" placeholder="https://jsonplaceholder.typicode.com/todos/1" value="<?php print $url; ?>" required>
                <label for="authorization_key">Authorization Key</label>
                <input type="text" class="large-text" name="authorization_key" value="<?php print $authorization_key; ?>" placeholder="Basic bWFuYWdlcjE6dGVzdDEyMzQ1Ng==">
                <input type=submit  name="submit_settings" class="button button-primary" value="UPDATE SETTTINGS">
            </form>
        </div>
        <?php

    }

?>
