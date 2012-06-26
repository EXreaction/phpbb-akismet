<?php
/**
*
* @package phpBB3-Akismet
* @copyright (c) 2012 Nathaniel Guse
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

define('UMIL_AUTO', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

define('IN_PHPBB', true);
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/phpbb_akismet');

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

$mod_name = 'PHPBB_AKISMET';
$version_config_name = 'phpbb_akismet_version';

$versions = array(
	'1.0.0-dev'	=> array(
		'table_column_add'	=> array(
			array(POSTS_TABLE, 'akismet_spam', array('BOOL', 0)),
			array(POSTS_TABLE, 'akismet_ham', array('BOOL', 0)),
		),
		'config_add'		=> array(
			array('phpbb_akismet_enabled', true),
			array('phpbb_akismet_key', ''),
		),
	),
);

include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);