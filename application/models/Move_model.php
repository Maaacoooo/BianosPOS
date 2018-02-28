<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

Class Move_Model extends CI_Model {


    function create($user, $location_from, $location_to, $loc_id) {

        $data = array(                            
                'remarks'       => $this->input->post('remarks'),                
                'location_from' => $location_from,                
                'location_to'   => $location_to,                
                'user'          => $user   
             );
       
           $this->db->insert('move', $data);    

           $move_id = $this->db->insert_id();

           $items = $this->fetch_move_items($loc_id, $user, 0);

           if($items) {

            //Update current export items
              $data = array(              
                'move_id'    => $move_id                    
             );            
              $this->db->where('user', $user);
              $this->db->where('move_id', 0);
              $this->db->update('move_items', $data); 

           } else {
              return false;
           }


           return $move_id;
    }


    function view($id) {
            $this->db->join('users', 'users.username = move.user', 'left');
            $this->db->select('
                move.id,
                move.location_to,
                move.location_from,
                move.remarks,
                move.created_at,
                move.updated_at,
                users.name as user,
                users.username
                
            ');
            $this->db->where('move.id', $id);
            $query = $this->db->get('move');

            return $query->row_array();
    }



    function fetch_move($limit, $id, $search) {

            if($search) {
              $this->db->group_start();
              $this->db->like('move.id', $search);
              $this->db->or_like('move.location_to', $search);
              $this->db->or_like('move.location_from', $search);
              $this->db->group_end();
            }


            $this->db->join('users', 'users.username = move.user', 'left');
            $this->db->select('
                move.id,
                move.location_to,
                move.location_from,
                move.created_at,
                move.updated_at,
                users.name as user                
            ');
            
            $this->db->order_by('move.created_at', 'DESC');
            $this->db->limit($limit, (($id-1)*$limit));

            $query = $this->db->get("move");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }

    /**
     * Returns the total number of rows of users
     * @return int       the total rows
     */
    function count_move($search) {
        if($search) {
          $this->db->group_start();
          $this->db->like('move.id', $search);
          $this->db->or_like('move.location_to', $search);
          $this->db->or_like('move.location_from', $search);
          $this->db->group_end();
        }

        return $this->db->count_all_results("move");
    }

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




    // EXPORT ITEMS ////////////////////////////////////////////////////////////////////////////


    /**
     * Adds an item to an export grp / cart
     * @param [type] $item      [description]
     * @param [type] $qty       [description]
     * @param [type] $export_id [description]
     * @param [type] $user      [description]
     */
    function add_item($item, $qty, $loc_id, $user, $dp, $srp) {

            $data = array(              
                'batch_id'    => $item,  
                'loc_id'      => $loc_id,  
                'qty'         => $qty,  
                'dp'          => $dp,  
                'srp'         => $srp,  
                'user'        => $user               
             );
       
            return $this->db->insert('move_items', $data);    

    }

    function update_item_qty($item, $qty, $loc_id, $move_id, $user) {

            //if $qty > 0 - update row 
            if($qty) {
              
              $data = array(              
                'qty'    => $qty                    
             );
            
              $this->db->where('batch_id', $item);
              $this->db->where('user', $user);
              $this->db->where('move_id', $move_id);
              $this->db->where('loc_id', $loc_id);
              return $this->db->update('move_items', $data); 

            } else {
            
              $this->db->where('batch_id', $item);
              $this->db->where('user', $user);
              $this->db->where('move_id', $move_id);
              $this->db->where('loc_id', $loc_id);
              return $this->db->delete('move_items'); 

            }     

    }

     function view_item($item, $loc_id, $user) {

            $this->db->select('*');        
            $this->db->where('batch_id', $item);
            $this->db->where('user', $user);
            $this->db->where('loc_id', $loc_id);        
            $this->db->limit(1);

            $query = $this->db->get('move_items');

            return $query->row_array();
    }


    /**
     * Items in the Move Cart
     * @param  [type] $location_id [description]
     * @param  [type] $user        [description]
     * @param  [type] $move_id     [description]
     * @return [type]              [description]
     */
    function fetch_move_items($location_id, $user, $move_id) {

            $this->db->join('item_inventory', 'item_inventory.batch_id = move_items.batch_id', 'left');
            $this->db->join('items', 'items.id = item_inventory.item_id', 'left');
            $this->db->select('
            items.id as item_id,
            move_items.batch_id,
            move_items.id,
            move_items.qty,
            move_items.dp,
            move_items.srp,
            items.name,
            items.category,
            items.serial,
            items.unit,
            items.critical_level
            ');          
           
            $this->db->where('move_items.move_id', $move_id);

            if(!is_null($location_id)) {
              $this->db->where('move_items.loc_id', $location_id);     
            }

            if(!is_null($user)) {
              $this->db->where('move_items.user', $user);     
            }

            $query = $this->db->get("move_items");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }



  

}