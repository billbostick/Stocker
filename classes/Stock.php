<?php namespace Bostick\Stocker\Classes;

class Stock
{

  public function info($symbol)
  {
    $json = file_get_contents(sprintf(
      "http://finance.yahoo.com/webservice/v1/symbols/%s/quote?format=json&view=detail",
      $symbol
    ));
    $postDecode = json_decode($json);
    if (empty($postDecode->list->resources)) {
      return null;
      }
    $fields = $postDecode->list->resources[0]->resource->fields;
    return($fields);
  }
}

