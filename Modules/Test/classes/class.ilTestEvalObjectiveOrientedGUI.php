<?php
/* Copyright (c) 1998-2013 ILIAS open source, Extended GPL, see docs/LICENSE */

require_once './Modules/Test/classes/class.ilTestServiceGUI.php';

/**
 * @author		Björn Heyser <bheyser@databay.de>
 * @version		$Id$
 *
 * @package     Modules/Test
 *
 * @ilCtrl_Calls ilTestEvalObjectiveOrientedGUI: ilTestResultsToolbarGUI
 */
class ilTestEvalObjectiveOrientedGUI extends ilTestServiceGUI
{
	public function executeCommand()
	{
		$this->ctrl->saveParameter($this, "active_id");
		
		switch( $this->ctrl->getNextClass($this) )
		{
			default:
				$this->handleTabs('results_objective_oriented');
				$cmd = $this->ctrl->getCmd().'Cmd';
				$this->$cmd();
		}
	}

	public function showVirtualPassSetTableFilterCmd()
	{
		$tableGUI = $this->buildPassDetailsOverviewTableGUI($this, 'showVirtualPass');
		$tableGUI->initFilter();
		$tableGUI->resetOffset();
		$tableGUI->writeFilterToSession();
		$this->showVirtualPassCmd();
	}

	public function showVirtualPassResetTableFilterCmd()
	{
		$tableGUI = $this->buildPassDetailsOverviewTableGUI($this, 'showVirtualPass');
		$tableGUI->initFilter();
		$tableGUI->resetOffset();
		$tableGUI->resetFilter();
		$this->showVirtualPassCmd();
	}
	
	private function showVirtualPassCmd()
	{
		$testSession = $this->testSessionFactory->getSession();

		if( !$this->object->getShowPassDetails() )
		{
			$executable = $this->object->isExecutable($testSession, $testSession->getUserId());

			if($executable["executable"])
			{
				$this->ctrl->redirectByClass("ilobjtestgui", "infoScreen");
			}
		}
		
		$this->tabs->setBackTarget(
			$this->lng->txt('tst_results_back_introduction'),
			$this->ctrl->getLinkTargetByClass('ilobjtestgui', 'participants')
		);

		$toolbar = $this->buildUserTestResultsToolbarGUI();
		$this->ctrl->setParameter($this, 'pdf', '1');
		$toolbar->setPdfExportLinkTarget( $this->ctrl->getLinkTarget($this, 'showVirtualPass') );
		$this->ctrl->setParameter($this, 'pdf', '');
		$toolbar->build();
		
		$virtualSequence = $this->service->buildVirtualSequence($testSession);
		$userResults = $this->service->getVirtualSequenceUserResults($virtualSequence);
		
		require_once 'Modules/Course/classes/Objectives/class.ilLOTestQuestionAdapter.php';
		$objectivesAdapter = ilLOTestQuestionAdapter::getInstance($testSession);

		$objectivesList = $this->buildQuestionRelatedObjectivesList($objectivesAdapter, $virtualSequence);
		$objectivesList->loadObjectivesTitles();

		require_once 'Modules/Test/classes/class.ilTestResultHeaderLabelBuilder.php';
		$testResultHeaderLabelBuilder = new ilTestResultHeaderLabelBuilder($this->lng, $this->objCache);

		$testResultHeaderLabelBuilder->setObjectiveOrientedContainerId($testSession->getObjectiveOrientedContainerId());
		$testResultHeaderLabelBuilder->setUserId($testSession->getUserId());
		$testResultHeaderLabelBuilder->setTestObjId($this->object->getId());
		$testResultHeaderLabelBuilder->setTestRefId($this->object->getRefId());
		$testResultHeaderLabelBuilder->initObjectiveOrientedMode();

		$tpl = new ilTemplate('tpl.il_as_tst_virtual_pass_details.html', false, false, 'Modules/Test');
		
		$command_solution_details = "";
		if ($this->object->getShowSolutionDetails())
		{
			$command_solution_details = "outCorrectSolution";
		}

		$questionAnchorNav = false;
		if( $this->object->canShowSolutionPrintview() )
		{
			$questionAnchorNav = true;
			
			$list_of_answers = $this->getPassListOfAnswers(
				$userResults, $testSession->getActiveId(), null, $this->object->getShowSolutionListComparison(),
				false, false, false, true, $objectivesList, $testResultHeaderLabelBuilder
			);
			$tpl->setVariable("LIST_OF_ANSWERS", $list_of_answers);
		}

		$overviewTableGUI = $this->getPassDetailsOverview(
			$userResults, $testSession->getActiveId(), null, $this, "showVirtualPass",
			$command_solution_details, $questionAnchorNav, $objectivesList
		);
		$overviewTableGUI->setTitle($testResultHeaderLabelBuilder->getVirtualPassDetailsHeaderLabel(
			$objectivesList->getUniqueObjectivesString()
		));
		$tpl->setVariable("PASS_DETAILS", $this->ctrl->getHTML($overviewTableGUI));

		$this->populateContent($this->ctrl->getHTML($toolbar).$tpl->get());
	}
}