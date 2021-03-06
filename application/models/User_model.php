<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User_model extends CI_Model
{

     function check_user($user, $pass) {

             $this->db->select('*');        
             $this->db->where('username', $user);    
             $this->db->where('is_deleted', 0);
             $this->db->limit(1);

             $query = $this->db->get('users');

             if($query->num_rows() == 1)   { //checks if username exists

                $result = $query->row_array(); //fetch the row array

                if(password_verify($pass, $result['password'])) {
                    return $result;
                } else {
                    return FALSE;
                }
                
               
             }   else   {

                return FALSE;

             }

    }

    /**
     * Fetches the User Records
     * @param  String       $user     the username
     * @return String Array           the array of row 
     */
    function userdetails($user) {

             $this->db->select('*');        
             $this->db->where('username', $user);          
             $this->db->limit(1);

             $query = $this->db->get('users');

             return $query->row_array();
    }


    function create_user() {

            $filename = ''; //img filename empty if not present

            //Process Image Upload
              if($_FILES['img']['name'] != NULL)  {        

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['encrypt_name'] = TRUE;                        

                $this->load->library('upload', $config);
                $this->upload->initialize($config);         
                
                $field_name = "img";
                $this->upload->do_upload($field_name);
                $data2 = array('upload_data' => $this->upload->data());
                foreach ($data2 as $key => $value) {     
                  $filename = $value['file_name'];
                }
                
            }
      
            $data = array(              
                'username'  => $this->input->post('username'),  
                'password'  => password_hash('Bianos', PASSWORD_DEFAULT),  //Default Password
                'name'      => $this->input->post('name'),  
                'email'     => $this->input->post('email'),  
                'contact'   => $this->input->post('contact'),  
                'usertype'  => $this->input->post('usertype'),                          
                'img'       => $filename  
             );
       
            return $this->db->insert('users', $data);      

    }

    function reset_password($user) {

        $data = array(            
                'password'  => password_hash('Bianos', PASSWORD_DEFAULT)  //Default Password
             );
            $this->db->where('username', $user);            
            
            return $this->db->update('users', $data);   
    }

    /**
     * Updates a user record
     * @param  int      $id    the DECODED id of the item. 
     * @return void            returns TRUE if success
     */
    function update_user($user) { 

            $filename = $this->userdetails($user)['img']; //gets the old data 

            //Process Image Upload
              if($_FILES['img']['name'] != NULL)  { 


                //Deletes the old photo
                if(!filexist($filename)) {
                  unlink('./uploads/'.$filename); 
                }

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['encrypt_name'] = TRUE;                        

                $this->load->library('upload', $config);
                $this->upload->initialize($config);         
                
                $field_name = "img";
                $this->upload->do_upload($field_name);
                $data2 = array('upload_data' => $this->upload->data());
                foreach ($data2 as $key => $value) {     
                  $filename = $value['file_name'];
                }
                
            }
      
            $data = array(           
                'name'      => $this->input->post('name'),  
                'email'     => $this->input->post('email'),  
                'contact'   => $this->input->post('contact'),  
                'usertype'  => $this->input->post('usertype'),                                 
                'img'       => $filename   
             );
            
            $this->db->where('username', $user);
            return $this->db->update('users', $data);          
        
    }


        /**
     * Deletes a user record
     * @param  int    $id    the DECODED id of the item.   
     * @return boolean    returns TRUE if success
     */
    function delete_user($user) {

 
           $data = array(           
                'is_deleted'      => 1
             );
            
            $this->db->where('username', $user);
            return $this->db->update('users', $data);          

    }


    /**
     * Returns the paginated array of rows 
     * @param  int      $limit      The limit of the results; defined at the controller
     * @param  int      $id         the Page ID of the request. 
     * @return Array        The array of returned rows 
     */
    function fetch_users($limit, $id, $search) {

            if($search) {
                $this->db->like('name', $search);
                $this->db->or_like('username', $search);
            }

            $this->db->where('is_deleted', 0);            
            $this->db->limit($limit, (($id-1)*$limit));

            $query = $this->db->get("users");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }

    /**
     * Returns the total number of rows of users
     * @return int       the total rows
     */
    function count_users($search) {
        if($search) {
            $this->db->like('name', $search);
            $this->db->or_like('username', $search);
        }
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results("users");
    }

    ////////////////////////////////
    /// HELPER                    //
    ////////////////////////////////
   

    function usertypes() {

            $this->db->select('*');
            $query = $this->db->get('usertypes');

            return $query->result_array();

    }


    function update_profile($user) { 

            $filename = $this->userdetails($user)['img']; //gets the old data 

            //Process Image Upload
              if($_FILES['img']['name'] != NULL)  { 


                //Deletes the old photo
                if(!filexist($filename)) {
                  unlink('./uploads/'.$filename); 
                }

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png'; 
                $config['encrypt_name'] = TRUE;                        

                $this->load->library('upload', $config);
                $this->upload->initialize($config);         
                
                $field_name = "img";
                $this->upload->do_upload($field_name);
                $data2 = array('upload_data' => $this->upload->data());
                foreach ($data2 as $key => $value) {     
                  $filename = $value['file_name'];
                }
                
            }
      
            $data = array(           
                'name'      => $this->input->post('name'),    
                'email'     => $this->input->post('email'),  
                'contact'   => $this->input->post('contact'),              
                'img'       => $filename  
             );
            
            $this->db->where('username', $user);
            return $this->db->update('users', $data);          
        
    }

    function update_profile_pass($user) { 

           
      
            $data = array(           
                'password'  => password_hash($this->input->post('newpass'), PASSWORD_DEFAULT)          
             );
            
            $this->db->where('username', $user);
            return $this->db->update('users', $data);          
        
    }



}