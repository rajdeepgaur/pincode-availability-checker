<?php
class PC_Settings_Page {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function add_page() {
        add_options_page(
            'Deliverable Pincodes',
            'Pincode Settings',
            'manage_options',
            'pincode-settings',
            [$this, 'render_page']
        );
    }

    public function register_settings() {
        register_setting('pincode-settings', 'pc_deliverable_pincodes');
    }

    public function render_page() { ?>
        <div class="wrap">
            <h1>Deliverable Pincodes</h1>
            <form method="post" action="options.php">
                <?php settings_fields('pincode-settings'); ?>
                <?php do_settings_sections('pincode-settings'); ?>
                <textarea name="pc_deliverable_pincodes" style="width:100%; height:200px;"><?php echo esc_textarea(get_option('pc_deliverable_pincodes', '')); ?></textarea>
                <?php submit_button(); ?>
            </form>
            <p>Enter one pincode per line.</p>
        </div>
    <?php }
}
