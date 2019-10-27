<?php 
    class JsonFileAccessModel extends FileAccessModel {
        public function readJSON()
        {
            $this->connect();
            if(!filesize($this->fileName) > 0) {
                return 'Файл пуст';
            }
            $reads = fread($this->file, filesize($this->fileName));
            $this->disconect();
            return json_decode($reads, JSON_PRETTY_PRINT);
        } 
        public function writeJSON(string $textJson)
        {      
            $this->connect();
        
            if (isset($textJson) && $textJson !== '') {
                ftruncate($this->file, 0);
                fwrite($this->file, $textJson);
            }
            $this->disconect();
        }
    }