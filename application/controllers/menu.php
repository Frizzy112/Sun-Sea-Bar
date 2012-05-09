<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	public function __construct()
   	{
   		
    	parent::__construct();
		$this->load->model("Menu_model");
			
	}

	/*
	 * 
	 * Public function index()
	 * 
	 * Will display all menu categories 
	 * 
	 * 
	 */

	public function index()
	{
	
	    $data = $this->Menu_model->getMenuCat();

		$this->load->view("header");
		$this->load->view( "menu", array("name" => $data));    		
		$this->load->view("footer");
	
	}
	
	/*
	 * 
	 * Public function category()
	 * 
	 * Will display all subcetagories followed by the different items in the category.
	 * 
	 */
	
	public function category()
	{
			
		$link 	=  $this->uri->segment(3,0);
	
		$id		=  $this->Menu_model->menuCatLinkToId($link);
	
		$data   =  $this->Menu_model->getCatItems( $id );
		
	
		$this->load->view("header");
		$this->load->view( "cat_items", array("name" => $data));    		
		$this->load->view("footer");
			
	}
	
	/*
	 * 
	 * Public function item()
	 * 
	 * Will display a menu item.
	 * 
	 */
	
	public function item()
	{
		
		$link 	=  $this->uri->segment(4,0);
	
		$id		=  $this->Menu_model->menuCatLinkToId($link);
	
		$data   =  $this->Menu_model->getCatItems( $id );
		
	
		$this->load->view("header");
		$this->load->view( "menu_item", array("name" => $data));    		
		$this->load->view("footer");
		
	} 
	
}

?>