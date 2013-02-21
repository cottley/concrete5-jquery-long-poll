<?php    
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class JquerylongpollBlockController extends BlockController {
				 
		protected $btTable = 'btJquerylongpoll';
		protected $btInterfaceWidth = "400";
		protected $btInterfaceHeight = "230";
		
		public $jsonURL = "";
		public $jsonURLType = "json";
		public $jsontimeout = "30000";
    
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Lets you add a block that will let you do a long poll to a URL");
		}
		
		public function getBlockTypeName() {
			return t("jQuery Long Poll");
		}
				
		function __construct($obj = null) {		
			parent::__construct($obj);	
		}
    
    public function on_page_view() {
      $bv = new BlockView();
      $bv->setBlockObject($this->getBlockObject());
      $blockURL = $bv->getBlockURL();
      $html = Loader::helper('html');            
      $this->addHeaderItem($html->javascript("{$blockURL}/json2.js"));
      $pg = Page::getCurrentPage();
      $this->set('isEditMode', $pg->isEditMode());
		}
    
		function view(){ 
			$this->set('jsonURL', $this->jsonURL); 
			$this->set('jsonURLType', $this->jsonURLType);
      $this->set('jscontent', $this->jscontent);
      $this->set('jsontimeout', $this->jsontimeout);      
		}
		
		function save($data) { 
			$args['jsonURL'] = isset($data['jsonURL']) ? trim($data['jsonURL']) : '';
			$args['jsonURLType'] = isset($data['jsonURLType']) ? trim($data['jsonURLType']) : '';
			$args['jscontent'] = isset($data['jscontent']) ? $data['jscontent'] : '';      
			$args['jsontimeout'] = isset($data['jsontimeout']) ? $data['jsontimeout'] : '';      
			parent::save($args);
		}
		
	}
	
?>