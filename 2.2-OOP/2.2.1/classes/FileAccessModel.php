<?php

class FileAccessModel {
    protected $path = Config::DATABASE_PATH;
    protected $fileName;
    protected $file;
    
    function __construct( string $name ) {
        $this->fileName = $this->path . $name . '.txt';
        if(!file_exists($this->fileName)) {
            throw new Exception("В каталоге $this->path нет файла $name.txt");
        }
    }
    protected function connect() {
        $this->file = fopen( $this->fileName, 'r+');
    }
    protected function disconect() {
        fclose($this->file);
    }
    public function read() {
        $this->connect();
        $reads = fread($this->file, filesize($this->fileName));
        $this->disconect();
        return $reads;
    }
    public function write( string $text ) {
        $this->connect();
        
        if (isset($text) && $text !== '') {
            ftruncate($this->file, 0);
            fwrite($this->file, trim($text));
        }

        $this->disconect();
    }
}
?>