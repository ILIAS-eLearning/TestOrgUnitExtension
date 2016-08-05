<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionPlugin.php";

class ilSimpleReportPlugin extends ilOrgUnitExtensionPlugin {

	/**
	 * Get Plugin Name. Must be same as in class name il<Name>Plugin
	 * and must correspond to plugins subdirectory name.
	 *
	 * Must be overwritten in plugin class of plugin
	 *
	 * @return    string    Plugin Name
	 */
	function getPluginName() {
		return "SimpleReport";
	}

	protected function uninstallCustom() {
		// TODO: Implement uninstallCustom() method.
	}

	/**
	 * returns true iff the plugin shows up in the navigation tree.
	 * @return bool
	 */
	public function showInTree() {
		return true;
	}
}