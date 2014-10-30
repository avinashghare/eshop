<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Product_model extends CI_Model
{
	
	public function create($name,$alias,$shop,$stock,$ean,$tax,$metatitle,$metadescription,$shopnavigation,$tags,$attribute,$isdefault)
	{
		$data  = array(
			'name' => $name,
			'alias' => $alias,
			'shop' => $shop,
			'stock' => $stock,
			'ean' => $ean,
			'tax' => $tax,
			'metatitle' => $metatitle,
			'isdefault' => $isdefault,
			'metadescription' => $metadescription
		);
		$query=$this->db->insert( 'product', $data );
		$id = $this->db->insert_id();
         $productid=$this->db->insert_id();
        foreach($shopnavigation AS $key=>$value)
            {
                $this->product_model->createshopnavigationbyproduct($value,$productid);
            }
        foreach($tags AS $key=>$value)
            {
                $this->product_model->createtagsbyproduct($value,$productid);
            }
        foreach($attribute AS $key=>$value)
            {
                $this->product_model->createattributebyproduct($value,$productid);
            }
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
		if(!$query)
			return  0;
		else
			return  $id;
	}
    public function createshopnavigationbyproduct($value,$productid)
	{
		$data  = array(
			'shopnav' =>$value,
			'product' => $productid
		);
		$query=$this->db->insert( 'shopnav_product', $data );
		return  1;
	}
    public function createattributebyproduct($value,$productid)
	{
		$data  = array(
			'attribute' =>$value,
			'product' => $productid
		);
		$query=$this->db->insert( 'product_attribute', $data );
		return  1;
	}
    public function createtagsbyproduct($value,$productid)
	{
		$data  = array(
			'tag' =>$value,
			'product' => $productid
		);
		$query=$this->db->insert( 'product_tag', $data );
		return  1;
	}
	function viewproduct()
	{
		$query="SELECT `product`.`id`,`product`.`name` AS `productname`, `product`.`alias`, `product`.`shop`, `product`.`metatitle`, `product`.`metadescription`, `product`.`stock`, `product`.`ean`, `product`.`tax`,`shop`.`name` AS `shopname` FROM `product` LEFT OUTER JOIN `shop` ON `shop`.`id`=`product`.`shop`";
		$query=$this->db->query($query)->result();
		return $query;
	}
    
    public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['product']=$this->db->get( 'product' )->row();
		return $query;
	}
    
    public function createproductimages($product,$order,$image)
	{
		$data  = array(
			'product' => $product,
			'image' => $image,
			'order' => $order
		);
		$query=$this->db->insert( 'productimages', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function beforeeditproductimages( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'productimages' )->row();
		return $query;
	}
    
	public function getproductimagesbyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `productimages` WHERE `id`='$id'")->row();
		return $query;
	}
    
	public function editproductimages($id,$order,$image,$product)
	{
		$data  = array(
			'product' => $product,
			'image' => $image,
			'order' => $order
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'productimages', $data );
        
		return 1;
	}
    
	function deleteproductimages($id)
	{
		$query=$this->db->query("DELETE FROM `productimages` WHERE `id`='$id'");
	}
	public function edit($id,$name,$alias,$shop,$stock,$ean,$tax,$metatitle,$metadescription,$shopnavigation,$tags,$attribute,$isdefault)
	{
		$data  = array(
			'name' => $name,
			'alias' => $alias,
			'shop' => $shop,
			'stock' => $stock,
			'ean' => $ean,
			'tax' => $tax,
			'metatitle' => $metatitle,
			'isdefault' => $isdefault,
			'metadescription' => $metadescription
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'product', $data );
        $querydelete=$this->db->query("DELETE FROM `shopnav_product` WHERE `product`='$id'");
        $querydelete=$this->db->query("DELETE FROM `product_attribute` WHERE `product`='$id'");
        $querydelete=$this->db->query("DELETE FROM `product_tag` WHERE `product`='$id'");
        foreach($shopnavigation AS $key=>$value)
            {
                $this->product_model->createshopnavigationbyproduct($value,$id);
            }
        foreach($tags AS $key=>$value)
            {
                $this->product_model->createtagsbyproduct($value,$id);
            }
        foreach($attribute AS $key=>$value)
            {
                $this->product_model->createattributebyproduct($value,$id);
            }
//		if($query)
//		{
//			$this->savelog($id,'Product Edited');
//		}
		return 1;
	}
    
    
	function deleteproduct($id)
	{
		$query=$this->db->query("DELETE FROM `product` WHERE `id`='$id'");
	}
    
	function viewproductimages($id)
	{
		$query="SELECT `id`, `product`, `image`, `order`, `timestamp` 
        FROM `productimages` 
        WHERE `product`='$id'
        ORDER BY `order`";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
    //-----------------------------------------------------------------------------------------------------------------------------------------
   
    public function getcategory()
	{
		$query="SELECT `id`,`name`,`parent` FROM  `category` ";
		$query=$this->db->query($query)->result();
		return $query;

	}
    public function getbrandcategory($id)
	{
		$query="SELECT  `brandcategory`.`id` ,  `brandcategory`.`brandid` ,  `brandcategory`.`categoryid` ,  `category`.`name` as `categoryname`, `category`.`parent`
FROM  `brandcategory` 
LEFT OUTER JOIN  `category` ON  `category`.`id` =  `brandcategory`.`categoryid`  WHERE `brandcategory`.`brandid`='$id'";
		$query=$this->db->query($query)->result();
		return $query;

	}
    public function createlocation($name,$cityid)
	{
		$data  = array(
			'name' => $name,
            'cityid'=> $cityid
		);
		$query=$this->db->insert( 'location', $data );
//		$id = $this->db->insert_id();
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewonebrand($id)
	{
		$query="SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange` WHERE `brand`.`id`='$id'";
		$query=$this->db->query($query)->row();
		return $query;
	}
	function viewonecitylocations($id)
	{
		$query="SELECT `location`.`id`,`location`.`name`,`location`.`cityid`, `city`.`name` AS `cityname` FROM `location`
        INNER JOIN `city` ON `city`.`id` = `location`.`cityid` WHERE `location`.`cityid`='$id'";
		$query=$this->db->query($query)->result();
		return $query;
	}
//	public function beforeedit( $id )
//	{
//		$this->db->where( 'id', $id );
//		$query['brand']=$this->db->get( 'brand' )->row();
//		$query['eventcategory']=array();
//		$eventcategory=$this->db->query("SELECT `category` FROM `eventcategory` WHERE `eventcategory`.`event`='$id'")->result();
//		foreach($eventcategory as $cat)
//		{
//			$query['eventcategory'][]=$cat->category;
//		}
//		$query['eventtopic']=array();
//		$eventtopic=$this->db->query("SELECT `topic` FROM `eventtopic` WHERE `eventtopic`.`event`='$id'")->result();
//		foreach($eventtopic as $top)
//		{
//			$query['eventtopic'][]=$top->topic;
//		}
//		return $query;
//	}
	public function beforeeditlocation( $id )
	{
		$this->db->where( 'id', $id );
		$query['location']=$this->db->get( 'location' )->row();
//		$query['eventcategory']=array();
//		$eventcategory=$this->db->query("SELECT `category` FROM `eventcategory` WHERE `eventcategory`.`event`='$id'")->result();
//		foreach($eventcategory as $cat)
//		{
//			$query['eventcategory'][]=$cat->category;
//		}
//		$query['eventtopic']=array();
//		$eventtopic=$this->db->query("SELECT `topic` FROM `eventtopic` WHERE `eventtopic`.`event`='$id'")->result();
//		foreach($eventtopic as $top)
//		{
//			$query['eventtopic'][]=$top->topic;
//		}
		return $query;
	}
	
    public function editbrand($id,$name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description)
	{
		$data  = array(
			'name' => $name,
			'website' => $website,
			'facebookpage' => $facebook,
			'twitterpage' => $twitter,
			'pininterest' => $pininterest,
			'googleplus' => $googleplus,
			'instagram' => $instagram,
			'blog' => $blog,
			'description' => $description,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'brand', $data );
//		if($query)
//		{
//			$this->savelog($id,'Brand Edited');
//		}
		return 1;
	}
	public function editlocation($id,$cityid,$name)
	{
		$data  = array(
			'cityid' => $cityid,
			'name' => $name
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'location', $data );
		if($query)
		{
			$this->savelog($id,'Location Edited');
		}
		return 1;
	}
     public function getbranddropdown()
	{
		$query=$this->db->query("SELECT * FROM `brand`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function deletebrand($id)
	{
		$query=$this->db->query("DELETE FROM `brand` WHERE `id`='$id'");
	}
	function deletesubcategory($id)
	{
		$query=$this->db->query("DELETE FROM `brandcategory` WHERE `brandid`='$id'");
	}
	function deletelocation($id)
	{
		$query=$this->db->query("DELETE FROM `location` WHERE `id`='$id'");
	}
	
	
	function savelog($id,$action)
	{
		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'user' => $id,
			'event' => $id,
			'description' => $action,
		);
		$query2=$this->db->insert( 'eventlog', $data2 );
	}
    //-----------------Changes made avinash
    function filterbrandbycategoryid($id)
    {
        $query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range`, `brand`.`video`,`category`.`name` FROM `brand`
LEFT OUTER JOIN `brandcategory`ON `brandcategory`.`brandid`=`brand`.`id`
LEFT OUTER JOIN `category`ON `category`.`id`=`brandcategory`.`categoryid`
LEFT OUTER JOIN `pricerange`ON `brand`.`pricerange`=`pricerange`.`id`
WHERE `brandcategory`.`categoryid`='$id'")->result();
         return $query;
    }
    
   
    
    //------------------------
}
?>