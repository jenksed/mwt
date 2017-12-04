<?php
/**
 * Creates the submenu item for the plugin.
 *
 * @package Custom_Admin_Settings
 */

 /**
 * Creates the submenu item for the plugin.
 *
 * Registers a new menu item under 'Tools' and uses the dependency passed into
 * the constructor in order to display the page corresponding to this menu item.
 *
 * @package Custom_Admin_Settings
 */
class Submenu {

    /**
     * A reference the class responsible for rendering the submenu page.
     *
     * @var    Submenu_Page
     * @access private
     */
    private $submenu_page;
    
    /**
     * Initializes all of the partial classes.
     *
     * @param Submenu_Page $submenu_page A reference to the class that renders the
     * page for the plugin.
     */
    public function __construct( $submenu_page ) {
        $this->submenu_page = $submenu_page;
    }

    /**
     * Adds a submenu for this plugin to the 'Tools' menu.
     */
    public function init() {
         add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
    }

    /**
     * Creates the submenu item and calls on the Submenu Page object to render
     * the actual contents of the page.
     */
    /*add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);*/

    public function add_menu_page() {
 
        add_menu_page(
            'LW Managed WordPress Tools',
            'MWP Tools',
            'manage_options',
            'mwt-dashboard',
            array( $this->submenu_page, 'render' ),
            plugins_url('/img/icon.png',__DIR__),
            1
        );
    }
}