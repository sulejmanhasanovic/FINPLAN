<?php
	require_once("./includes/common.php");
	require_once(MODELS_PATH."XmlData.php");
	require_once(INCLUDE_PATH."/Config.class.php");
	require_once(MODELS_PATH."/CaseStudy.php");
	$caseStudies = CaseStudy::getAllCaseStudies();
	require_once(INCLUDE_PATH."/label.php");
	//if form is post
	if(isset($_POST['action'])){
		
		$action = $_POST['action'];
		$name = sanitize_filename($_POST['caseStudyId']);
		
		if($action == 's'){//select
			if($_POST['option']=='rep'){
				$sourcedir = PROJECT_DATA_FILE_PATH.$name.'/' ;
				$filename = $name.'.zip';
				$dest = DATA_FILE_PATH.'projects/backup/';
			}elseif($_POST['option']=='nex'){
				$sourcedir = PROJECT_DATA_FILE_PATH.$name.'/' ;
				date_default_timezone_set('UTC');
				$today = date('jmyhi');     
				$filename = $name.'_'.$today.'.zip';
				$dest = DATA_FILE_PATH.'projects/backup/';
			}elseif($_POST['option']=='ren'){
				$sourcedir = PROJECT_DATA_FILE_PATH.$name.'/' ;
				$filename = $name.'.zip';
				$dest = DATA_FILE_PATH.'projects/backup/tmp/';
			}
			if (!is_dir($dest)) {
				mkdir($dest);
		    }
			$destdir = $dest.$filename;
			$zip = new ZipFolder($destdir, $sourcedir, '.svn');
			
			if($_POST['option']=='ren'){
				  
				if(!is_file($destdir)){ 
					print "Sorry that file does not exist"; 
					exit; 
				}else{ 
					header("Content-Type: octet/stream"); 
					header("Content-Disposition: attachment; filename=\"".$filename."\""); 
					$fp = fopen($destdir, "r"); 
					$data = fread($fp, filesize($destdir)); 
					fclose($fp); 
					print $data; 
				} 
				if(is_file($destdir)){
					unlink($destdir);
				}
			}
			include(TEMPLATE_PATH."backup.tpl.php");
			
								
		}else{
			include(TEMPLATE_PATH."backup.tpl.php");
		}
		
	}else{
	
		include(TEMPLATE_PATH."backup.tpl.php");
	}


	
	

//Run the command and print out the result string

class ZipFolder {
    protected $zip;
    protected $root;
    protected $ignored_names;
    
    function __construct($file, $folder, $ignored=null) {
        $this->zip = new ZipArchive();
        $this->ignored_names = is_array($ignored) ? $ignored : $ignored ? array($ignored) : array();
        if ($this->zip->open($file, ZIPARCHIVE::CREATE)!==TRUE) {
            throw new Exception("cannot open <$file>\n");
        }
        $folder = substr($folder, -1) == '/' ? substr($folder, 0, strlen($folder)-1) : $folder;
        if(strstr($folder, '/')) {
            $this->root = substr($folder, 0, strrpos($folder, '/')+1);
            $folder = substr($folder, strrpos($folder, '/')+1);
        }
        $this->zip($folder);
        $this->zip->close();
    }
    
    function zip($folder, $parent=null) {
        $full_path = $this->root.$parent.$folder;
        $zip_path = $parent.$folder;
        $this->zip->addEmptyDir($zip_path);
		$dir = new DirectoryIterator($full_path);
        foreach($dir as $file) {
            if(!$file->isDot()) {
                $filename = $file->getFilename();
                if(!in_array($filename, $this->ignored_names)) {
                    if($file->isDir()) {
                        $this->zip($filename, $zip_path.'/');
                    }
                    else {
                        $this->zip->addFile($full_path.'/'.$filename, $zip_path.'/'.$filename);
					
						


                    }
                }
            }
        }
    }
}


?> 



