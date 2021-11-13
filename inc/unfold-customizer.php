<?php
function unfold_cusomize_register($wp_customize){

    $wp_customize->add_section(
        'hero_section',
        array(
            'title'     =>  esc_html__('Hero Section', 'unfold'),
            'capability' =>  'edit_theme_options',
            'priority'  =>  35
        )
    );

    $wp_customize->add_setting( 'hero_sub_title', array(
        'default'   =>  'HELLO, I’M',
        'transport' =>  'postMessage' //PostMessage
    ));

    $wp_customize->add_control( 'hero_subtitle_ctrl', array(
        'label'    =>  __('Sub Title', 'unfold'),
        'settings'  =>  'hero_sub_title',
        'section'   =>  'hero_section',
        'type'      =>  'text'
    ));

    $wp_customize -> add_setting( 'hero_sub_title_color', array(
        'default'   =>  '#754ef9',
        'transport' =>  'postMessage' // PostMessage
    ));

    $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_sub_title_color_ctrl', array(
        'label' =>  __('Sub Title color','unfold'),
        'settings'  =>  'hero_sub_title_color',
        'section'   =>  'hero_section'
    )));

    $wp_customize->add_setting( 'hero_title', array(
        'default'   =>  'MARK PARKER',
        'transport' =>  'refresh' //PostMessage
    ));

    $wp_customize->add_control('hero_title_ctrl', array(
        'label'     =>  __('Name', 'unfold'),
        'settings'  =>  'hero_title',
        'section'   =>  'hero_section',
        'type'      =>  'text',
    ));

    $wp_customize->add_setting( 'hero_description', array(
        'default'   =>  'A Freelance UI Designer & Web Developer',
        'transport' =>  'refresh' //PostMessage
    ));

    $wp_customize->add_control( 'hero_description_ctrl', array(
        'label'    =>  __('Subtitle', 'unfold'),
        'settings'  =>  'hero_description',
        'section'   =>  'hero_section',
        'type'      =>  'text'
    ));

    $wp_customize->add_setting( 'hero_button_text', array(
        'default'   =>  'View My Work',
        'transport' =>  'refresh'   // PostMessage
    ));

    $wp_customize->add_control( 'hero_button_text_ctrl', array(
        'label'     =>  __('Button Text','unfold'),
        'settings'  =>  'hero_button_text',
        'section'   =>  'hero_section',
        'type'      =>  'text'
    ));

    $wp_customize->add_setting( 'hero_button_url', array(
        'default'   =>  '#',
        'transport' =>  'refresh' // PostMessage
    ));

    $wp_customize->add_control( 'hero_button_url_ctrl', array(
        'label'     =>  __('Button URL','unfold'),
        'settings'  =>  'hero_button_url',
        'section'   =>  'hero_section',
        'type'      =>  'url'
    ));

    $wp_customize->add_setting( 'hero_img', array(
        'default'   =>  get_theme_file_uri('assets/images/banner/hero.png'),
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( new WP_Customize_Image_control( $wp_customize, 'hero_img_ctrl', array(
        'label'     =>  __('Image','unfold'),
        'settings'  =>  'hero_img',
        'section'   =>  'hero_section',
    )));

    $wp_customize->add_setting( 'social_icon', array(
        'default'   =>  'true',
        'transport' =>  'refresh', // postMessage
        'sanitize_callback' =>  'unfold_social_icon_sanitize_checkbox'
    ));

    $wp_customize->add_control( 'social_icon_ctrl', array(
        'label'     =>  __('Social icon enable ?','unfold'),
        'settings'  =>  'social_icon',
        'section'   =>  'hero_section',
        'type'      =>  'checkbox'
    ));

    function unfold_social_icon_sanitize_checkbox( $checked ){
        return ( (isset( $checked ) && true == $checked ) ? true : false );
    }

    // facebook 
    $wp_customize->add_setting( 'facebook_link', array(
        'default'   =>  'https://facebook.com/#',
        'transport' =>  'refresh' // postMessage
    ));

    $wp_customize->add_control( 'facebook_link_ctrl', array(
        'label'     =>  __('Facebook','unfold'),
        'settings'  =>  'facebook_link',
        'section'   =>  'hero_section',
        'type'      =>  'url'
    ));

    // twitter
    $wp_customize->add_setting( 'twitter_link', array(
        'default'   =>  'https://twiiter.com/#',
        'transport' =>  'refresh' // postMessage
    ));

    $wp_customize->add_control( 'twitter_link_ctrl', array(
        'label'     =>  __('Twitter','unfold'),
        'settings'  =>  'twitter_link',
        'section'   =>  'hero_section',
        'type'      =>  'url'
    ));

    // behance
    $wp_customize->add_setting( 'behance_link', array(
        'default'   =>  'https://behance.com/#',
        'transport' =>  'refresh' // postMessage
    ));

    $wp_customize->add_control( 'behance_link_ctrl', array(
        'label'     =>  __('Behance','unfold'),
        'settings'  =>  'behance_link',
        'section'   =>  'hero_section',
        'type'      =>  'url'
    ));

    // linkedin
    $wp_customize->add_setting( 'linkedin_link', array(
        'default'   =>  'https://linkedin.com/#',
        'transport' =>  'refresh' // postMessage
    ));

    $wp_customize->add_control( 'linkedin_link_ctrl', array(
        'label'     =>  __('Linkedin','unfold'),
        'settings'  =>  'linkedin_link',
        'section'   =>  'hero_section',
        'type'      =>  'url'
    ));
}
add_action('customize_register', 'unfold_cusomize_register');

// Kirki
Kirki::add_config( 'unfold_config', array(
    'capability'    =>  'edit_theme_options',
    'option_type'   =>  'theme_mod'
));

Kirki::add_panel( 'unfold_panel', array(
    'title'         =>  __( 'Unfold Options', 'unfold' ),
    'description'   =>  __( 'Unfold Description', 'unfold'), 
    'priority'      =>  20
));

Kirki::add_section( 'about_section', array(
    'title'         =>  __( 'About Section', 'unfold' ),
    'panel'         =>  'unfold_panel'
));

// Enable About Section
Kirki::add_field( 'unfold_config', array(
    'label'     =>  __('Enable About Section ?'),
    'settings'  =>  'about_section_enable',
    'section'   =>  'about_section',
    'type'      =>  'switch',
    'default'   =>  'on',
    'choices'   =>  [
        'on'    =>  esc_html__('Yes', 'unfold'),
        'off'   =>  esc_html__('No', 'unfold')
    ]
));

// About Section Title
Kirki::add_field( 'unfold_config', [
    'label'     =>  __( 'Section Title', 'unfold' ),
    'settings'  =>  'about_section_title',
    'section'   =>  'about_section',
    'type'      =>  'text',
    'default'   =>  'About Me',
]);

// About Section Description
Kirki::add_field( 'unfold_config', [
    'label'     =>  __( 'Section Description', 'unfold'),
    'settings'  =>  'about_section_desc',
    'section'   =>  'about_section',
    'type'      =>  'textarea',
    'default'   =>  'Nunc id dui at sapien faucibus fermentum ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta sem turpis quis leo.'
]);

// About me title
Kirki::add_field( 'unfold_config', [
    'label'     =>  __('About me title', 'unfold'),
    'settings'  =>  'about_me_title',
    'section'   =>  'about_section',
    'type'      =>  'text',
    'default'   =>  'Hi There! I\'m Mark Parker'
]);

// About me description
Kirki::add_field( 'unfold_config', [
    'label'     =>  __('About me description'),
    'settings'  =>  'about_me_desc',
    'section'   =>  'about_section',
    'type'      =>  'textarea',
    'default'   =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
]);

// About me single info
Kirki::add_field( 'unfold_config', [
    'type'      =>  'repeater',
    'label'     =>  esc_html__('About Me info', 'unfold'),
    'settings'  =>  'about_me_single_info',
    'section'   =>  'about_section',
    'row_label' =>  [
        'type'  =>  'field',
        'value' =>  esc_html__('Item', 'unfold'),
        'field' =>  'info_label'
    ],
    'default'   =>  [
        [
            'info_icon'     =>  'lni-calendar',
            'info_label'    =>  esc_html__('Date of birth:', 'unfold'),
            'info_value'    =>  esc_html__('8 June 1995', 'unfold')
        ],
        [
            'info_icon'     =>  'lni-envelope',
            'info_label'    =>  esc_html__('Email:', 'unfold'),
            'info_value'    =>  esc_html__('jhon@mysite.com', 'unfold')
        ],
        [
            'info_icon'     =>  'lni-phone-handset',
            'info_label'    =>  esc_html__('Phone:', 'unfold'),
            'info_value'    =>  esc_html__('+1-202-555-0138', 'unfold')
        ],
        [
            'info_icon'     =>  'lni-calendar',
            'info_label'    =>  esc_html__('Location:', 'unfold'),
            'info_value'    =>  esc_html__('4373, El Centro, CA', 'unfold')
        ],
    ],
    'fields'    =>  [
        'info_icon'  =>      [
            'type'          =>  'select',
            'label'         =>  esc_html__('Icon', 'unfold'),
            'description'   =>  esc_html__('select icon from dropdown list.', 'unfold'),
            'default'       =>  '',
            'placeholder'   =>  esc_html__('Select icon', 'unfold'),
            'multiple'      =>  false,
            'choices'       =>  [
                ''                       =>  esc_html__( 'Select', 'unfold'),
                'lni-calendar'              =>  esc_html__( 'Calendar', 'unfold'),
                'lni-envelope'              =>  esc_html__( 'Envelope', 'unfold'),
                'lni-phone-handset'         =>  esc_html__( 'Phone Handset', 'unfold'),
                'lni-map-marker'            =>  esc_html__( 'Map marker', 'unfold'),
                'lni-facebook'              =>  esc_html__( 'Facebook', 'unfold'),
                'lni-facebook-messenger'    =>  esc_html__( 'Facebook messenger', 'unfold'),
                'lni-facebook-original'     =>  esc_html__( 'Facebook Original', 'unfold'),
                'lni-facebook-filled'       =>  esc_html__( 'Facebook Filled', 'unfold'),
                'lni-twitter'               =>  esc_html__( 'Twiiter', 'unfold'),
                'lni-twitter-original'      =>  esc_html__( 'Twitter Original', 'unfold'),
                'lni-twitter-filled'        =>  esc_html__( 'Twitter Filled', 'unfold'),
                'lni-linkedin'              =>  esc_html__( 'Linkedin', 'unfold'),
                'lni-linkedin-original'     =>  esc_html__( 'Linkedin Original', 'unfold'),
                'lni-linkedin-filled'       =>  esc_html__( 'Linkedin Filled', 'unfold'),
                'lni-git'                   =>  esc_html__( 'Git', 'unfold'),
                'lni-github'                =>  esc_html__( 'Github', 'unfold'),
                'lni-github-original'       =>  esc_html__( 'Github Original', 'unfold'),
                'lni-stackoverflow'         =>  esc_html__( 'Stackoverflow', 'unfold'),
                'lni-website'               =>  esc_html__( 'Website', 'unfold'),
                'lni-youtube'               =>  esc_html__( 'Youtube', 'unfold'),
                'lni-wechat'                =>  esc_html__( 'Wechat', 'unfold'),
                'lni-whatsapp'              =>  esc_html__( 'Whatsapp', 'unfold'),
                'lni-slack'                 =>  esc_html__( 'Slack', 'unfold'),
                'lni-skype'                 =>  esc_html__( 'Skype', 'unfold'),
            ]
        ],
        'info_label' =>  [
            'type'          =>  'text',
            'label'         =>  esc_html__( 'Label', 'unfold'),
            'placeholder'   =>  esc_html__( 'Email, Phone', 'unfold'),
        ],
        'info_value' =>  [
            'type'          =>  'text',
            'label'         =>  esc_html__( 'Value', 'unfold'),
            'placeholder'   =>  esc_html__( 'mail@example.com', 'unfold')
        ]
    ]
]);

// About me skill
Kirki::add_field( 'unfold_config', [
    'label'     =>  esc_html__('Skills ', 'unfold'),
    'settings'  =>  'about_me_skill',
    'section'   =>  'about_section',
    'type'      =>  'repeater',
    'default'   =>  [],
    'row_label' =>   [
        'type'      =>  'field',
        'value'     =>  esc_html__( 'Skill', 'unfold'),
        'field'     =>  'skill_title'
    ],
    'fields'     =>  [
        'skill_title'   =>  [
            'type'          =>  'text',
            'label'         =>  esc_html__( 'Title', 'unfold'),
            'placeholder'   =>  esc_html__( 'HTML', 'unfold')
        ],
        'skill_percentage'  =>  [
            'type'          =>  'number',
            'label'         =>  esc_html__( 'Percentage', 'unfold'),
            'placeholder'   =>  esc_html__( '80', 'unfold')
        ]
    ]
]);