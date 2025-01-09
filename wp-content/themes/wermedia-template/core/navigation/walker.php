<?php

if (!class_exists('Wer_Nav_Walker')) :
    /**
     * Custom navigation walker class for WordPress menus.
     * 
     * This class extends the Walker_Nav_Menu class to provide custom rendering of navigation menus.
     * It adds specific classes and structures for parent and child menu items, and includes functionality
     * for active states and icons.
     */
    class Wer_Nav_Walker extends Walker_Nav_Menu
    {
        /**
         * Starts the list before the elements are added.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int $depth Depth of the menu. Used for indentation.
         * @param array $args An array of additional arguments.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n<ul class=\"menu__list\">\n";
        }

        /**
         * Ends the list of after the elements are added.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param int $depth Depth of the menu. Used for indentation.
         * @param array $args An array of additional arguments.
         */
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "</ul>\n";
        }

        /**
         * Starts the element output.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param WP_Post $data_object Menu item data object.
         * @param int $depth Depth of the menu item. Used for padding.
         * @param array|null $args Additional arguments.
         * @param int $current_object_id ID of the current object.
         */
        public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
        {
            $isParent = in_array('menu-item-has-children', $data_object->classes);
            $isActive = in_array('current-menu-item', $data_object->classes) || in_array('current-menu-ancestor', $data_object->classes);

            $parent_class = $isParent ? 'navigation__section' : '';
            $active_class = $isActive ? 'navigation__link--active' : '';

            $icon = "<svg xmlns='http://www.w3.org/2000/svg' class='menu__icon--dropdown image--contain' fill='#fff' viewBox='0 0 24 24'><path fill='#fff' fill-rule='evenodd' d='M3.293 6.707a1 1 0 0 1 1.414 0L12 14l7.293-7.293a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1 0 1.414l-8.353 8.354a1.5 1.5 0 0 1-2.122 0L2.586 8.828a1 1 0 0 1 0-1.414l.707-.707Z' clip-rule='evenodd'/></svg>";

            if ($isParent) {
                $output .= "<li class='navigation__link--children $active_class'>";
            } else {
                $output .= "<li class='navigation__link $active_class'>";
            }

            $link_tag = $data_object->url && $data_object->url !== '#' ? 'a' : 'span';

            if ($isParent) {
                $output .= "<span class='navigation__link'>";
                $output .= "<$link_tag class='link__label' " . ($data_object->url ? 'href="' . esc_url($data_object->url) . '"' : '') . ">";
                $output .= esc_html($data_object->title);
                $output .= "</$link_tag>";
                $output .= "<span class='link__icon'>$icon</span>";
                $output .= "</span>";
            } else {
                $output .= "<$link_tag class='navigation__link' " . ($data_object->url ? 'href="' . esc_url($data_object->url) . '"' : '') . ">";
                $output .= esc_html($data_object->title);
                $output .= "</$link_tag>";
            }
        }

        /**
         * Ends the element output, if needed.
         *
         * @param string $output Used to append additional content (passed by reference).
         * @param WP_Post $data_object Menu item data object.
         * @param int $depth Depth of the menu item. Used for padding.
         * @param array|null $args Additional arguments.
         */
        public function end_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) 
        {
            $output .= "</li>";
        }
    }
endif;
