<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionListGUI.php";

/**
 * Class ilObjSimpleReportListGUI
 *
 * @author Oskar Truffer <ot@studer-raimann.ch>
 */
class ilObjSimpleReportListGUI extends ilOrgUnitExtensionListGUI {

	function getGuiClass() {
		return "ilObjSimpleReportGUI";
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