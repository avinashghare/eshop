<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Company_model extends CI_Model
{
	//topic
	public function create($name,$shops,$user)
	{
		$data  = array(
			'name' => $name,
			'user' => $user
		);
		$query=$this->db->insert( 'company', $data );
		$companyid=$this->db->insert_id();
        foreach($shops AS $key=>$value)
        {
            $this->company_model->createshopbycompany($value,$companyid);
        }
		return  1;
	}
     public function createshopbycompany($value,$id)
	{
		$data  = array(
			'shop' =>$value,
			'company' => $id
		);
       // print_r($data);
		$query=$this->db->insert( 'companyshop', $data );
		return  1;
	}
    
	function viewcompany()
	{
		$query=$this->db->query("SELECT `company`.`id`, `company`.`name`, `company`.`user`,`user`.`firstname`AS `firstname`,`user`.`lastname`AS `lastname` 
FROM `company` 
LEFT OUTER JOIN `user` ON `user`.`id` = `company`.`user` ")->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'company' )->row();
		return $query;
	}
	
    public function getshopsbycompany($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`shop`,`company` FROM `companyshop`  WHERE `company`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->shop;
            }
        }
         return $return;
         
		
	}
	public function edit($id,$name,$shops,$user)
	{
		$data = array(
			'name' => $name,
			'user' => $user
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'company', $data );
        $querydeleteshops=$this->db->query("DELETE FROM `companyshop` WHERE `company`='$id'");
        foreach($shops AS $key=>$value)
        {
            $this->company_model->createshopbycompany($value,$id);
        }
		
		return 1;
	}
	function deletecompany($id)
	{
		$query=$this->db->query("DELETE FROM `company` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `companyshop` WHERE `company`='$id'");
		
	}
    
     public function getcompanydropdown()
	{
		$query=$this->db->query("SELECT * FROM `company`  ORDER BY `id` ASC")->result();
		$return=array();
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
     public function gettagsdropdown()
	{
		$query=$this->db->query("SELECT * FROM `tags`  ORDER BY `id` ASC")->result();
		$return=array();
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    
     public function getfiltergroupbycompany($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`company`,`filtergroup` FROM `filtergroup_company`  WHERE `filtergroup`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->company;
            }
        }
         return $return;
         
		
	}
	public function getofferdropdown()
	{
		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->header;
		}
		
		return $return;
	}
	public function getoffer()
	{
		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `header` ASC")->result();
		
		
		return $query;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
    public function getcompanybyproduct($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`company`,`product` FROM `product_company`  WHERE `product`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->company;
            }
        }
         return $return;
         
		
	}
    public function gettagsbyproduct($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`tag`,`product` FROM `product_tag`  WHERE `product`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->tag;
            }
        }
         return $return;
         
		
	}
}
?>