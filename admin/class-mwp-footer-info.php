<?
class MWP_Footer_Info {

  private $db;

  public function __construct( \wpdb $wpdb ) {
    $this->db = $wpdb;
    add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );
    add_filter( 'update_footer', array( $this, 'echo_footer_info' ), 11 );
  }

  public function load_text_domain() {
    load_plugin_textdomain( 'mwp-tools' );
  }

  protected function getUsername() {
     
     $dir = plugin_dir_path( __FILE__ );
     $path = explode( "/", $dir );
     if(!isset($path)){
        $sUser = $path[1];
        return $sUser;
     } else {
      echo "unknown";
     }
  }

  public function echo_footer_info() {
    $update     = core_update_footer();
    $wp_version = strpos( $update, '<strong>' ) === 0 ? get_bloginfo( 'version' ) . ' (' . $update . ')' : get_bloginfo( 'version' );

    return sprintf( esc_attr__( 'You are running WordPress %s | MWP Site User: %s | PHP %s | %s | MySQL %s', 'version-info' ), $wp_version, $this->getUsername, phpversion(), $_SERVER['SERVER_SOFTWARE'], $this->db->get_var('SELECT VERSION();') );
  }
}

global $wpdb;
new MWP_Footer_Info( $wpdb );