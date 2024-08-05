<?php
  class Report_model extends CI_Model {
    
    public function __construct()
      {
          $this->load->database();
      }


      public function memberfetch()
          {      

              $this->db->select('patientmodal_master.*'); 
              $this->db->from('patientmodal_master');
                $query = $this->db->get();
                return $query->result();
              
          }


      public function Reportdetails($FkPatientId,$startDate,$endDate,$Status)
      {

       $this->db->select('casepaper.*,patientmodal_master.PatientId,patientmodal_master.PatientNm,(casepaper.PaidAmount + casepaper.SecondAmt + casepaper.ThirdAmt + casepaper.FourthAmt) as PaidAmount'); 

       $this->db->join('patientmodal_master','casepaper.FkPatientId = patientmodal_master.PatientId','left'); 

    //    $this->db->where('casepaper.is_active','1');
       $this->db->from('casepaper');

       if($FkPatientId>0){
         $this->db->where('casepaper.FkPatientId',$FkPatientId);

        }

        if($Status==1){
            $this->db->where('casepaper.RemainAmount',0);
   
           }

           else if($Status==2){
            $this->db->where('casepaper.RemainAmount>',0);
           }



          $this->db->where('casepaper.Date >=', $startDate);
          $this->db->where('casepaper.Date <=', $endDate);


        $query = $this->db->get();
        return $query->result();

     }

    }