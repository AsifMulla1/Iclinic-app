<?php
class Unit_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('unit_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("unit_master.UnitId, unit_master.UnitName");

        $this->db->from('unit_master');

        //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("unit_master.UnitId,unit_master.UnitName");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('UnitId',$id);
  $query = $this->db->get('unit_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('UnitId',$model['UnitId'])->update('unit_master',$model); 
   } 


      
  }
?>

