<?php
class Shop_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();	
		} 

   public function insertdata($model)
	{
		return $this->db->insert('casepaper',$model);
			//return $sql->result();
	} 

    public function getalldetails()
      {     

        $this->db->select("casepaper.CasePaperID,casepaper.FkPatientId,casepaper.Date,casepaper.column1,casepaper.column2,casepaper.column3,casepaper.column4,casepaper.column5,casepaper.column6,casepaper.column7,casepaper.column8,casepaper.column9,casepaper.column10,casepaper.column11,casepaper.column12,casepaper.Remark,casepaper.Use,casepaper.Type,casepaper.Unit,casepaper.GlassType,casepaper.Note,casepaper.PayMode1,casepaper.BillAmount,(casepaper.PaidAmount + casepaper.SecondAmt + casepaper.ThirdAmt + casepaper.FourthAmt) as PaidAmount,casepaper.RemainAmount,casepaper.TotalAmount,casepaper.PayMode2,casepaper.SecondAmt,casepaper.PayMode3,casepaper.ThirdAmt,casepaper.PayMode4,casepaper.FourthAmt,patientmodal_master.PatientNm,use_master.UseName,type_master.TypeName,unit_master.UnitName,glasstype_master.GlassTypeNm,payment_master.PayNm,remarks_master.RemarkName,DATE_FORMAT(casepaper.Date,'%d-%m-%Y') as Date");

        $this->db->from('casepaper');

      /************** Joi Query for in dataile view show names*************/
        $this->db->join('patientmodal_master','casepaper.FkPatientId =patientmodal_master.PatientId','left');
        $this->db->join('remarks_master','casepaper.Remark =remarks_master.RemarkId','left');
        $this->db->join('use_master','casepaper.Use =use_master.UseId','left');
        $this->db->join('type_master','casepaper.Type =type_master.TypeId','left');
        $this->db->join('unit_master','casepaper.Unit =unit_master.UnitId','left');
        $this->db->join('glasstype_master','casepaper.GlassType =glasstype_master.GlassTypeId','left');
        $this->db->join('payment_master','casepaper.PayMode1 =payment_master.PayId','left');
        
        
      //   $this->db->order_by('casepaper.CasePaperID','DESC');
		//   $this->db->where('casepaper.is_active','1');  
		  $this->db->order_by('CasePaperID', 'DESC');        
           $query = $this->db->get();
           return $query->result();
     } 

     public function getPatientNm()
     {      
      
      $this->db->select('patientmodal_master.*');
      $this->db->from('patientmodal_master');
    //   $this->db->where('stock_master.is_active','1');
      $query = $this->db->get();
      return $query->result();
             
     }

	
	public function getRemarks()
    {      
       
       $this->db->select('remarks_master.*');
       $this->db->from('remarks_master');
       $query = $this->db->get();
       return $query->result();
              
    }

    public function getUse()
    {      
       
       $this->db->select('use_master.*');
       $this->db->from('use_master');
       $query = $this->db->get();
       return $query->result();
              
    }  

    public function getType()
    {      
       
       $this->db->select('type_master.*');
       $this->db->from('type_master');
       $query = $this->db->get();
       return $query->result();
              
    }  

    public function getUnit()
    {      
       
       $this->db->select('unit_master.*');
       $this->db->from('unit_master');
       $query = $this->db->get();
       return $query->result();
              
    }

    public function getGlassType()
    {      
       
       $this->db->select('glasstype_master.*');
       $this->db->from('glasstype_master');
       $query = $this->db->get();
       return $query->result();
              
    }

    public function getPaymentMode()
    {      
       
       $this->db->select('payment_master.*');
       $this->db->from('payment_master');
       $query = $this->db->get();
       return $query->result();
              
    }
   

    public function insertStockdata($model)
    {
       return $this->db->insert('patientmodal_master',$model);
    }

    public function dropdownpatient()
    {

      $this->db->select('patientmodal_master.PatientId,patientmodal_master.PatientNm,patientmodal_master.MobileNo');
      $this->db->from('patientmodal_master');
      $query=$this->db->get();
      return $query->result();
    }

    // -----for update---
            
    public function getbyid($id)
		{
		  $this->db->select("casepaper.CasePaperID,casepaper.FkPatientId,casepaper.Date,casepaper.column1,casepaper.column2,casepaper.column3,casepaper.column4,casepaper.column5,casepaper.column6,casepaper.column7,casepaper.column8,casepaper.column9,casepaper.column10,casepaper.column11,casepaper.column12,casepaper.Remark,casepaper.Use,casepaper.Type,casepaper.Unit,casepaper.GlassType,casepaper.Note,casepaper.PayMode1,casepaper.BillAmount,casepaper.PaidAmount,casepaper.RemainAmount,casepaper.TotalAmount,casepaper.PayMode2,casepaper.SecondAmt,casepaper.PayMode3,casepaper.ThirdAmt,casepaper.PayMode4,casepaper.FourthAmt");

      // $this->db->join('stock_master','share_master.FkStockId =stock_master.StockID','left');
      
      $this->db->where('CasePaperID',$id);
      $query = $this->db->get('casepaper');
			return $query->result();
		}

    
		
    public function update($model)
    {
       return $sql = $this->db->where('CasePaperID',$model['CasePaperID'])->update('casepaper',$model); 
    } 


    /***********   Dropdown Selection Data Load with Ajax and PHP For Table  ************/

  public function getOpticaldata($FkPatientId)
  {
    $this->db->select('casepaper.CasePaperID,casepaper.FkPatientId,casepaper.Date,casepaper.column1,casepaper.column2,casepaper.column3,casepaper.column4,casepaper.column5,casepaper.column6,casepaper.column7,casepaper.column8,casepaper.column9,casepaper.column10,casepaper.column11,casepaper.column12,casepaper.Remark,casepaper.Use,casepaper.Type,casepaper.Unit,casepaper.GlassType,casepaper.Note,casepaper.PayMode1,casepaper.BillAmount,(casepaper.PaidAmount + casepaper.SecondAmt + casepaper.ThirdAmt + casepaper.FourthAmt) as PaidAmount,casepaper.RemainAmount,casepaper.PayMode2,casepaper.SecondAmt,casepaper.PayMode3,casepaper.ThirdAmt,casepaper.PayMode4,casepaper.FourthAmt,patientmodal_master.PatientNm');
  
  $this->db->join('patientmodal_master','casepaper.FkPatientId = patientmodal_master.PatientId','left'); 

  $this->db->where('FkPatientId',$FkPatientId);
  $query = $this->db->get('casepaper');
     return $query->result();
  }



  public function dropdownUse()
    {

      $this->db->select('use_master.UseId,use_master.UseName');
      $this->db->from('use_master');
      $query=$this->db->get();
      return $query->result();
    }






    //   for dropdown fetch
    public function dropdownfetchRemark()
    {

       $this->db->select('remarks_master.RemarkId,remarks_master.RemarkName');
       $this->db->from('remarks_master');
       $query=$this->db->get();
       return $query->result();
    }

    public function dropdownfetchtype()
    {

       $this->db->select('type_master.TypeId,type_master.TypeName');
       $this->db->from('type_master');
       $query=$this->db->get();
       return $query->result();
    }

    public function dropdownfetchUnit()
    {

       $this->db->select('unit_master.UnitId,unit_master.UnitName');
       $this->db->from('unit_master');
       $query=$this->db->get();
       return $query->result();
    }


    public function dropdownfetchGlasstype()
    {

       $this->db->select('glasstype_master.GlassTypeId,glasstype_master.GlassTypeNm');
       $this->db->from('glasstype_master');
       $query=$this->db->get();
       return $query->result();
    }

    public function dropdownfetchUse()
    {

       $this->db->select('use_master.UseId,use_master.UseName');
       $this->db->from('use_master');
       $query=$this->db->get();
       return $query->result();
    }

    
  }



  
?>

