<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionListGUI.php";

class ilObjSimpleReportListGUI extends ilOrgUnitExtensionListGUI {

	function getGuiClass() {
		return "ilObjSimpleReportGUI";
	}

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