<?php

/**
 * Returns the path to theme/dist
 * @return String
 */
function halt_assets() {
  return get_template_directory_uri() . '/dist';
}
