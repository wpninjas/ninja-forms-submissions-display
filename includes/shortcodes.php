<?php

final class NF_SubmissionsDisplay_Shortcodes
{
    public function __construct()
    {
        add_shortcode( 'ninja_forms_subs', array( $this, 'ninja_forms_subs' ) );
    }

    public function ninja_forms_subs( $atts = array() )
    {
        if( ! isset( $atts['form_id'] ) ){
            if( current_user_can( 'manage_options' ) ){
                return NF_SubmissionsDisplay()->template( 'shortcode-missing-parameter.html.php', array( 'parameter' => 'form_id' ) );
            }
            return '';
        }

        $id = $atts['form_id'];

        $form = Ninja_Forms()->form( $id )->get();
        $fields = Ninja_Forms()->form( $id )->get_fields();
        $subs = Ninja_Forms()->form( $id )->get_subs();
        ob_start();
        echo $form->get_setting( 'subs_display_before' );
        foreach( array_reverse( $subs ) as $sub ){
            $merge_tags = Ninja_Forms()->merge_tags[ 'fields' ];
            foreach( $fields as $field ){
                $field_id = $field->get_id();
                $merge_tags->add_field( array(
                    'id' => $field->get_id(),
                    'key' => $field->get_setting( 'key' ),
                    'type' => $field->get_type(),
                    'value' => $sub->get_field_value( $field_id )
                ));
            }
            echo $merge_tags->replace( $form->get_setting( 'subs_display' ) );
        }
        echo $form->get_setting( 'subs_display_after' );
        return ob_get_clean();
    }
}