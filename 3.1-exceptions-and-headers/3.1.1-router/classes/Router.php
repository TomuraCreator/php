<?php
class Router 
{
    private $availableLink;
    function __construct(array $link)
    {
        $this->availableLink = $link;
    }
   
    private function isEmptyString(string $name) : bool 
    {
        if(empty($name)) {
            throw new EmptyDate('Строка пуста');
        } else {
            return true;
        }
    }

    private function isArrayValue(string $name) : bool
    {
        $array_pages = $this->availableLink;

        if(!in_array($name, $array_pages)) {
            throw new NotPage($name);
        } else {
            return true;
        }
    }

    public function isAvailableLink(string $name) : bool
    {
        if($this->isEmptyString($name) &&  $this->isArrayValue($name) ) {
            return true;
        } 
    }
}