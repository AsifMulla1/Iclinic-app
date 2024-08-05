<?php
class Patient_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('patientmodal_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("patientmodal_master.PatientId,patientmodal_master.PatientNm,patientmodal_master.Address,patientmodal_master.MobileNo,patientmodal_master.Date,patientmodal_master.Gender");

        $this->db->from('patientmodal_master');

          $this->db->order_by('patientmodal_master.PatientId','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('PatientId', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("patientmodal_master.PatientId,patientmodal_master.PatientNm,patientmodal_master.Address,patientmodal_master.MobileNo,patientmodal_master.Date,patientmodal_master.Gender");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('PatientId',$id);
  $query = $this->db->get('patientmodal_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('PatientId',$model['PatientId'])->update('patientmodal_master',$model); 
   } 


      
  }
?>

