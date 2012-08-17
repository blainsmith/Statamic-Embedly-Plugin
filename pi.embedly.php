<?php
class Plugin_embedly extends Plugin {

  var $meta = array(
    'name'       => 'Embedly',
    'version'    => '0.1',
    'author'     => 'Blain Smith',
    'author_url' => 'http://blainsmith.com'
  );
  
  function __construct() {
    parent::__construct();
    $this->endpoint_url  = 'http://api.embed.ly/1/oembed?format=json&url=';
  }

  public function index() {
    $url = $this->fetch_param('url', '');
    
    try {
	    $data = json_decode(file_get_contents($this->endpoint_url . $url));
	    
	    return '';
    } catch(Exception $e) {
		  return '';
	  }
  }
}