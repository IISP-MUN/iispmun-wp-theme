<?php

function iispmun_register_patterns() {
	register_block_pattern(
		"iispmun/mun-theme",
		array(
			"title" => __( "MUN Theme", "iispmun" ),
			"content" => file_get_contents( get_theme_file_path( "patterns/mun-theme.html" ) ),
		)
	);
}

function iispmun_remove_core_patterns() {
	remove_theme_support("core-block-patterns");
}

add_action("init", "iispmun_remove_core_patterns");
add_action( "init", "iispmun_register_patterns" );
