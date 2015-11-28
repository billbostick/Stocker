<?php namespace Bostick\Stocker\Components;

use ApplicationException;
use Cms\Classes\ComponentBase;
use Cache;
use Request;
use Bostick\Stocker\Classes\Stock as Stock;

class Stocker extends ComponentBase
{
    public $quotes = array();
    public $listSymbols;

    public function componentDetails()
    {
        return [
            'name'        => 'Stock quote',
            'description' => 'Outputs the stock quote information on a page.'
        ];
    }

    public function defineProperties()
    {
        return [
           'symbol' => [
                'title'             => 'Synbol',
                'type'              => 'string',
                'default'           => '',
                'placeholder'       => 'Enter one ore more stock symbols',
                'validationPattern' => '^[0-9a-zA-Z\s]+$',
                'validationMessage' => 'The Symbol field is required.'
            ],
        ];
    }

    public function init()
    {
    }
    public function onRun()
    {
    }

    public function onAddItem()
    {
      $myStock = new Stock;
      $existingSymbols = post('listSymbols', []);
      if (($quoteSymbol = post('quoteSymbol')) != '') {
        $this->listSymbols = array_merge($existingSymbols, explode(' ', trim($quoteSymbol)));
        foreach ($this->listSymbols as $symbol) {
          if ($quote = $myStock->info($symbol)) {
            $this->quotes[] = $quote;
          }
        }
      }
    }
}
