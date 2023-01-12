<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_assign extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'permisson_model',
        )); 
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 
    } 
 
    public function rolecreate(){
        //print_r('drger');exit; 
        $data['module'] = display("permission");
        $data['title'] = display('add_role');
        $data['role'] = $this->permisson_model->rolelist();
        $data['content'] = $this->load->view('permission/addrole',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }  

    public function create(){
        $this->form_validation->set_rules('type', display('type') ,'required|max_length[50]');
        if($this->form_validation->run() === true) {
             $data['doctor'] = (object)$postData = [
               'type'      => $this->input->post('type',true),    
             ];
             $this->permisson_model->create($postData);
             $this->session->set_flashdata('message',display('save_successfully'));
             redirect('permission_assign/rolelist');
        }
        else{
             $this->session->set_flashdata('exception', display('please_try_again'));
             redirect('permission_assign/role');
        }
    }

    public function rolelist(){
        $data['module'] = display("permission");
        $data['title'] = display('role_list');
        $data['role'] = $this->permisson_model->rolelist();

        $data['content'] = $this->load->view('permission/rolelist',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }
    public function edit($id){
        $data['module'] = display("permission");
        $data['title'] = display('add_role');
        $data['role'] = $this->permisson_model->rolelistedit($id);
        $data['modules']= $this->permisson_model->module();
        $data['content'] = $this->load->view('permission/rolelistedit',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }


    public function permission_update(){

        $role_id = $this->input->post('rid');
        $fk_module_id = $this->input->post('fk_module_id');
        $create = $this->input->post('create');
        $read = $this->input->post('read');
        $update = $this->input->post('update');
        $delete = $this->input->post('delete');
        
        
        $data['rolename'] = (object)$postData = [
               'type'      => $this->input->post('role_name',true),    
        ];
        $this->permisson_model->update($postData,$role_id);

        $this->permisson_model->permission_delete($role_id);

        $new_array = array();
        for ($m = 0; $m < sizeof($fk_module_id); $m++) {
            for ($i = 0; $i < sizeof($fk_module_id[$m]); $i++) {
                for ($j = 0; $j < sizeof($fk_module_id[$m][$i]); $j++) {
                    $dataStore = array(
                        'role_id' => $role_id,
                        'fk_module_id' => $fk_module_id[$m][$i][$j],
                        'create' => (!empty($create[$m][$i][$j]) ? $create[$m][$i][$j] : 0),
                        'read' => (!empty($read[$m][$i][$j]) ? $read[$m][$i][$j] : 0),
                        'update' => (!empty($update[$m][$i][$j]) ? $update[$m][$i][$j] : 0),
                        'delete' => (!empty($delete[$m][$i][$j]) ? $delete[$m][$i][$j] : 0),
                    );
                    array_push($new_array, $dataStore);
                }
            }
        }
        if($this->permisson_model->create_permission_update($new_array)) {
            
        }else{
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        $this->session->set_flashdata('message',display('update_successfully'));
        redirect('permission_assign/rolelist');
    }
    public function delete($id){
        $data['title'] = display('add_role');
        $data['role'] = $this->permisson_model->delete($id);
        $this->session->set_flashdata('message',display('delete_successfully'));
        redirect('permission_assign/rolelist');
    } 
    public function createpermission(){
        $data['module'] = display("permission");
        $data['title'] = display('permission');
        $data['role'] = $this->permisson_model->rolelist();
        $data['module_all_list'] = $this->permisson_model->module_all_list();
        $data['content'] = $this->load->view('permission/permission_form',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function showpermission($user_role=null){
        $html = '';
        $module_all_list = $this->permisson_model->module_all_list();
        $m=0;
         foreach($module_all_list as $m_data){
             $account_sub = $this->db->select('*')->from('sub_module')->where('mid',$m_data->id)->get()->result();
        $html .= form_open_multipart('permission_assign/permission_insert');
        $html .= form_hidden('role_id', $user_role, '', 'id="role_id"');   
        $html.= '<h2>'.$m_data->name.'</h2>
         <table class="table table-bordered">
            <thead>
            <tr>
                <th>'.display('sl_no').'</th>
                <th>'.display('module_name').'</th>
                <th>'.display('create').'</th>
                <th>'.display('read').'</th>
                <th>'.display('update').'</th>
                <th>'.display('delete').'</th>
            </tr>
            </thead>';
                $sl =0;
                 if (!empty($account_sub)) {
                     foreach ($account_sub as $fk_module_id => $module_name) {
                        $getPermission = $this->permisson_model->get_permission($user_role, $module_name->id);
                        $createID = 'id="create'.$m.''.$sl.'"';
                        $readID   = 'id="read'.$m.''.$sl.'"';
                        $updateID = 'id="update'.$m.''.$sl.'"';
                        $deleteID = 'id="delete'.$m.''.$sl.'"';
                      
                      $html.=  '<tbody>
                        <tr>
                            <td>'.($sl+1).'</td>
                            <td>
                                '.$module_name->name.'
                                <input type="hidden" name="fk_module_id['.$m.']['.$sl.'][]" value="'.$module_name->id.'" id="id_'.$module_name->id.'">
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    '.form_checkbox('create['.$m.']['.$sl.'][]', '1', ((!empty($getPermission->create) && ($getPermission->create==1))?set_checkbox('create['.$m.']['.$sl.'][]', '1', true):null), $createID).'
                            <label for="create'.$m.$sl.'"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    '.form_checkbox('read['.$m.']['.$sl.'][]', '1', ((!empty($getPermission->read) && ($getPermission->read==1))?set_checkbox('create['.$m.']['.$sl.'][]', '1', true):null), $readID).'
                                    <label for="read'.$m.$sl.'"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    '.form_checkbox('update['.$m.']['.$sl.'][]', '1', ((!empty($getPermission->update) && ($getPermission->update==1))?set_checkbox('create['.$m.']['.$sl.'][]', '1', true):null), $updateID).'
                                    <label for="update'.$m.$sl.'"></label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success text-center">
                                    '.form_checkbox('delete['.$m.']['.$sl.'][]', '1', ((!empty($getPermission->delete) && ($getPermission->delete==1))?set_checkbox('create['.$m.']['.$sl.'][]', '1', true):null), $deleteID).'
                                    <label for="delete'.$m.$sl.'"></label>
                                </div>
                            </td>
                        </tr>
                           </tbody>';
                        $sl++;
                               } 
                            }
                $html .='</table>';
                
                  $m++; }
                $html .='<div class="form-group pull-right">         
                            <div class="ui buttons">
                                <button type="reset" class="ui button">'.display('reset').'</button>
                                <div class="or"></div>
                                <button class="ui positive button">'.display('save').'</button>
                            </div>  
                        </div>';
                $html .= form_close();
         echo json_encode($html);
    }

    public function permission_insert(){
        $data['module'] = display("permission");
        $data['title'] = display('role_permission');
        $role_id = $this->input->post('role_id');
        $fk_module_id = $this->input->post('fk_module_id');
        $create = $this->input->post('create');
        $read = $this->input->post('read');
        $update = $this->input->post('update');
        $delete = $this->input->post('delete');
        #------------------------------------#
        $new_array = array();
        for ($m = 0; $m < sizeof($fk_module_id); $m++) {
            for ($i = 0; $i < sizeof($fk_module_id[$m]); $i++) {
                for ($j = 0; $j < sizeof($fk_module_id[$m][$i]); $j++) {
                    $dataStore = array(
                        'role_id' => $role_id,
                        'fk_module_id' => $fk_module_id[$m][$i][$j],
                        'create' => (!empty($create[$m][$i][$j]) ? $create[$m][$i][$j] : 0),
                        'read' =>   (!empty($read[$m][$i][$j]) ? $read[$m][$i][$j] : 0),
                        'update' => (!empty($update[$m][$i][$j]) ? $update[$m][$i][$j] : 0),
                        'delete' => (!empty($delete[$m][$i][$j]) ? $delete[$m][$i][$j] : 0),
                    );
                    array_push($new_array, $dataStore);
                }
            }
        }
        /*-----------------------------------*/
        if ($this->permisson_model->create_permission($new_array,$role_id)) {
           $this->session->set_flashdata('message',display('save_successfully'));
           redirect('permission_assign/createpermission');
        }
        else {
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect("permission_assign/createpermission");
    }

    public function permassign(){ 
        $data['title'] = display('permission_assign');

        $data['user'] = $this->permisson_model->user_list();
        $data['role'] = $this->permisson_model->rolelist();
        
        $data['content'] = $this->load->view('permission/permission_assign',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }
    public function permission_assign_insert(){
       $this->form_validation->set_rules('userid', display('userid'),'required');
       $this->form_validation->set_rules('roleid', display('roleid'),'required');

       $data['role'] = (object)$userLevelData = array(
               'user_id'   => $this->input->post('userid'),
               'roleid'      => $this->input->post('roleid'),
               'createby'     => $this->session->userdata('user_id'),
               'createdate  '     => date('Y-m-d h:i:s')
       );
       if($this->form_validation->run()== FALSE) {
           $this->session->set_flashdata('exception', display('please_try_again'));
           redirect("permission_assign/permassign");
       }
       else{
           $role_reult = $this->db->select('*')
                ->from('sec_userrole')
                ->where('user_id', $userLevelData['user_id'])
                ->get()
                ->row();
           if(!empty($role_reult)){
               $this->session->set_flashdata('exception', display('role_aready_exists'));
               redirect("permission_assign/permassign");
           }else{
               $this->permisson_model->create_role($userLevelData);
               $this->session->set_flashdata('message', display('save_successfully'));
               redirect("permission_assign/permassign");
           }
       }
    }
  
    public function userassign($id){
        $role_reult = $this->db->select('sec_role.*,sec_userrole.*')
            ->from('sec_userrole')
            ->join('sec_role','sec_userrole.roleid=sec_role.id')
            ->where('sec_userrole.user_id', $id)
            ->group_by('sec_role.type')
            ->get()
            ->result();

        if ($role_reult) {
            $html = "";

            $html .= "<table id=\"dataTableExample2\" class=\"table table-bordered table-striped table-hover\">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       <tbody>";
            $i = 1;
            foreach ($role_reult as $key => $role) {
                $url=base_url()."permission_assign/delete_role/$role->id";
                $html .= "<tr>
                                <td>$i</td>
                                <td>$role->type</td>
                                <td><a href=\"$url\" style=\"color:red\">Delete</a></td>
                          </tr>";
                $i++;
            }
            $html .= "</tbody>
                    </table>";
        }
        else{
            $html = "";
            $html.= "<p style=\"color:red\">No Role Selected</p>";
        }
        echo $html;
    }
    public function delete_role($id){
       $this->permisson_model->delete_role($id);
       $this->session->set_flashdata('message', display('delete_successfully'));
       redirect("permission_assign/permassign");
    }
}
