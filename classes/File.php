<?php
namespace Techstore\Classes;

class File
{
    private $name,$tmp_name,$upload_name;
    public function __construct(array $file)
    {
        $this->name = $file['name'];
        $this->tmp_name = $file['tmp_name'];
    }


    public function set_name($name)
    {
        $this->upload_name = $name;
        return $this;
       
    }

    public function rename()
    {
        $ext = pathinfo($this->name,PATHINFO_EXTENSION);
        $random_str = uniqid();
        $this->upload_Name = $random_str.".".$ext;
        return $this;

    }

    public function upload()
    {
       
        $destination =PATH."uploads/".$this->upload_Name;
        move_uploaded_file($this->tmp_name,$destination);
        return $this->upload_Name;
    }
}