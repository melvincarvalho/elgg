<?php
/**
 * Make another user an admin.
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 */

global $CONFIG;

// block non-admin users
admin_gatekeeper();

// Get the user
$guid = get_input('guid');
$obj = get_entity($guid);

if (($obj instanceof ElggUser) && ($obj->canEdit())) {
	$obj->admin = '';
	if (!$obj->admin) {
		system_message(elgg_echo('admin:user:removeadmin:yes'));
	} else {
		register_error(elgg_echo('admin:user:removeadmin:no'));
	}
} else {
	register_error(elgg_echo('admin:user:removeadmin:no'));
}

forward($_SERVER['HTTP_REFERER']);
