<?php
class Useoptical_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('use_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("use_master.UseId, use_master.UseName");

        $this->db->from('use_master');

        //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("use_master.UseId,use_master.UseName");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('UseId',$id);
  $query = $this->db->get('use_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('UseId',$model['UseId'])->update('use_master',$model); 
   } 


      
  }
?>

