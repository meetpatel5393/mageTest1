<?php
namespace Block\Patient\Layout;
class Header extends \Block\Core\Template
{
	public function __construct()
	{
		$this->setTemplate('patient/layout/header.php');
	}
}