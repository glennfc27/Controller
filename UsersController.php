<?php
class UsersController extends AppController{

    public $view = 'Themed';
    public $theme = 'PrestigeTheme';


	public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index(){

    }

    public function add(){
        $this->theme = 'PrestigeTheme';
        $this->layout = 'default';
        $this->loadModel('Role');
    	$role = $this->Role->find('list', array('fields'=>array('id', 'description')));
    	$this->set(compact('role'));

        if ($this->request->is('post')){
            if ($this->User->find('count', array('conditions'=>array('username'=>$this->request->data['User']['username']))) == 0){
                if ($this->User->save($this->request->data)){
                    $this->Session->setFlash('New user successfully saved.');
                    $this->redirect(array('action'=>'index'));
                }else{
                    $this->Session->setFlash('Unable to save new user.');
                }
            }else{
                $this->Session->setFlash('Username already exists.');
            }
        }

    }

    public function admin(){
        if ($this->Auth->user('role_id') != 1){
            if ($this->referer() == '/'){
                $this->redirect(array('action'=>'index'));
            }else{
                $this->redirect($this->referer());
            }
        }

    }

    public function login(){

        if ($this->request->is('post')){
            if ($this->Auth->login()){
                if ($this->Auth->user('user_status') == 1){
                    $this->redirect(array('action'=>'index'));

                    if ($this->Auth>user('role_id') == 1){

                    }
                    elseif ($this->Auth>user('role_id') == 2) {
                        
                    }
                    elseif ($this->Auth>user('role_id') == 3) {
                        
                    }
                    elseif ($this->Auth>user('role_id') == 4) {
                        
                    }
                    elseif ($this->Auth>user('role_id') == 5) {
                        
                    }
                    elseif ($this->Auth>user('role_id') == 6) {
                        
                    }

                }else{
                    $this->Session->setFlash('Login failed.');
                }
            }else{
                $this->Session->setFlash('Login failed.');
            }
        }else{
            if ($this->Auth->login()){
                $this->redirect(array('action'=>'index'));
            }
            
        }
    }

    public function logout(){
    	$this->Session->destroy();
    	$this->Auth->logout();
    	$this->Session->setFlash('Logged out');
        $this->redirect($this->Auth->redirect());
    }
}

?>