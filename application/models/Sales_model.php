<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

Class Sales_Model extends CI_Model {


    function create($user) {

          $senior = 0;
          $discount = 0;

          //Appy Senior Citizen Discount
          if ($this->input->post('senior')) {
            $senior = $this->getSeniorDiscount(0)['srp'] * 0.2; //standard percentage (20%)
          }
          //Apply Discounts
          if ($this->input->post('discount')) {
            foreach($this->fetch_sale_items(0) as $item) {
              $disc[] = $item['srp'] * $item['qty'];
            }
            $discount =  array_sum($disc) * 0.1; //standard percentage (10%)
          }

            $data = array(              
                'customer'        => $this->input->post('customer'),              
                'remarks'         => $this->input->post('remarks'),                
                'amount_tendered' => $this->input->post('amt_tendered'),                
                'status'          => 0,             
                'senior'          => $senior,             
                'discount'        => $discount,             
                'user'            => $user             
             );
       
           $this->db->insert('sales', $data);    

           $sale_id = $this->db->insert_id();
           //Update Sales ID
           $this->db->where('sale_id', 0);
           $this->db->update('sale_items', array('sale_id' => $sale_id)); 

           return $sale_id;
    }



    function update($id, $user) {
      
          $senior = 0;
          $discount = 0;

        //Appy Senior Citizen Discount
          if ($this->input->post('senior')) {
            $senior = $this->getSeniorDiscount($id)['srp'] * 0.2; //standard percentage (20%)
          }
          //Apply Discounts
          if ($this->input->post('discount')) {
            foreach($this->fetch_sale_items($id) as $item) {
              $disc[] = $item['srp'] * $item['qty'];
            }
            $discount =  array_sum($disc) * 0.1; //standard percentage (10%)
          }

            $data = array(              
                'customer'        => $this->input->post('customer'),                              
                'remarks'         => $this->input->post('remarks'),                
                'amount_tendered' => $this->input->post('amt_tendered'),    
                'senior'          => $senior,             
                'discount'        => $discount,               
                'user'            => $user  
             );

           $this->db->where('id', $id);
           return $this->db->update('sales', $data);    
    }


    function change_status($id, $status) {

            $data = array(              
                'status' => $status               
       
             );

           $this->db->where('id', $id);
           return $this->db->update('sales', $data);    
    }


    function cancel_sale() {

           $id = $this->encryption->decrypt($this->input->post('id'));

           $this->db->delete('sale_items', array('sale_id'=>$id));   
           return $this->db->delete('sales', array('id'=>$id));    

    }





    function view($id) {
            $this->db->join('users', 'users.username = sales.user', 'left');      
            $this->db->join('sale_items', 'sale_items.sale_id = sales.id', 'left');  
            $this->db->select('
                sales.id,
                sales.discount,
                sales.senior,
                sales.customer,
                sales.remarks,
                sales.status,
                sales.created_at,
                sales.updated_at,
                sales.amount_tendered,
                users.name as user,
                SUM(sale_items.qty * sale_items.srp) as total
            ');
            $this->db->where('sales.id', $id);
            $query = $this->db->get('sales');

            return $query->row_array();
    }


    //function fetch_sales($limit, $id, $search, $date, $status) {
    function fetch_sales($limit, $id, $search, $date, $status = 1) {

            if($search) {
              $this->db->like('sales.customer', $search);
            }

            $this->db->join('users', 'users.username = sales.user', 'left');      
            $this->db->join('sale_items', 'sale_items.sale_id = sales.id', 'left');  
            $this->db->select('
                sales.id,
                sales.discount,
                sales.senior,
                sales.customer,
                sales.remarks,
                sales.status,
                sales.created_at,
                sales.updated_at,
                sales.amount_tendered,
                users.name as user,
                SUM(sale_items.qty * sale_items.srp) as total,
                (SUM(sale_items.qty * sale_items.srp) - sales.senior - sales.discount) as totalAmt,
            ');


            $this->db->where('sales.status', $status);
            

            if(($date)) {
               $arr_date = (explode("-",$date));
               $str_from = str_replace(" ", "", ($arr_date[0]));
               $str_to = str_replace(" ", "", ($arr_date[1]));

               $arr_from = explode('/', $str_from);
               $from = $arr_from[2].'-'.$arr_from[0].'-'.$arr_from[1];

               $arr_to = explode('/', $str_to);
               $to = $arr_to[2].'-'.$arr_to[0].'-'.$arr_to[1] . ' 23:59:59';
               $this->db->where('sales.created_at BETWEEN "'.$from.'" AND "'.$to.'"');

            }
            
            $this->db->order_by('sales.created_at', 'DESC');
            $this->db->group_by('sales.id', 'DESC');
            $this->db->limit($limit, (($id-1)*$limit));

            $query = $this->db->get("sales");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

    }

    /**
     * Returns the total number of rows of users
     * @return int       the total rows
     */
    //function count_sales($search, $date, $status) {
    function count_sales($search, $date, $status = 1) {

        if($search) {
              $this->db->like('sales.customer', $search);
        }

       /* if(!is_null($status)) {
              $this->db->where('sales.status', $status);
          }*/

         if(($date)) {
               $arr_date = (explode("-",$date));
               $str_from = str_replace(" ", "", ($arr_date[0]));
               $str_to = str_replace(" ", "", ($arr_date[1]));

               $arr_from = explode('/', $str_from);
               $from = $arr_from[2].'-'.$arr_from[0].'-'.$arr_from[1];

               $arr_to = explode('/', $str_to);
               $to = $arr_to[2].'-'.$arr_to[0].'-'.$arr_to[1] . ' 23:59:59';
               $this->db->where('sales.created_at BETWEEN "'.$from.'" AND "'.$to.'"');

            }
        return $this->db->count_all_results("sales");
    }






    // SALE ITEMS ////////////////////////////////////////////////////////////////////////////


    /**
     * Adds an item to an import grp / cart
     * @param [type] $item      [description]
     * @param [type] $qty       [description]
     * @param [type] $export_id [description]
     */
    function add_item($batch, $item, $qty, $srp, $sale_id) {

            $data = array(              
                'batch_id'    => $batch,  
                'item_id'     => $item,  
                'sale_id'     => $sale_id,  
                'qty'         => $qty,      
                'srp'         => $srp      
             );
       
            return $this->db->insert('sale_items', $data);    

    }

    function update_item_qty($id, $qty, $sale_id) {

            //if $qty > 0 - update row 
            if($qty) {
              
              $data = array(              
                'qty'         => $qty              
             );
              $this->db->where('id', $id);

              return $this->db->update('sale_items', $data); 

            } else {
            
              $this->db->where('id', $id);

              return $this->db->delete('sale_items'); 

            }     

    }



     function view_item($row, $sale_id) {

            $this->db->select('*');        
            $this->db->where('id', $row);
            $this->db->where('sale_id', $sale_id);        
            $this->db->limit(1);

            $query = $this->db->get('sale_items');

            return $query->row_array();
    }

    /**
     * Checks if an item exist in the actual sale queue
     * @param  String  $item    Item ID / Batch ID
     * @param  int     $sale_id [description]
     * @return [type]           [description]
     */
    function check_sales_item_queue($item, $sale_id) {
          $this->db->where('sale_id', $sale_id);
          $this->db->group_start();
            $this->db->where('batch_id', $item);
            $this->db->or_where('item_id', $item);
          $this->db->group_end();
          $query = $this->db->get('sale_items');

          return $query->row_array();
    }


    /**
     * Checks sale item is available in the inventory / item list
     * @param  [type] $item [description]
     * @return [type]       [description]
     */
    function check_sale_item($item) {

        $this->db->where('batch_id', $item);
        $this->db->where('qty >', 0);
        $query = $this->db->get('item_inventory');

        if ($query->num_rows() > 0) {
          return $query->row_array();
        }

        ///// Check Item 
        $this->db->where('id', $item);
        $this->db->where('critical_level', 0);
        $query = $this->db->get('items');

        if ($query->num_rows() > 0) {
          $data = $query->row_array();
          $data['item_id'] = $data['id'];
          $data['batch_id'] = NULL;

          return $data;
        }

        return FALSE;

    }


    function fetch_sale_items($sale_id) {

            $this->db->join('items', 'items.id = sale_items.item_id', 'left');
            $this->db->select('
            sale_items.id,            
            sale_items.qty,
            sale_items.batch_id,
            sale_items.srp,
            items.id as item_id,
            items.name,
            items.category,
            items.serial,
            items.unit,
            ');          
            
            $this->db->where('sale_items.sale_id', $sale_id); 

            $query = $this->db->get("sale_items");

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;

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

            $this->db->join('item_inventory', 'item_inventory.item_id = items.id', 'left');
            $this->db->where('item_inventory.qty >', 0);           
            $this->db->or_where('itemS.critical_level', 0);           
            $this->db->limit(15);
            $query = $this->db->get('items');
            
            return $query->result_array();
    }


    /**
     * Returns the item with the largest SRP
     * @param  [type] $sales_id [description]
     * @return [type]           [description]
     */
    function getSeniorDiscount($sale_id) {

          $this->db->where('sale_id', $sale_id);
          $this->db->order_by('srp', 'DESC');
          $query = $this->db->get('sale_items');

          return $query->row_array();

    }


  

}