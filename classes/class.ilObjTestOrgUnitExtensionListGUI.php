<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionListGUI.php";

/**
 * Class ilObjTestOrgUnitExtensionListGUI
 *
 * @author Oskar Truffer <ot@studer-raimann.ch>
 */
class ilObjTestOrgUnitExtensionListGUI extends ilOrgUnitExtensionListGUI {

	function getGuiClass() {
		return "ilObjTestOrgUnitExtensionGUI";
	}

	/**
	 * @return array return an array with 3 keys: permission,
	 */
	function initCommands() {
		return array
		(
			array(
				"permission" => "read",
				"cmd" => "show",
				"default" => true)
		);
	}

	function initType() {
		$this->setType("xsre");
	}
}