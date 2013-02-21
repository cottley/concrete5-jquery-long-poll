<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class jquerylongpollPackage extends Package {

	protected $pkgHandle = 'jquery_long_poll';
	protected $appVersionRequired = '5.3.3'; 
	protected $pkgVersion = '1.0.0';
	
	public function getPackageDescription() {
		return t("Lets you add a block where you can execute a long poll against a server and process the result.");
	}
	
	public function getPackageName() {
		return t("Jquery-long-poll");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('jquerylongpoll', $pkg);
		
	}

}