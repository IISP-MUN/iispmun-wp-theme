<?php

function filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function filter_wrap_pdfs($content)
{
    return preg_replace('/\[pdf-embedder url="(.*)"]/', '<div class="pdf-container" onclick="window.location=\'\1\'">[pdf-embedder url="\1"]</div>', $content);
}

add_filter("the_content", "filter_ptags_on_images");
add_filter("the_content", "filter_wrap_pdfs");
