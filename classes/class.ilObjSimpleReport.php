<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtension.php";

class ilObjSimpleReport extends ilOrgUnitExtension {

	protected function initType() {
		$this->setType("xsre");
	}
}