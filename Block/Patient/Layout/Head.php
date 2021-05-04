<?php
namespace Block\Patient\Layout;
class Head extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('patient/layout/head.php');
	}
}