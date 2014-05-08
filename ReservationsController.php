<?php
class ReservationsController extends AppController{

	public function index(){

	}

	public function add(){
		$this->loadModel('Clients_view');
		$clients = $this->Clients_view->find('list', array('fields'=>array('id', 'app_fullname')));
		$this->set(compact('clients'));
	}

	public function edit($id=null){
		
	}
}
?>