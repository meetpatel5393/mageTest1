<?php 
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
class Patient extends \Model\Core\Table
{
	public function __construct(){
		$this->setTableName('patient_data');
		$this->setPrimaryKey('patientId');
	}
}