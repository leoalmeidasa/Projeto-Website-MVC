<?php
//
//use MatthiasMullie\Minify\CSS;
//
//if (strpos(url(), "localhost")) {
//    /**
//     * CSS
//     */
//
//    $minCSS = new CSS();
//    $minCSS->add(__DIR__ . "/../../shared/styles/styles.css");
//    $minCSS->add(__DIR__ . "/../../shared/styles/boot.css");
//
//    //theme CSS
//    $cssDir = scandir(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/css");
//    foreach ($cssDir as $css) {
//        $cssFile = __DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
//        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
//            $minCSS->add($cssFile);
//        }
//    }
//
//    //Minify CSS
//    $minCSS->minify(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/assets/style.css");
//
//    /**
//     * JS
//     */
//}
