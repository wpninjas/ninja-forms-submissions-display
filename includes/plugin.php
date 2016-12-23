<?php if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path( __FILE__ ) . 'shortcodes.php';

final class NF_SubmissionsDisplay_Plugin
{
    private $version;
    private $url;
    private $dir;

    private $shortcodes;

    public function __construct( $version, $file )
    {
        $this->version = $version;
        $this->url = plugin_dir_url( $file );
        $this->dir = plugin_dir_path( $file );

        $this->shortcodes = new NF_SubmissionsDisplay_Shortcodes();

        add_filter( 'ninja_forms_from_settings_types', array( $this, 'plugin_settings_groups' ) );
        add_filter( 'ninja_forms_localize_form_subs_display_settings', array( $this, 'plugin_settings' ) );
    }

    /*
    |--------------------------------------------------------------------------
    | Getter Methods
    |--------------------------------------------------------------------------
    */

    public function version()
    {
        return $this->version;
    }

    public function url( $url = '' )
    {
        return trailingslashit( $this->url ) . $url;
    }

    public function dir( $path = '' )
    {
        return trailingslashit( $this->dir ) . $path;
    }

    public function config( $file_name )
    {
        return include $this->dir . 'includes/config/' . $file_name . '.php';
    }

    public function template( $file, $args = array() )
    {
        $path = $this->dir( 'includes/templates/' . $file );
        if( ! file_exists(  $path ) ) return '';
        extract( $args );

        ob_start();
        include $path;
        return ob_get_clean();
    }

    /*
    |--------------------------------------------------------------------------
    | Action & Filter Hooks
    |--------------------------------------------------------------------------
    */

    public function plugin_settings_groups( $groups )
    {
        $groups[ 'subs_display' ] = array(
            'id' => 'subs_display',
            'nicename' => __( 'Submissions Display', 'ninja-forms')
        );
        return $groups;
    }

    public function plugin_settings( $settings )
    {
        return array_merge( $settings, $this->config( 'FormSubsDisplaySettings' ) );
    }

    /*
    |--------------------------------------------------------------------------
    | Internal API
    |--------------------------------------------------------------------------
    */

    // This section intentionally left blank.

}
