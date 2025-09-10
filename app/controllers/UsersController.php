<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 * 
 * Automatically generated via CLI.
 */
class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function UsersData()
    {
        $data['users'] = $this->UsersModel->all();
        $this->call->view('users/UsersData', $data);
    }
    function create(){
        if($this->io->method() == 'post'){
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $data = array(
                'username' => $username,
                'email' => $email
            );
            if ($this->UsersModel->insert($data)){
                redirect('users/UsersData');
            } else {
                echo "Error inserting data.";
            }
        } else {
           $this->call->view('users/create');
        }
    }
    function update($id){
        $user = $this->UsersModel->find($id);
        if(!$user){
            echo "User not found.";
            return;
        }
        
        if($this->io->method() == 'post'){
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $data = array(
                'username' => $username,
                'email' => $email
            );
            if ($this->UsersModel->update($id, $data)){
                redirect('users/UsersData');
            } else {
                echo "Error updating data.";
            }
        } else {
            $data['user'] = $user;
           $this->call->view('users/update', $data);
        }
    }
    function delete($id){
        if ($this->UsersModel->delete($id)){
            redirect('users/UsersData');
        } else {
            echo "Error deleting data.";
        }
    }
}