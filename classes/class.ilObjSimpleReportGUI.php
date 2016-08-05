<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionGUI.php";

/**
 * User Interface class for example repository object.
 * ...
 * @ilCtrl_isCalledBy ilObjSimpleReportGUI: ilRepositoryGUI, ilAdministrationGUI, ilObjPluginDispatchGUI
 * @ilCtrl_Calls ilObjSimpleReportGUI: ilPermissionGUI, ilInfoScreenGUI, ilObjectCopyGUI, ilCommonActionDispatcherGUI
 */
class ilObjSimpleReportGUI extends ilOrgUnitExtensionGUI {

	/**
	 * @var ilObjSimpleReport
	 */
	public $object;

	/**
	 * Functions that must be overwritten
	 */
	public function getType() {
		return "xsre";
	}

	public function performCommand($cmd) {
			switch($cmd) {
				case "show":
				$this->$cmd();
					break;
				default:
					throw new Exception("The command $cmd is not valid for this class.");
			}
	}

	/**
	 * Cmd that will be redirected to after creation of a new object.
	 */
	function getAfterCreationCmd() {
		return "show";
	}

	protected function show() {
		global $tpl;

		$sups = $this->object->getMySuperiors(true);
		$emps = $this->object->getMyEmployees(true);
		$html = "<h3>Rekursiv from {$this->object->getOrgUnit()->getTitle()}:</h3><hr>superiors:<ul>";

		foreach($sups as $supId) {
			$user = new ilObjUser($supId);
			$html .= "<li>{$user->getPublicName()}</li>";
		}

		$html .= "</ul>";
		$html .= "employees:<ul>";

		foreach($emps as $empId) {
			$user = new ilObjUser($empId);
			$html .= "<li>{$user->getPublicName()}</li>";
		}

		$html .= "</ul>";

		$tpl->setContent($html);

	}

	function getStandardCmd() {
		return "show";
	}
}