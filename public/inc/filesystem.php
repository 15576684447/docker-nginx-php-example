<?php
function GetExtension($file)
{
  return substr(strrchr($file, "."), 1);
}

class FileSystem 
{
  static function FileList($dir, &$flist, $ext = "") 
  {
    if(is_dir($dir))
    {
      $dh = opendir($dir);
      if ($dh != null)
      {
        while (($file = readdir($dh)) !== false)
        {
          if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
          {
            $this->FileList($dir."/".$file."/");
          }
          else
          {
            if($file!="." && $file!="..")
            {
//               $file = iconv( "gbk", "utf-8", $file );
              $path = $dir.$file;
              //$path = substr($path, 1);
              echo $file,"  ext=", GetExtension($file), "<br> ";
              
              if($ext == "") {
                array_push($flist, $path);
              }else if(GetExtension($file) == $ext){
                array_push($flist, $path);
              }
            }
          }
        }
        closedir($dh);
      }
    }
  }
  static function mp4FileList($dir, &$flist) 
  {
    if(is_dir($dir))
    {
      $dh = opendir($dir);
      if ($dh != null)
      {
        while (($file = readdir($dh)) !== false)
        {
          $path = $dir.$file;
          //if(!(is_dir($dir."/".$file)) && ($file!=".") && ($file!="..")
          if(GetExtension($file) == "mp4")
          {
            array_push($flist, $path);
          }
          if(GetExtension($file) == "flv")
          {
            array_push($flist, $path);
          }
        }
        closedir($dh);
      }
    }
  }
}