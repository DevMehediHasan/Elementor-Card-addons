<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class First_Card_Widget extends \Elementor\Widget_Base {

    /**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
    public function get_name()
    {
        return 'card';
    }

    /**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
    public function get_title() {
		return esc_html__( 'Card', 'first-card-widget' );
	}

    /**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-header';
	}

    /**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    /**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}
    /**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'image', 'ordered', 'unordered' ];
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'card-title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'first-card-widget' ),
                'label_block' => true,
				'placeholder' => esc_html__( 'Enter your title', 'first-card-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'card_description',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Card Description', 'first-card-widget' ),
                'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Description', 'first-card-widget' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'alignment',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'first-card-widget' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'first-card-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'first-card-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'first-card-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .fcw-card-content' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'card_image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__( 'Choose Image', 'first-card-widget' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'image_hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->add_control(
			'show_button',
			[
				'label' => esc_html__( 'Show Button', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'first-card-widget' ),
				'label_off' => esc_html__( 'Hide', 'first-card-widget' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'card-button-text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Button Name', 'first-card-widget' ),
                'label_block' => true,
				'placeholder' => esc_html__( 'Enter Button Name', 'first-card-widget' ),
			]
		);
		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'first-card-widget' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'first-card-widget' ),
				'selector' => '{{WRAPPER}} .fcw-card',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Title Color', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .fcw-card-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .fcw-card-title',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'description_style',
			[
				'label' => esc_html__( 'Description', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label' => esc_html__( 'Description Color', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .fcw-card-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sub_heading_typography',
				'selector' => '{{WRAPPER}} .fcw-card-content p',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'imageBg_style',
			[
				'label' => esc_html__( 'Image', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'first-card-widget' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .fcw-card-pic-wrap',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);


		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'first-card-widget' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .fcw-card-content a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .fcw-card-content a',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background',
				'label' => esc_html__( 'Button Background', 'first-card-widget' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .fcw-card-content a',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'first-card-widget' ),
			]
		);

		$this->add_control(
			'button_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .fcw-card-content a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography_hover',
				'selector' => '{{WRAPPER}} .fcw-card-content a:hover',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'button_background_hover',
				'label' => esc_html__( 'Button Background', 'first-card-widget' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .fcw-card-content a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_section();
    }

    /**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $card_title = $settings['card-title'];
        $card_description = $settings['card_description'];
		$elementClass = 'fcw-card-pic-wrap';
		if ( $settings['hover_animation'] ) {
			$elementClass .= ' elementor-animation-' . $settings['hover_animation'];
		}
		$this->add_render_attribute( 'wrapper', 'class', $elementClass );
		// $card_button_text = $settings['card-button-text'];
		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		}
        
        ?>

        <div class="wrap">
            <div class="fcw-card">
				<div class="fcw-card-pic-wrap">
					<?php echo '<img src="' . esc_url( $settings['card_image']['url'] ) . '" alt="">'; ?>
				</div>
				<div class="fcw-card-content">
					<h3 class="fcw-card-title"><?php echo $card_title; ?></h3>
					<p><?php echo $card_description; ?></p>
						<?php 
							if ( 'yes' === $settings['show_button'] ) {
								
								echo "<a href='{$settings['website_link']['url']}'>" . $settings['card-button-text'] . "</a>";
							} 
						?>
				</div>
            </div>
        </div>
    

        <?php


    }

}