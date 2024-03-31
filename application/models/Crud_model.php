<?php

class Crud_model extends CI_Model{


    public function send_data($data){

        $result=$this->db->insert("du_category",$data);
        return $result;

    }
    public function fetch_update_data($id){
        $this->db->where("id", $id);
        $query=$this->db->get("du_category"); // assuming `$newData` is an array of fields to update
    
       
        
        if ($query->num_rows() > 0) {
        
         return $query->result();
        } else {
            return false;
        }
     


    }
    public function send_data_update($id,$data){
        $this->db->where("id", $id);
        $result = $this->db->update("du_category", $data);
    
       
        if ($result) {
            return true; // Updated successfully
        } else {
            return false; // Failed to update
        }


    }
    public function view($id){
       
     $this->db->where("id",$id);
     $output=$this->db->get("du_category");
     if($output){
        return $output->result();
     }
     else{
        return false;
     }

    }










}