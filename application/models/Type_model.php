<?php
class Type_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('type_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("type_master.TypeId, type_master.TypeName");

        $this->db->from('type_master');

        //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("type_master.TypeId,type_master.TypeName");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('TypeId',$id);
  $query = $this->db->get('type_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('TypeId',$model['TypeId'])->update('type_master',$model); 
   } 


      
  }
?>

