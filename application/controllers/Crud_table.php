<?php
class Crud_table extends CI_Controller{


    public function send_data(){
        $data = array(
            "title" => $this->input->post("title"),
             "image"=>$this->input->post("image"),
             "language"=>$this->input->post("languages"),
             "status"=>$this->input->post("status"),

        );
     $this->load->model("Crud_model");
     $result=$this->Crud_model->send_data($data);
   


    


    }
    public function update_fetch_data(){
        $id=$this->input->post("id");
       
        $this->load->model("Crud_model");
        $result=$this->Crud_model->fetch_update_data($id);
        if($result){
            echo json_encode($result);
        }
        else{
            echo json_encode("Please enter the valid details");

        }



    }
    public function update_send(){
        $id=$this->input->post("id");
        $data=array(
            "title"=>$this->input->post("titleupdate"),
            "image"=>$this->input->post("imageupdate"),
            "language"=>$this->input->post("languagesupdate"),
            "status"=>$this->input->post("statusupdate")
            




        );
       $this->load->model("Crud_model");
       $output=$this->Crud_model->send_data_update($id,$data);
       if($output){
        echo json_encode($output);
       }
       else{
        echo json_encode("enter the valid detial");
       }




    }
    public function view(){
       $id=$this->input->post("id");
       $this->load->model("Crud_model");
       $result=$this->Crud_model->view($id);
       if($result){
        echo json_encode($result);
 
       }
       else{
        echo json_encode("please enter valid detail");


       }
       
       



    }





}