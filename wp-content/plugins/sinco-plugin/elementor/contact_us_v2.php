<?php namespace SINCOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
 
 class Contact_Us_V2 extends Widget_Base {
     /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'sinco_contact_us_v2';
    }

    /**
     * Get widget title.
     * Retrieve button widget title.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Contact Us V2', 'sinco' );
    }

    /**
     * Get widget icon.
     * Retrieve button widget icon.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-library-open';
    }
    
    /**
     * Get widget categories.
     * Retrieve the list of categories the button widget belongs to.
     * Used to determine where to display the widget in the editor.
     *
     * @since  2.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'sinco' ];
    }
    
    /**
     * Register button widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'contact_us_v2',
            [
                'label' => esc_html__( 'Contact US V2', 'sinco' ),
            ]
        );
        
        $this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'sinco' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Title', 'sinco' ),
			]
		);
		$this->add_control(
			'contact_form_url',
			[
				'label'       => __( 'Contact Form 7 Url', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'sinco' ),
			]
		);
		$this->add_control(
			'contact_title',
			[
				'label'       => __( 'Contact Title', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Contact Title', 'sinco' ),
			]
		);
		
		$this->add_control(
			'contact_info',
			[
				'label'       => __( 'Contact Info', 'sinco' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Contact Info', 'sinco' ),
			]
		);
		
		$this->add_control(
			'contact_email',
			[
				'label'       => __( 'Contact Email', 'sinco' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Contact Email', 'sinco' ),
			]
		);
		
		$this->add_control(
			'contact_image',
			[
				'label' => __( 'Contact Image', 'sinco' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->end_controls_section();
    }
    
    
    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
	?>
	
	<!-- 
	=============================================
		Contact Section Two
	============================================== 
	-->
	<div class="contact-section-one mb-80 lg-mb-80">
	    <div class="mt-100 lg-mt-70">
			<div class="container">
				<div class="row gx-xxl-5">

					<div class="col-lg-6 contact-v2-info">
					    <?php if($settings['contact_title']){ ?>
					        <h4><?php echo wp_kses($settings['contact_title'], true); ?></h4>
					    <?php } ?>
					    <?php if($settings['contact_info']){ ?>
					        <p><?php echo wp_kses($settings['contact_info'], true); ?> <?php if($settings['contact_email']){ ?> <a href="mailto:<?php echo wp_kses($settings['contact_email'], true); ?>"><?php echo wp_kses($settings['contact_email'], true); ?></a><?php } ?></p>
					    <?php } ?>
					    <?php if($settings['contact_image']){ ?>
					        <div>
					            <img src="<?php echo esc_url(wp_get_attachment_url($settings['contact_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'sinco'); ?>" class="img-fluid">
					        </div>
						    
						<?php } ?>
					</div>
					
					<?php if($settings['form_title'] || $settings['contact_form_url']) { ?>
                    <div class="col-lg-6">
						<div class="form-style-one">
							<?php if($settings['form_title']) { ?>
							<h3 class="form-title pb-40 lg-pb-20"><?php echo wp_kses($settings['form_title'], true); ?></h3>
							<?php } ?>
                            
							<?php if($settings['contact_form_url']){ ?>
							<?php echo do_shortcode($settings['contact_form_url'], true);?>
							<?php } ?>
						</div> <!-- /.form-style-one -->
					</div>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	
<?php
    }
}
