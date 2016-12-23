<?php if ( ! defined( 'ABSPATH' ) ) exit;

return apply_filters( 'ninja_forms_from_subs_display_settings', array(

    /*
     * Sub Display Before
     */

    'subs_display_before' => array(
        'name' => 'subs_display_before',
        'type' => 'textarea',
        'label' => __( 'Display Before Submissions', 'ninja-forms' ),
        'group' => 'primary',
        'width' => 'full',
        'value' => '',
        'use_merge_tags' => FALSE,
        'help' => __( 'HTML to be displayed before Submissions.', 'ninja-forms')
    ),

    /*
     * Subs Display (Loop)
     */

    'subs_display' => array(
        'name' => 'subs_display',
        'type' => 'textarea',
        'label' => __( 'Submissions Display Loop', 'ninja-forms' ),
        'group' => 'primary',
        'width' => 'full',
        'value' => '',
        'use_merge_tags' => TRUE,
        'help' => __( 'HTML to displayed Submissions.', 'ninja-forms')
    ),

    /*
     * Subs Display After
     */

    'subs_display_after' => array(
        'name' => 'subs_display_after',
        'type' => 'textarea',
        'label' => __( 'Display After Submissions', 'ninja-forms' ),
        'group' => 'primary',
        'width' => 'full',
        'value' => '',
        'use_merge_tags' => FALSE,
        'help' => __( 'HTML to be displayed after Submissions.', 'ninja-forms')
    ),

));