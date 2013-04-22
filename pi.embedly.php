<?php
class Plugin_embedly extends Plugin {

  var $meta = array(
    'name'       => 'Embedly',
    'version'    => '0.1',
    'author'     => 'Blain Smith',
    'author_url' => 'http://blainsmith.com'
  );

  public function index() {
    $url = $this->fetchParam('url', '');
    $key = $this->fetchParam('key', Config::get('embedly_api_key', ''));
    $endpoint_url  = "http://api.embed.ly/1/oembed?format=json&key={$key}&url={$url}";

    try {
      $data = json_decode(file_get_contents($endpoint_url));

      if ($this->content != "") {
        return Parse::template($this->content, (array)$data); // Tag pair
      } else {
        return $data->html; // Single tag
      }
    } catch(Exception $e) {
      return null;
    }
  }
}