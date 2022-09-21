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
			]
		);

        $this->add_control(
			'card_description',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( 'Card Description', 'first-card-widget' ),
                'label_block' => true,
				'placeholder' => esc_html__( 'Enter your Description', 'first-card-widget' ),
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
				'default' => 'center',
			]
		);

        $this->add_control(
			'card_image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__( 'Choose Image', 'first-card-widget' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

        $this->add_control(
			'delete_content',
			[
				'label' => esc_html__( 'Delete Content', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'button_type' => 'success',
				'text' => esc_html__( 'Delete', 'first-card-widget' ),
				'event' => 'namespace:editor:delete',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'first-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Title Color', 'first-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#8dc26f',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);

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
        
        ?>

        <div class="wrap">

            <div class="card">
            <div class="card-pic-wrap">
            <?php echo '<img src="' . esc_url( $settings['card_image']['url'] ) . '" alt="">'; ?>
            </div>
            <div class="card-content">
                <h3><?php echo $card_title; ?></h3>
                <p><?php echo $card_description; ?></p>
                <p><a href="#0">So leafy</a></p>
            </div>
            </div>
        </div>
    

        <?php


    }

}