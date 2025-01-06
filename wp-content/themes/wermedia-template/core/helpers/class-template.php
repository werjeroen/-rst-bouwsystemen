<?php

/**
 * Class Wermedia
 *
 * Bevat verschillende hulpmethoden voor het werken met templates, loops en post-gegevens.
 */
class TemplateHelper
{

    /**
     * Laad een reeks templates.
     *
     * @param array $templates Een array met template-namen (zonder bestandsextensie).
     */
    public static function get_templates(array $templates = [])
    {
        foreach ($templates as $template) {
            get_template_part($template);
        }
    }

    /**
     * Genereer de URL van de placeholder-afbeelding.
     *
     * @return string De URL van de placeholder-afbeelding.
     */
    private function wer_placeholder_url()
    {
        return get_template_directory_uri() . '/resources/images/no-image.png';
    }

    /**
     * Genereer een placeholder-afbeelding.
     *
     * @param string $classes Extra CSS-klassen als string (optioneel).
     * @return string De HTML voor de placeholder-afbeelding met srcset en sizes.
     */
    public function wer_placeholder($classes = 'image--cover')
    {
        // URL van de placeholder-afbeelding
        $placeholder_url = esc_url($this->wer_placeholder_url());

        // HTML-output
        return sprintf(
            '<img src="%1$s" class="%2$s" alt="Placeholder image" srcset="%1$s" sizes="100vw">',
            $placeholder_url,
            esc_attr($classes)
        );
    }

