<?php

require_once "Modules/OrgUnit/classes/Extension/class.ilOrgUnitExtensionGUI.php";

/**
 * User Interface class for example repository object.
 * ...
 * @ilCtrl_isCalledBy ilObjTestOrgUnitExtensionGUI: ilRepositoryGUI, ilAdministrationGUI, ilObjPluginDispatchGUI
 * @ilCtrl_Calls ilObjTestOrgUnitExtensionGUI: ilPermissionGUI, ilInfoScreenGUI, ilObjectCopyGUI, ilCommonActionDispatcherGUI
 */
class ilObjTestOrgUnitExtensionGUI extends ilOrgUnitExtensionGUI {

	/**
	 * @var ilObjTestOrgUnitExtension
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

		// Object Org Unit
		$html = "<h3>Rekursiv from {$this->object->getOrgUnit()->getTitle()}:</h3><hr>superiors:<ul>";

		// Superiors and employees
		$sups = $this->object->getSuperiors(true);
		$emps = $this->object->getEmployees(true);
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

		// Path
		$html .= "<hr /> Path <br />".implode(" > ", $this->object->getOrgUnitPathTitles());
		$html .= "<hr />";

		// Subtree
		$subtree = $this->object->getOrgUnitSubtree(true, "orgu");
		$html .= "Subtree: <br /><ul>";
		foreach ($subtree as $item) {
			$html .= "<li>".$item['title']."</li>";
		}
		$html .= "</ul>";

		$tpl->setContent($html);
	}

	function getStandardCmd() {
		return "show";
	}
}