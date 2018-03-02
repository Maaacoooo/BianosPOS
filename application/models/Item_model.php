<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

Class Item_Model extends CI_Model {

// CREATE DATA ////////////////////////////////////////////////////////////////////

   /**
     * Generates ItemID
     * @return String the Distinct Item ID
     */
    function generate_ItemID() {
        $total_rows = $this->db->count_all('items');
        return 'ITEM'.prettyID(($total_rows + 1));  
    }

    function create() {

            $filename = $this->input->post('img'); //img filename empty if not present

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
        
            $item_id = $this->generate_ItemID();

            $data = array(              
                'id'             => $item_id,  
                'name'           => $this->input->post('name'),  
                'category'       => $this->input->post('category'),   
                'unit'           => $this->input->post('unit'),  
                'description'    => $this->input->post('desc'),  
                'serial'         => $this->input->post('serial'),
                'srp'            => $this->input->post('srp'),
                'dp'             => $this->input->post('dp'),
                'critical_level' => $this->input->post('critical_level'),
                'img'            => $filename
             );
       
            $this->db->insert('items', $data);    
            return $item_id;

    }


    function update($id, $img) { 

            $filename = $img; //gets the old data 

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
                'name'           => $this->input->post('name'),  
                'category'       => $this->input->post('category'), 
                'unit'           => $this->input->post('unit'),  
                'description'    => $this->input->post('desc'),  
                'serial'         => $this->input->post('serial'),
                'srp'            => $this->input->post('srp'),
                'dp'             => $this->input->post('dp'),
                'critical_level' => $this->input->post('critical_level'),
                'img'            => $filename
             );
       
            
            $this->db->where('id', $id);
            return $this->db->update('items', $data);          
        
    }


    /**
     * Updates the Prices upon import
     * @param  [type] $id  [description]
     * @param  [type] $srp [description]
     * @param  [type] $dp  [description]
     * @return [type]      [description]
     */
    function update_prices($id, $srp, $dp) { 

            $data = array(                
                'srp'            => $srp,
                'dp'             => $dp
             );       
            
            $this->db->where('id', $id);
            return $this->db->update('items', $data);          
    }





        /**
     * Deletes a user record
     * @param  int    $id    the DECODED id of the item.   
     * @return boolean    returns TRUE if success
     */
    function delete($id) {

 
           $data = array(           
                'is_deleted'      => 1
             );
            
            $this->db->where('id', $id);
            return $this->db->update('items', $data);          

    }


    /**
     * Returns the paginated array of rows 
     * @param  int      $limit      The limit of the results; defined at the controller
     * @param  int      $id         the Page ID of the request. 
     * @return Array        The array of returned rows 
     */
    function fetch_items($limit, $id, $search, $is_deleted = 0, $is_merchandise = FALSE) {
          
          if($search) {
            $this->db->group_start();
            $this->db->like('items.name', $search);
            $this->db->or_like('items.category', $search);
            $this->db->or_like('items.description', $search);
            $this->db->or_like('items.serial', $search);
            $this->db->or_like('items.id', $search);
            $this->db->group_end();   
          }

            $this->db->join('item_inventory', 'item_inventory.item_id = items.id', 'left');
            $this->db->group_by('items.id');
            $this->db->select('
            items.id,
            items.name,
            items.serial,
            items.category,
            items.description,
            items.unit,
            items.dp,
            items.srp,
            items.critical_level,
            items.img,
            items.is_deleted,
            SUM(item_inventory.qty) as qty
            ');
            
            //$this->db->where('items.is_deleted', $is_deleted);
            
            if (!is_null($limit)) {
              if (!is_null($id)) {
                $this->db->limit($limit, (($id-1)*$limit));
              } else {
                $this->db->limit($limit);
              }
            }



            if ($is_merchandise) {              
              $this->db->where('items.critical_level !=', 0);  
                  
            }

            $query = $this->db->get("items");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }

    /**
     * Returns the total number of rows of users
     * @return int       the total rows
     */
    function count_items($search) {
        if($search) {
          $this->db->group_start();
          $this->db->like('name', $search);
          $this->db->or_like('category', $search);
          $this->db->or_like('description', $search);
          $this->db->or_like('serial', $search);
          $this->db->or_like('id', $search);
          $this->db->group_end();
        }
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results("items");
    }


    function view($id) {

             $this->db->select('*');     
             $this->db->group_start();
             $this->db->where('id', $id);          
             $this->db->or_where('serial', $id);          
             $this->db->group_end();
             $this->db->where('is_deleted', 0);          

             $query = $this->db->get('items');

             return $query->row_array();
    }

    function check_serial($id, $serial) {

             $this->db->select('*');        
             $this->db->where('id !=', $id);          
             $this->db->where('serial', $serial);          
             $this->db->limit(1);

             $query = $this->db->get('items');

             return $query->row_array();
    }


    /**
     * Fetches the quantity of the item in each location
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    function fetch_item_inventory($id) {

            $this->db->select('
                item_inventory.batch_id,
                item_inventory.srp,
                item_inventory.dp,
                item_inventory.qty,
                item_inventory.item_id
            ');            

            $this->db->where('item_id', $id);

            $query = $this->db->get("item_inventory");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }


    function total_inventory() {

            $this->db->join('item_inventory', 'item_inventory.item_id = items.id', 'left');
            $this->db->group_by('items.id');
            $this->db->select('
            items.id,
            items.name,
            items.brand,
            items.category,
            items.SRP,
            items.DP,
            items.serial,
            items.unit,
            SUM(item_inventory.qty) as qty
            ');
            

            $this->db->where('items.is_deleted', 0);
            $query = $this->db->get("items");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }


    //////////////
    // HELPERS

    function fetch_category() {

            $this->db->select('*');
            $this->db->where('is_deleted', 0);
            $query = $this->db->get('item_category');

            return $query->result_array();

    }


    function fetch_unit() {

            $this->db->select('*');
            $this->db->where('is_deleted', 0);
            $query = $this->db->get('item_unit');

            return $query->result_array();

    }


    function search($q){
            
            $this->db->like('name', $q);
            $this->db->or_like('description', $q);
            $this->db->or_like('serial', $q);
            $this->db->or_like('id', $q);

            $this->db->limit(15);
            $query = $this->db->get('items');
            
            return $query->result_array();
  }


    /**
     * Returns the Quantity of a distinct Item in a distinct location
     * @param  [type] $id       [description]
     * @param  [type] $location [description]
     * @return [type]           [description]
     */
    function check_item_inventory($id, $location) {

            $this->db->select('
              item_id,
              SUM(item_inventory.qty) as qty
            ');            

            $this->db->where('item_id', $id);
            $this->db->where('location', $location);

            $query = $this->db->get("item_inventory");
     
            return $query->row_array();
          
            

    }

    /**
     * Fetches Export Data 
     * @param  [type] $item_id [description]
     * @return [type]          [description]
     */
    function fetch_exports($item_id) {
        $this->db->join('exports', 'exports.id = export_items.export_id', 'LEFT');
        $this->db->select('
        exports.id as export_id,
        exports.updated_at,
        export_items.qty,
        export_items.dp,
        export_items.id
        ');
        $this->db->where('exports.status', 4);
        $this->db->where('item_id', $item_id);
        $query= $this->db->get('export_items');

        return $query->result_array();
    }



    /* ADD RESTOCK *******************************************************************************************/

    function fetch_import_items($id) {

        $this->db->join('items', 'items.id = import_items.item_id', 'left');
        $this->db->select('
            import_items.id,
            import_items.item_id,
            import_items.qty,
            import_items.srp,
            import_items.dp,
            items.name
            ');
        $this->db->where('import_items.import_id', $id);
        $query = $this->db->get('import_items');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }


    function update_items($item_id, $qty, $dp, $srp) {

      $old_qty = $this->view_items($item_id)['qty'];

            $data = array(              
                'qty' => ($old_qty + $qty),
                'dp'  => $dp,
                'srp' => $srp        
             );
        $this->db->where('item_id', $item_id);
        return $this->db->update('item_inventory', $data);      

    }

    function view_items($item_id) {
        $this->db->where('item_id', $item_id);
        return $this->db->get('item_inventory')->row_array();
    }

    function submit_cart($user) {

            $data = array(
              'remarks'  => $this->input->post('description'),
              'user'         => $user
            );
            
            $this->db->insert('imports', $data);
            $id = $this->db->insert_id();

            $this->db->update('import_items', array('import_id' => $id), array('import_id' => 0));

            return $id;

    }


    function add_cart_item($item_id, $qty, $dp, $srp) {
      $data = array(
        'item_id' => $item_id,
        'qty' => $qty,
        'dp'  => $dp,
        'srp' => $srp,
        'import_id' => 0
      );
      return $this->db->insert('import_items', $data);
    }

    function view_cart_item($item_id, $import_id) {
      $this->db->where('item_id', $item_id);
      $this->db->where('import_id', $import_id);
      return $this->db->get('import_items')->row_array();
    }

    function update_cart_qty($id, $qty) {
      //delete if qty <= 0
      if ($qty > 0) {
        return $this->db->update('import_items', array('qty' => $qty), array('id' => $id));        
      } else {
        return $this->db->delete('import_items', array('id' => $id));        
      }
    }


    /**
    * --------------------------------------------------------------------
    * Autocomplete
    * --------------------------------------------------------------------
    */
    function autocomplete_items($q) {

            $this->db->group_start();
            $this->db->like('items.name', $q);
            $this->db->or_like('items.description', $q);
            $this->db->or_like('items.serial', $q);
            $this->db->or_like('items.id', $q);
            $this->db->or_like('item_inventory.batch_id', $q);
            $this->db->group_end();

            $this->db->select('
            items.id,
            items.name,
            items.unit,
            item_inventory.batch_id,
            item_inventory.qty,
            item_inventory.dp,
            item_inventory.srp
            ');

            $this->db->join('items', 'items.id = item_inventory.item_id', 'left');
            $this->db->where('item_inventory.qty >', 0);           
            $this->db->limit(15);
            $query = $this->db->get('item_inventory');
            
            return $query->result_array();
    }

}