<?php

function iispmun_remove_core_patterns()
{
    remove_theme_support("core-block-patterns");
}

add_action("init", "iispmun_remove_core_patterns");