    /**
     * Bouwt de HTML-output voor een auteurslink in de footer.
     *
     * @param string $text De tekst die in de link wordt weergegeven (standaard: 'Powered by').
     * @return string De HTML-string met een link naar de auteur en een SVG-logo.
     */
    public static function wer_build_author($text = 'Website door')
    {
        $output = '<div class="footer__author">';
        $output .= sprintf(
            '<a class="author__link" href="%s" target="_blank" rel="noopener noreferrer">%s',
            esc_url('https://www.wermedia.nl'),
            esc_html($text)
        );
        $output .= '<span class="author__logo"><svg class="image--cover" id="Laag_2" data-name="Laag 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297.04 40.69"><defs><style>.footer--svg{fill:#000}</style></defs><g id="Laag_1-2" data-name="Laag 1"><g id="Group_420" data-name="Group 420"><g id="Group_2" data-name="Group 2"><g id="Group_1" data-name="Group 1"><g id="Group_1-2" data-name="Group 1-2"><path id="Path_74" data-name="Path 74" class="cls-1" d="M291.44 21.39c3.06-.01 5.52-2.5 5.51-5.56s-2.5-5.52-5.56-5.51c-3.06.01-5.52 2.5-5.51 5.56.01 3.06 2.5 5.52 5.56 5.51"></path><path id="Path_75" data-name="Path 75" class="cls-1" d="M291.53 39.26c3.06-.01 5.52-2.5 5.51-5.56a5.531 5.531 0 0 0-5.56-5.51c-3.06.01-5.52 2.5-5.51 5.56.01 3.06 2.5 5.52 5.56 5.51"></path><path id="Path_76" data-name="Path 76" class="cls-1" d="m47.57 9.62-.03 29.96H37.32l-.11-3.67a8.337 8.337 0 0 1-3.46 3.4c-1.59.81-3.36 1.22-5.14 1.19-4.14 0-7.06-1.65-8.76-4.94a8.905 8.905 0 0 1-3.75 3.62c-1.73.89-3.65 1.34-5.6 1.3-3.45 0-6.06-1.08-7.84-3.23S0 31.96 0 27.82L.02 9.59h10.45l-.01 16.27c0 3.52 1.3 5.28 3.89 5.29 2.83 0 4.24-1.9 4.25-5.69V9.6h10.46v16.27c-.02 3.52 1.28 5.28 3.87 5.29 2.79 0 4.18-1.9 4.19-5.69V9.61l10.46.01Z"></path><path id="Path_77" data-name="Path 77" class="cls-1" d="M64.47 15.93c1.21-.05 2.4.37 3.31 1.16a5.68 5.68 0 0 1 1.68 3.2c.08.36.12.73.12 1.1H59.01c.62-3.65 2.44-5.47 5.46-5.46m8.96 16.35c-1.65.36-3.33.54-5.02.55-2.16.11-4.32-.36-6.24-1.36a6.491 6.491 0 0 1-2.98-4.39h13.4c.74-.3 1.43-.74 2.03-1.28.94-.9 1.68-1.99 2.15-3.2.58-1.51.85-3.12.81-4.74a6.03 6.03 0 0 1-4.89-1.89 6.155 6.155 0 0 1-1.57-4.02c0-.62.11-1.24.3-1.83-2.13-.91-4.44-1.37-6.76-1.34-2.86-.06-5.68.63-8.19 2-2.33 1.3-4.25 3.25-5.52 5.6a16.896 16.896 0 0 0-1.98 8.3c-.08 2.98.67 5.93 2.17 8.51 1.48 2.41 3.64 4.32 6.21 5.49 3.04 1.35 6.34 2.01 9.67 1.92 2.13 0 4.26-.19 6.36-.57 1.91-.34 3.77-.9 5.55-1.68l-.92-7.55c-1.46.67-2.99 1.16-4.56 1.48"></path><path id="Path_78" data-name="Path 78" class="cls-1" d="M98.58 9.16c-1.66-.03-3.28.51-4.59 1.54a8.913 8.913 0 0 0-2.91 4.32l-.11-5.28h-8.1c1.02 1.84 1.53 3.93 1.46 6.04.01 2.59-.58 5.14-1.72 7.46-.52 1.06-1.15 2.06-1.87 3v13.45h10.5V26.86c.02-5.27 2.01-7.9 6-7.89.62 0 1.18-.04 2.04-.04.89 0 2.13.04 2.72.04l.02-9.23a9.314 9.314 0 0 0-3.43-.59"></path><path id="Path_79" data-name="Path 79" class="cls-1" d="m120.8 39.73.03-29.96h10.39l-.05 3.67a8.337 8.337 0 0 1 3.46-3.4c1.59-.81 3.36-1.22 5.14-1.18 4.14 0 7.06 1.65 8.76 4.94a8.928 8.928 0 0 1 3.75-3.63c1.73-.89 3.65-1.34 5.6-1.3 3.45 0 6.06 1.07 7.84 3.22 1.78 2.15 2.67 5.3 2.66 9.44l-.02 18.23h-10.45l.01-16.26c0-3.52-1.3-5.28-3.89-5.29-2.83 0-4.24 1.9-4.25 5.69v15.85l-10.46-.01V23.48c.02-3.52-1.28-5.28-3.87-5.28-2.79 0-4.18 1.9-4.18 5.69v15.85h-10.46Z"></path><path id="Path_80" data-name="Path 80" class="cls-1" d="M185.32 15.93c-3.02 0-4.84 1.82-5.46 5.45h10.57c0-.36-.03-.73-.12-1.09a5.74 5.74 0 0 0-1.68-3.2c-.91-.8-2.1-1.21-3.31-1.16m2.54 24.68c-3.33.08-6.63-.57-9.67-1.92a14.243 14.243 0 0 1-6.21-5.49 16.08 16.08 0 0 1-2.17-8.51c-.05-2.89.63-5.75 1.98-8.3 1.27-2.35 3.19-4.3 5.52-5.6 2.51-1.37 5.33-2.06 8.19-2 2.73-.07 5.43.57 7.84 1.84a12.41 12.41 0 0 1 5.08 5.17c1.23 2.48 1.84 5.22 1.76 7.99 0 .54-.02 1.08-.06 1.63s-.1 1.1-.18 1.68l-19.92-.02a6.505 6.505 0 0 0 2.99 4.39c1.92 1 4.08 1.48 6.24 1.37 1.69 0 3.37-.19 5.02-.55 1.57-.32 3.1-.81 4.56-1.48l.93 7.55c-1.78.78-3.64 1.34-5.55 1.68-2.1.39-4.23.58-6.36.57"></path><path id="Path_81" data-name="Path 81" class="cls-1" d="M218.18 31.34c1.64.04 3.21-.63 4.3-1.86a6.746 6.746 0 0 0 1.69-4.7c.07-1.74-.53-3.43-1.68-4.73a5.56 5.56 0 0 0-4.29-1.83c-1.65-.06-3.24.61-4.36 1.82a6.728 6.728 0 0 0-1.69 4.73c-.06 1.72.54 3.41 1.68 4.7a5.63 5.63 0 0 0 4.35 1.86m-3.26 9.34c-2.44.04-4.84-.66-6.88-2.01a13.474 13.474 0 0 1-4.68-5.57 19.06 19.06 0 0 1-1.68-8.21c-.05-2.83.57-5.64 1.81-8.19 1.11-2.29 2.79-4.26 4.88-5.72a11.91 11.91 0 0 1 6.91-2.11c3.3-.15 6.44 1.39 8.36 4.07l.02-12.94h10.51l-.04 39.77h-9.93l-.11-3.84c-1.9 3.17-4.96 4.76-9.18 4.75"></path><path id="Rectangle_38" data-name="Rectangle 38" class="cls-1" d="M236.82 9.76h10.51v29.96h-10.51z"></path><path id="Path_82" data-name="Path 82" class="cls-1" d="M265.63 31.32c1.64.05 3.21-.63 4.3-1.86a6.746 6.746 0 0 0 1.69-4.7c.07-1.74-.53-3.43-1.68-4.73a5.596 5.596 0 0 0-4.3-1.84c-1.65-.06-3.24.61-4.36 1.82a6.728 6.728 0 0 0-1.69 4.73c-.06 1.72.54 3.41 1.68 4.7a5.637 5.637 0 0 0 4.36 1.86m-3.26 9.34c-2.44.04-4.84-.66-6.88-2.01a13.343 13.343 0 0 1-4.67-5.58 19.06 19.06 0 0 1-1.68-8.21c-.05-2.83.57-5.64 1.81-8.19 1.11-2.29 2.79-4.26 4.88-5.72 2.03-1.4 4.44-2.14 6.91-2.12 1.82-.02 3.61.41 5.22 1.26 1.51.8 2.76 2.02 3.6 3.52l.12-3.83h9.93l-.02 29.97h-9.93l-.11-3.84a9.115 9.115 0 0 1-3.72 3.51c-1.69.86-3.57 1.28-5.46 1.24"></path><path id="Rectangle_39" data-name="Rectangle 39" class="cls-1" d="M97.07 33.36h18.17v6.29H97.07z"></path></g></g></g></g></g></svg></span>';
        $output .= '</a></div>';

        return $output;
    }

