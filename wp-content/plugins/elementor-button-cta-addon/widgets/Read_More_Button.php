<?php
class Read_More_Button extends \Elementor\Widget_Base{
   public function get_name(): string {
     return 'read_more_button';
   }


   public function get_icon(): string {
		return 'eicon-code';
   }

    public function get_title(): string {
        return __( 'Read More Button', 'text-domain' );
    }

    public function get_categories(): array {
      return [ 'general' ];
    }

    protected function register_controls()
    {
        
        $this->start_controls_section(
          'content_section',
          [
            'label' => esc_html__( 'Content', 'textdomain' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
          ]
        );

        $this->add_control(
          'collasped_text',
          [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => esc_html__( 'Collapse Section', 'textdomain' ),
            'placeholder' => esc_html__( 'Enter your text', 'textdomain' ),
            'default' => esc_html__( 'Read More', 'textdomain' )
          ]
        );

        
        $this->add_control(
          'expanded_text',
          [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => esc_html__( 'Expand Section', 'textdomain' ),
            'placeholder' => esc_html__( 'Enter your text', 'textdomain' ),
            'default' => esc_html__( 'Read Less', 'textdomain' )
          ]
        );

        $this->end_controls_section();
    }

    // protected function is_container(): bool {
    //     return true;
    // }

    protected function render()
    {
     $settings = $this->get_settings_for_display();
     
     
     
      ?>

      <div class="read-more-toggle"
          role="button"
          tabindex="0"
          data-expand="<?php echo esc_attr( $settings['expanded_text'] ); ?>"
          data-collapse="<?php echo esc_attr( $settings['collasped_text'] ); ?>">
          <?php echo esc_html( $settings['expanded_text'] ); ?>
      </div>

      <?php
    }

    protected function content_template()
    {
      return parent::content_template();
    }
}