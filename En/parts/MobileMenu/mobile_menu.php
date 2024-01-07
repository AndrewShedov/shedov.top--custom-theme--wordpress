<?php

function twentytwenty_add_sub_toggles_to_main_menu( $args, $item, $depth ) {
	
	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles )) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<div class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
		
			
			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle" aria-label="Expand side menu" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . '" aria-expanded="false"><span class="screen-reader-text">'  . '</span>' . '<!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
			<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			
			<g stroke-width="0"/>
			
			<g stroke-linecap="round" stroke-linejoin="round"/>
			
			<g> <path d="M6 15L12 9L18 15"   stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
			
			</svg>' . '</button>';

		}

		// Close the wrapper.
		$args->after .= '</div><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'primary' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}

add_filter( 'nav_menu_item_args', 'twentytwenty_add_sub_toggles_to_main_menu', 10, 3 );





