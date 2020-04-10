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

		$filename = sanitize_filename($_POST['studyName']);
		$directory_path = PROJECT_DATA_FILE_PATH.$filename;
	
		if ($filename === '' or file_exists($directory_path)) {
		  // ask for different name
		  $filename_ok = "no";
		} else {
		  mkdir($directory_path);//, 0777);
		  $caseId = sanitize_filename($_POST['caseStudyId']);
		  $src = PROJECT_DATA_FILE_PATH.$caseId;
		  $dest = $directory_path;
		  smartCopy($src, $dest, 0755,0644);
		
		  $dom = new DOMDocument();
		  $dom->load($dest.'/geninf_data.xml');
		  $ns = $dom->getElementsByTagName('studyName');
		  $n = $ns->item(0);
		  $a = $dom->createElement('studyName');  
		  $a->appendChild($dom->createTextNode($_POST['studyName']));
		  $n->parentNode->replaceChild($a, $n);
		  $ms = $dom->getElementsByTagName('id');
		  $m = $ms->item(0);
		  $b = $dom->createElement('id');  
		  $b->appendChild($dom->createTextNode($_POST['studyName']));
		  $m->parentNode->replaceChild($b, $m)  ;
		  $dom->save($dest.'/geninf_data.xml');
		  redirectBrowser(HTTP_ROOT."begin.php");
		}
	}	
	
include(TEMPLATE_PATH."copy.tpl.php");


function smartCopy($source, $dest, $folderPermission=0755,$filePermission=0644){ 
# source=file & dest=dir => copy file from source-dir to dest-dir 
# source=file & dest=file / not there yet => copy file from source-dir to dest and overwrite a file there, if present 

# source=dir & dest=dir => copy all content from source to dir 
# source=dir & dest not there yet => copy all content from source to a, yet to be created, dest-dir 
    $result=false; 
    
    if (is_file($source)) { # $source is file 
        if(is_dir($dest)) { # $dest is folder 
            if ($dest[strlen($dest)-1]!='/') # add '/' if necessary 
                $__dest=$dest."/"; 
            $__dest .= basename($source); 
            } 
        else { # $dest is (new) filename 
            $__dest=$dest; 
            } 
        $result=copy($source, $__dest); 
        chmod($__dest,$filePermission); 
        } 
    elseif(is_dir($source)) { # $source is dir 
        if(!is_dir($dest)) { # dest-dir not there yet, create it 
            @mkdir($dest,$folderPermission); 
            chmod($dest,$folderPermission); 
            } 
        if ($source[strlen($source)-1]!='/') # add '/' if necessary 
            $source=$source."/"; 
        if ($dest[strlen($dest)-1]!='/') # add '/' if necessary 
            $dest=$dest."/"; 

        # find all elements in $source 
        $result = true; # in case this dir is empty it would otherwise return false 
        $dirHandle=opendir($source); 
        while($file=readdir($dirHandle)) { # note that $file can also be a folder 
            if($file!="." && $file!="..") { # filter starting elements and pass the rest to this function again 
#                echo "$source$file ||| $dest$file<br />\n"; 
                $result=smartCopy($source.$file, $dest.$file, $folderPermission, $filePermission); 
                } 
            } 
        closedir($dirHandle); 
        } 
    else { 
        $result=false; 
        } 
    return $result; 
    } 
?> 




