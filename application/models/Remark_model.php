<?php
class Remark_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('remarks_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("remarks_master.RemarkId, remarks_master.RemarkName");

        $this->db->from('remarks_master');

        //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("remarks_master.RemarkId,remarks_master.RemarkName");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('RemarkId',$id);
  $query = $this->db->get('remarks_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('RemarkId',$model['RemarkId'])->update('remarks_master',$model); 
   } 


      
  }
?>

