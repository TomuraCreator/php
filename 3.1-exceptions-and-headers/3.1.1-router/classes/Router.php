<?php
class Router 
{
    private $availableLink;
    function __construct(array $link)
    {
        $this->availableLink = $link;
    }
   
    private function isEmptyString(string $name) : void 
    {
        if(empty($name)) {
            throw new Exception();
            exit;
        }
    }

    private function isArrayValue(string $name) : void
    {
        $array_pages = $this->availableLink;

        if(!in_array($name, $array_pages)) {
            throw new Exception($name);
            exit;
        }
    }

    public function isAvailableLink(string $name) : bool
    {
        try {
            $this->isEmptyString($name);
            
        } catch(Exception $e) {
            header('Location: errors/error.php?name='. $e->getMessage());
            exit;
        }
        try {
            $this->isArrayValue($name);
        } catch(Exception $e) {

            header('Location: errors/404page.php');
            exit;
        }
        return true;
    }

}