    /**
     * Build a custom pagination
     *
     * @param string $pages
     * @param integer $range
     * @return void
     */
    public static function wer_pagination($pages = '', $range = 4) {
        $showitems = ($range * 2) + 1;

        global $paged;
        if (empty($paged)) $paged = 1;

        global $wp_query;
        if ($pages == '') {
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            $pagination = "<div class='pagination'>";
            $pagination .= "<nav class='navigation__pages'>";

            if ($paged > 1) {
                $pagination .= "<a class='pagination__button prev' href='" . get_pagenum_link($paged - 1) . "'>
                    <span class='icon'>
                        <svg class='image--cover' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 22.918 17.86' height='17.86' width='22.918'><g xmlns='http://www.w3.org/2000/svg' transform='matrix(-1 0 0 -1 22.918 17.86)'><g id='Layer_2' data-name='Layer 2' transform='translate(0.5 0.5)'><path id='Path_19' data-name='Path 19' d='M18.842,22.856a.843.843,0,0,1-.6-1.441l7-6.987-7-6.987a.846.846,0,1,1,1.2-1.2l7.585,7.585a.843.843,0,0,1,0,1.2L19.44,22.611A.843.843,0,0,1,18.842,22.856Z' transform='translate(-5.357 -5.996)' fill='#4f4f4f' stroke='#4f4f4f' stroke-width='1' /><path id='Path_20' data-name='Path 20' d='M24.071,16.686H3.843a.843.843,0,0,1,0-1.686H24.071a.843.843,0,1,1,0,1.686Z' transform='translate(-3 -7.411)' fill='#4f4f4f' stroke='#4f4f4f' stroke-width='1' /></g></g></svg>
                    </span>
                </a>";
            } else {
                $pagination .= "<span class='pagination__button prev disabled'>
                    <span class='icon'>
                        <svg class='image--cover' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 22.918 17.86' height='17.86' width='22.918'><g xmlns='http://www.w3.org/2000/svg' transform='matrix(-1 0 0 -1 22.918 17.86)'><g id='Layer_2' data-name='Layer 2' transform='translate(0.5 0.5)'><path id='Path_19' data-name='Path 19' d='M18.842,22.856a.843.843,0,0,1-.6-1.441l7-6.987-7-6.987a.846.846,0,1,1,1.2-1.2l7.585,7.585a.843.843,0,0,1,0,1.2L19.44,22.611A.843.843,0,0,1,18.842,22.856Z' transform='translate(-5.357 -5.996)' fill='#4f4f4f' stroke='#4f4f4f' stroke-width='1' /><path id='Path_20' data-name='Path 20' d='M24.071,16.686H3.843a.843.843,0,0,1,0-1.686H24.071a.843.843,0,1,1,0,1.686Z' transform='translate(-3 -7.411)' fill='#4f4f4f' stroke='#4f4f4f' stroke-width='1' /></g></g></svg>
                    </span>
                </span>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && ( !($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    if ($paged == $i) {
                        $pagination .= "<span class='pagination__number current'>$i</span>";
                    } else {
                        $pagination .= "<a class='pagination__number' href='" . get_pagenum_link($i) . "'>$i</a>";
                    }
                }
            }

            if ($paged < $pages) {
                $pagination .= "<a class='pagination__button next' href='" . get_pagenum_link($paged + 1) . "'>
                    <span class='icon'>
                        <svg class='image--cover' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 22.918 17.86'><g data-name='Layer 2' fill='#4f4f4f' stroke='#4f4f4f'><path data-name='Path 19' d='M13.985 17.36a.843.843 0 0 1-.6-1.441l7-6.987-7-6.987a.849.849 0 1 1 1.2-1.2L22.17 8.33a.843.843 0 0 1 0 1.2l-7.587 7.585a.843.843 0 0 1-.598.245Z'/><path data-name='Path 20' d='M21.571 9.775H1.343a.843.843 0 0 1 0-1.686h20.228a.843.843 0 1 1 0 1.686Z'/></g></svg>
                    </span>
                </a>";
            } else {
                $pagination .= "<span class='pagination__button next disabled'> 
                    <span class='icon'>
                        <svg class='image--cover' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 22.918 17.86'><g data-name='Layer 2' fill='#4f4f4f' stroke='#4f4f4f'><path data-name='Path 19' d='M13.985 17.36a.843.843 0 0 1-.6-1.441l7-6.987-7-6.987a.849.849 0 1 1 1.2-1.2L22.17 8.33a.843.843 0 0 1 0 1.2l-7.587 7.585a.843.843 0 0 1-.598.245Z'/><path data-name='Path 20' d='M21.571 9.775H1.343a.843.843 0 0 1 0-1.686h20.228a.843.843 0 1 1 0 1.686Z'/></g></svg>
                        </span>
                    </span>";
            }

            $pagination .= "</nav>";
            $pagination .= "</div>";

            echo $pagination;
        }
    }

}
