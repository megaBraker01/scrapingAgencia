<?php
class fileHandler {
    protected $fileName;
    protected $accessMode;
    protected $content;
    protected $fileSize;
    protected $file;

    public function __construct(string $fileName = "", $accessMode = "a+"){
        
        if(!$file = fopen($fileName, $accessMode)){
            throw new Exception("[ERROR] No se ha podido abrir o crear el archivo ".$fileName);
        }
        $fileSize = filesize($fileName);
        $content = fread($file, $fileSize+1);
        $this->setFileName($fileName)->setAccessMode($accessMode)->setContent($content)->setFile($file);
        
    }
    
    public function getFileName() {
        return $this->fileName;
    }

    public function getAccessMode() {
        return $this->accessMode;
    }

    public function getContent() {
        return $this->content;
    }

    public function getFileSize() {
        return $this->fileSize;
    }
    
    public function getFile() {
        return $this->file;
    }
    
    public function fileInfo(string $filename = "") {
        $finalfilename = "" == $filename ? $this->getFileName() : $filename;
        return stat($finalfilename);
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
        return $this;
    }

    public function setAccessMode($accessMode) {
        $this->accessMode = $accessMode;
        return $this;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setFileSize($fileSize) {
        $this->fileSize = $fileSize;
        return $this;
    }

    public function setFile($file) {
        $this->file = $file;
        return $this;
    }
    
    public function close() {
        return fclose($this->getFile());
    }
    
    public function write(string $newContent = "") {
        $finalNewContent = "" == $newContent ? $this->getContent() : $newContent;
        $this->setContent($finalNewContent);
        $ret = fwrite($this->getFile(), $finalNewContent);
        $this->close();
        return $ret;
    }
    
    public function delete(string $fileName = "") {
        $finalFileName = "" == $fileName ? $this->getFileName() : $fileName;
        if(!$ret = unlink($finalFileName)){
            throw new Exception("[ERROR] No se ha podido eliminar el archivo ".$finalFileName);
        }
        return $ret;
    }
    
}
?>