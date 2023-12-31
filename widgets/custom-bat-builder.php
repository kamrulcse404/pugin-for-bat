<?php
class Custom_Bat_Builder extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'bat_builder';
    }

    public function get_title()
    {
        return esc_html__('Bat Builder', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['custom-bat-builder'];
    }

    public function get_keywords()
    {
        return ['Custom', 'Bat'];
    }




    protected function register_controls()
    {

        // title Tab Start

        // $this->start_controls_section(
        //     'section_10_title_tab',
        //     [
        //         'label' => esc_html__('Title', 'elementor-addon'),
        //         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        //     ]
        // );


        // //  title 
        // $this->add_control(
        //     'section_10_title',
        //     [
        //         'label' => esc_html__('Title', 'elementor-addon'),
        //         'type' => \Elementor\Controls_Manager::TEXTAREA,
        //         'default' => esc_html__('looking for the best digital agency & marketing solution?', 'elementor-addon'),
        //     ]
        // );

        // $this->end_controls_section();

        // title Tab end



    }

    protected function render()
    {

        // $settings = $this->get_settings_for_display();
        // $section_10_title = $settings['section_10_title'];


?>


        <!-- html goes here  -->

        <div class="search">
            <div class="my_dropdown">
                <form id="search-device-result">
                    <section style="margin-bottom: 40px;">
                        <label for="size" class="custom-size">Required:</label> <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Size: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Size: Adult</option>
                <option value="adult">Size: Womens</option>
                <option value="adult">Size: Adult Light</option>
                <option value="adult">Size: Junior</option>
            </select> -->

                        <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Size: Please Select</option>
                            <option value="reset">Reset Option</option>

                            <?php

                            $taxonomy = 'size';
                            $terms = get_terms(array(
                                'taxonomy' => $taxonomy,
                                'hide_empty' => false,
                            ));

                            foreach ($terms as $term) {
                                echo '<option value="' . esc_attr($term->term_id) . '">Size: ' . esc_html($term->name) . '</option>';
                            }
                            ?>

                        </select>




                        <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Weight: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Weight: Junior Light</option>
                <option value="adult">Weight: Junior Mid</option>
                <option value="adult">Weight: Junior Heavy</option>
            </select> -->

                        <select name="weight" id="weight" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Weight: Please Select</option>
                            <option value="reset">Reset Option</option>
                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'weight',
                                'hide_empty' => false,
                            ));


                            if (!empty($terms)) {
                                foreach ($terms as $term) {
                                    echo '<option value="' . esc_attr($term->term_id) . '">Weight: ' . esc_html($term->name) . '</option>';
                                }
                            }
                            ?>
                        </select>


                        <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Middle Position: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Middle Position: Low</option>
                <option value="adult">Middle Position: Mid</option>
                <option value="adult">Middle Position: High</option>
            </select> -->

                        <select name="position" id="position" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected><?php esc_html_e('Middle Position: Please Select', 'your-text-domain'); ?></option>
                            <option value="reset"><?php esc_html_e('Reset Option', 'your-text-domain'); ?></option>

                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'position',
                                'hide_empty' => false,
                            ));


                            foreach ($terms as $term) {
                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html__('Middle Position:', 'your-text-domain') . ' ' . esc_html($term->name) . '</option>';
                            }
                            ?>

                        </select>


                        <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Toe Shape: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Toe Shape: Duckbill</option>
                <option value="adult">Toe Shape: Traditional</option>
                <option value="adult">Toe Shape: Spine</option>
                <option value="adult">Toe Shape: Default</option>
            </select> -->

                        <select name="shape" id="shape" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Toe Shape: Please Select</option>
                            <option value="reset">Reset Option</option>

                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'shape',
                                'hide_empty' => false,
                            ));

                            if ($terms && !is_wp_error($terms)) {

                                foreach ($terms as $term) {
                                    echo '<option value="' . esc_attr($term->term_id) . '">Toe Shape: ' . esc_html($term->name) . '</option>';
                                }
                            }
                            ?>
                        </select>



                        <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Scoop: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Scoop: None - Full Profile</option>
                <option value="adult">Scoop: None - Moderate</option>
                <option value="adult">Scoop: None - Large</option>
                <option value="adult">Scoop: None - Extreme</option>
            </select> -->

                        <select name="scoop" id="scoop" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Scoop: Please Select</option>
                            <option value="reset">Reset Option</option>

                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'scoop',
                                'hide_empty' => false,
                            ));


                            foreach ($terms as $term) {
                                echo '<option value="' . $term->term_id . '">Scoop: ' . $term->name . '</option>';
                            }
                            ?>

                        </select>



                    </section>


                    <section>
                        <label for="" class="custom-size">Optional:</label> <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Edge Shape: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Edge Shape: Modern</option>
                <option value="adult">Edge Shape: Traditional</option>
                <option value="adult">Edge Shape: Offset</option>
                <option value="adult">Edge Shape: Default</option>
            </select> -->

                        <select name="edge_shape" id="edge_shape" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Edge Shape: Please Select</option>
                            <option value="reset">Reset Option</option>

                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'edge_shape',
                                'hide_empty' => false,
                            ));


                            foreach ($terms as $term) {
                                echo '<option value="' . esc_attr($term->term_id) . '">Edge Shape: ' . esc_html($term->name) . '</option>';
                            }
                            ?>
                        </select>





                        <br>

                        <!-- <select name="size" id="size" class="custom-size-option" style="margin-bottom: 18px;">
                <option value="" disabled selected>Toe Size: Please Select</option>
                <option value="reset">Reset Option</option>
                <option value="adult">Toe Size: Standard</option>
                <option value="adult">Toe Size: Thick</option>
                <option value="adult">Toe Size: Default</option>
            </select> -->


                        <select name="toe_size" id="toe_size" class="custom-size-option" style="margin-bottom: 18px;">
                            <option value="" disabled selected>Toe Size: Please Select</option>
                            <option value="reset">Reset Option</option>

                            <?php

                            $terms = get_terms(array(
                                'taxonomy' => 'toe_size',
                                'hide_empty' => false,
                            ));

                            foreach ($terms as $term) {
                                echo '<option value="' . esc_attr($term->term_id) . '">Toe Size: ' . esc_html($term->name) . '</option>';
                            }
                            ?>

                        </select>



                    </section>
                </form>
            </div>


            <section>
                <div class="my_products">
                    <h1>Products</h1>
                </div>
                <div class="show_product">

                </div>
            </section>
        </div>





<?php
    }
}
