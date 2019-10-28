<?php

function global_ui_body_styles($isImportant=null) {

    $bodyStyle = get_acf_block('global_ui', 'typography', 'body_style');

    $styleArr = array();

    if($bodyStyle) {

        if($isImportant == true) {
            $important = ' !important';
        }
        else {
            $important = null;
        }


        $styleArr[] = 'body {';

        if($bodyStyle['font_size']) {
            $styleArr[] = 'font-size: ' .$bodyStyle['font_size'].'px'.$important.'; ';
        }

        if($bodyStyle['font_family']) {
            $styleArr[] = 'font-family: ' .$bodyStyle['font_family'] .''.$important.'; ';
        }

        if($bodyStyle['text_color']) {
            $styleArr[] = 'color: ' .$bodyStyle['text_color'] .''.$important.'; ';
        }

        if($bodyStyle['font_weight']) {
            $styleArr[] = 'font-weight: ' .$bodyStyle['font_weight'] .''.$important.'; ';
        }

        $styleArr[] = '}';

        return implode(" ",$styleArr);

    }
    else {
        return false;
    }

}

function global_ui_heading_styles($isImportant=null) {
    $headingStyles = get_acf_block('global_ui', 'typography', 'heading_styles');

    if($headingStyles) {


        if($isImportant == true) {
            $important = ' !important';
        }
        else {
            $important = null;
        }

        $styleArr = array();

        foreach ($headingStyles as $heading) {
            $styleArr[] = $heading["heading_item"].', .'.$heading["heading_item"].' {';

            if($heading["heading_font"]["font_size"]) {
                $styleArr[] =  'font-size: ' .$heading["heading_font"]["font_size"] .'px'.$important.'; ';
            }

            if($heading["heading_font"]["font_family"]) {
                $styleArr[] =  'font-family: ' .$heading["heading_font"]["font_family"] .''.$important.'; ';
            }

            if($heading["heading_font"]["font_weight"]) {
                $styleArr[] =  'font-weight: ' .$heading["heading_font"]["font_weight"] .''.$important.'; ';
            }

            if($heading["heading_font"]["font_style"]) {
                $styleArr[] =  'font-style: ' .$heading["heading_font"]["font_style"] .''.$important.'; ';
            }

            if($heading["heading_font"]["line_height"]) {
                $styleArr[] =  'line-height: ' .$heading["heading_font"]["line_height"] .'px'.$important.'; ';
            }

            if($heading["heading_font"]["letter_spacing"]) {
                $styleArr[] =  'letter-spacing: ' .$heading["heading_font"]["letter_spacing"] .'px'.$important.'; ';
            }

            if($heading["heading_font"]["text_color"]) {
                $styleArr[] =  'color: ' .$heading["heading_font"]["text_color"] .''.$important.'; ';
            }

            if($heading["heading_font"]["text_transform"]) {
                $styleArr[] =  'text-transform: ' .$heading["heading_font"]["text_transform"] .''.$important.'; ';
            }
            $styleArr[] = '}';

        }
        return implode(" ",$styleArr);

    }
    else {
        return false;
    }

}




