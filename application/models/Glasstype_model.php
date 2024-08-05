<?php
class Glasstype_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('glasstype_master',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("glasstype_master.GlassTypeId,glasstype_master.GlassTypeNm");

        $this->db->from('glasstype_master');

        //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		//   $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 

     
      // -----for update---
            
    public function getbyid($id)
    {
      $this->db->select("glasstype_master.GlassTypeId,glasstype_master.GlassTypeNm");

  // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
  
  $this->db->where('GlassTypeId',$id);
  $query = $this->db->get('glasstype_master');
        return $query->result();
    }


    
   public function update($model)
   {
      return $sql = $this->db->where('GlassTypeId',$model['GlassTypeId'])->update('glasstype_master',$model); 
   } 


      
  }
?>

