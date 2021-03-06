<?php
class menu_model extends CI_Model {

     public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
    /**
     * 
	 * Public function getMenuCat()
     *
     * get menu categories from menu_cat table on database
     */

    public function getMenuCat()
    {
        
         $query = $this->db->get_where('menu_cat');
	     
	     return $query->result_array();
   
    }
    

    /**
     * 
	 * Public function getCatItems( $catID )
     *
     * show "results" (category items) from menu_item
     */
     
    public function getCatItems( $catID )
    {
         

        $result = $this->db->query("SELECT * FROM menu_item WHERE catID = '" . $catID . "'");
        
	    return $result->result_array();
    
    } 
	
    
	/**
     * 
	 * Public function menuCatLinkToId($link)
     *
     * gets the right category items for given catID and returns the link
   	 */	  
   
   
   Public function menuCatLinkToId($link)
   {

		$result = $this->db->query("SELECT id FROM menu_cat WHERE link = '" . $link . "'");

		$resar	=	$result->result_array();

	    return $resar[0]["id"];
	
   }
   
   
    /**
     * 
	 * Public function getMenuItem()
     *
     * get menu item from menu_item table on database
     */
   
   Public function getMenuItem($link)
   {
   	
		$query = $this->db->query("SELECT * FROM menu_item WHERE link = '" . $link . "'");
	     
	    return $query->result_array();
	
   } 
   
   /**
    * Public function menuPageName($pageName)
    * 
    * gets the name/title of the page, voorgerechten, hoofdgerechten, nagerechten, ...
    * 
    */
   
   
   Public function menuPageName($pageName)
   {
   	
		$query = $this->db->query("SELECT name FROM menu_cat WHERE link = '" . $pageName . "'");
		
		return $query->result_array();
	
   }
}

?>