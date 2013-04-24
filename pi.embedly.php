<?php
class Plugin_embedly extends Plugin {

  var $meta = array(
    'name'       => 'Embedly',
    'version'    => '0.1',
    'author'     => 'Blain Smith',
    'author_url' => 'http://blainsmith.com'
  );

  public function index() {
    $url       = $this->fetchParam('url', '');
    $key       = $this->fetchParam('key', Config::get('embedly_api_key', ''));
    $max_width = $this->fetchParam('max_width', false, 'is_numeric');

    $endpoint_url  = "http://api.embed.ly/1/oembed?format=json&key={$key}&url={$url}&maxwidth={$max_width}";

    try {
      $response = file_get_contents($endpoint_url);
      $data = (array) json_decode($response);

      // Alias "{{ html }}" to {{ embed }} for clarity's sake
      $data['embed'] = $data['html'];
      $data['debug'] = $response;

      if ($this->content != "") {
        return Parse::template($this->content, $data); // Tag pair
      } else {
        return $data['html']; // Single tag
      }
    } catch(Exception $e) {
      return null;
    }
  }
}