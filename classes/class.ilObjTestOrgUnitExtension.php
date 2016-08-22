<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtension.php";

class ilObjTestOrgUnitExtension extends ilOrgUnitExtension {

	protected function initType() {
		$this->setType("xsre");
	}
}