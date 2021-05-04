<?php
namespace Block\Patient\Patient;
\Mage::loadFileByClassName('Block\Core\Grid');
class Grid extends \Block\Core\Grid
{
	protected $patientName = '';
	public function __construct(){
		parent::__construct();
		$this->prepareColumn();
		$this->prepareActions();
		$this->prepareButton();
	}

	public function setPatientName($patientName){
		$this->patientName = $patientName;
		return $this;
	}

	public function getPatientName(){
		return $this->patientName;
	}

	public function prepareCollection(){
        $model = \Mage::getModel('Patient');
		
		if($this->patientName){
			$query = "SELECT * FROM `{$model->getTableName()}` WHERE name LIKE '%{$this->patientName}%'";
			$collection = $model->fetchAll($query);
		} else {
			$collection = $model->fetchAll();
		}

        $this->setCollection($collection);
        return $this;
    }	

	public function prepareColumn(){
		$this->addColumn('patientId', [
			'field'=>'patientId',
			'label'=>'Patient Id',
			'type'=>'number'
		]);
		$this->addColumn('name', [
			'field'=>'name',
			'label'=>'Patient Name',
			'type'=>'text'
		]);
		$this->addColumn('age', [
			'field'=>'age',
			'label'=>'Age',
			'type'=>'number'
		]);
		$this->addColumn('address', [
			'field'=>'address',
			'label'=>'Address',
			'type'=>'textarea'
		]);
		$this->addColumn('mobileNumber', [
			'field'=>'mobileNumber',
			'label'=>'Mobile Number',
			'type'=>'number'
		]);
		$this->addColumn('action', [
			'field'=>'action',
			'label'=>'Action',
			'type'=>''
		]);
	}

	public function prepareActions(){
		$this->addAction('edit', [
			'label'=>'Edit',
			'method'=>'getEditUrl',
			'ajax'=>false
		]);
		$this->addAction('delete', [
			'label'=>'Delete',
			'method'=>'getDeleteUrl',
			'ajax'=>false
		]);
	}

	public function prepareButton(){
		$this->addButton('addNew', [
			'label' => 'Add Patient',
			'method' => 'getAddNewUrl',
			'ajax' => false,
			'class'=>'btn btn-success'
		]);
		$this->addButton('reset', [
			'label' => 'Reset',
			'method' => 'getResetUrl',
			'ajax' => false,
			'class'=>'btn btn-danger'
		]);
	}

	public function getEditUrl($row){
		return $this->getUrl()->getUrl('show',null,['patientId'=>$row->patientId]);
	}

	public function getDeleteUrl($row){
		return $this->getUrl()->getUrl('delete',null,['patientId'=>$row->patientId]);	
	}

	public function getAddNewUrl(){
		return $this->getUrl()->getUrl('show','Patient',null,true);
	}

	public function getResetUrl(){
		return $this->getUrl()->getUrl('grid','Patient',null,true);
	}

	public function getTitle(){
		return 'Patient Record';
	}
}