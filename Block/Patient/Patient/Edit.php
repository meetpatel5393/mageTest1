<?php
namespace Block\Patient\Patient;
\Mage::loadFileByClassName('Block\Core\Edit');
class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Patient/Patient/edit.php');
    }
}
