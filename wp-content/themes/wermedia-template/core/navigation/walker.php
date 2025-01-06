<?php

if (!class_exists('Wer_Nav_Walker')) :
    class Wer_Nav_Walker extends Walker_Nav_Menu
    {
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"menu__list\">\n";
        }

        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }

        public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
        {
            $isParent = in_array('menu-item-has-children', $data_object->classes);
            $isActive = in_array('current-menu-item', $data_object->classes) || in_array('current-menu-ancestor', $data_object->classes);

            $parent_class = $isParent ? 'navigation__section' : '';
            $active_class = $isActive ? 'navigation__link--active' : '';

            $icon = "<svg xmlns='http://www.w3.org/2000/svg' class='menu__icon--dropdown image--contain' fill='#fff' viewBox='0 0 24 24'><path fill='#fff' fill-rule='evenodd' d='M3.293 6.707a1 1 0 0 1 1.414 0L12 14l7.293-7.293a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1 0 1.414l-8.353 8.354a1.5 1.5 0 0 1-2.122 0L2.586 8.828a1 1 0 0 1 0-1.414l.707-.707Z' clip-rule='evenodd'/></svg>";
            $indent = str_repeat("\t", $depth);

            if ($isParent) {
                $output .= "$indent<li class='navigation__link--children navigation__section $active_class'>";
            } else {
                $output .= "$indent<li class='navigation__link $parent_class $active_class'>";
            }

            $link_tag = $data_object->url && $data_object->url !== '#' ? 'a' : 'span';

            $output .= "<$link_tag class='navigation__link' " . ($data_object->url ? 'href="' . esc_url($data_object->url) . '"' : '') . ">";
            $output .= esc_html($data_object->title);

            if ($isParent) {
                $output .= "<span class='link__icon'>$icon</span>";
            }

            $output .= "</$link_tag>";
        }

        public function end_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) 
        {
            $isParent = in_array('menu-item-has-children', $data_object->classes);

            if ($isParent) {
                $output .= "</li>\n";
            } else {
                $output .= "</li>\n";
            }
        }
    }
endif;
