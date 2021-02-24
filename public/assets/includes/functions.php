<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function StringToDate($sdate) {
//    if (empty($sdate)) {return "NULL";} else {
        return date('Y-m-d',strtotime(substr($sdate,3,2)."/".substr($sdate,0,2)."/".substr($sdate,6,4)));
} 
function DateToString($ddate) {
    $sdate = str_replace("\r",'',$ddate);
    if (empty($sdate)) {return "";} else {return substr($sdate,8,2)."/".substr($sdate,5,2)."/".substr($sdate,0,4); }
} 
function AccWeekno($wDate,$dStart) {
        $date=date_create();
        $Y = date("Y",strtotime($dStart));
        $ldate = date_create();
        date_date_set($ldate,$Y,12,31);
        $ddate = date_format($ldate,"Y/m/d");
        $finweek = Weekno($ddate);
        $begweek = Weekno($dStart);
        $X = date("Y",strtotime($wDate));
        if ($X == $Y) {
            return Weekno($wDate) - $begweek +1 ;
        }
        else {
            return Weekno($wDate) + ($finweek - $begweek) -1;
        }
}
function AccYearStart($wDate) {
    if (substr(DTOS($wDate),4)>="0801") {
        $Yr = date("Y",strtotime($wDate))+1; }
    else {
        $Yr = date("Y",strtotime($wDate)); }
    
    $date=date_create();
    date_date_set($date,$Yr,8,1);
    return date_format($date,"Y/m/d");
}

function AccYearEnd($wDate) { 

 } 

function Weekno($wDate) { 
    $date = new DateTime($wDate);
    $week = $date->format("W");
    return $week+1-1;
 } 
 
 function DTOS($wDate) {
$sdate = str_replace("\r",'',$wDate);
$sdate1 = str_replace('-', '', $sdate);
return $sdate1;
}

function GetFont($ln,$fs) { 
if ($ln==1) {return '';} else {return 'style="font: 300 '.$fs.'px Changa;"';}
} 

function check_email_address($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function CheckNonAlphabet($input) {
    //return preg_match('/^\[a-zA-Z]+$/',$input);
    return preg_match('/[^a-zA-Z]+/', $input, $matches);

}

function UploadImage($target_dir,$target_file) {
    $target_dir = "admin/assets/admin/layout/img/students/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . "20150154.png";
phpAlert($target_file);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}
}
// Check if file already exists
if (file_exists($target_file)) {
echo "Sorry, file already exists.";
$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}}}

function GetMobileProvider($mobile) {
    $returnValue = '';
    if (empty($mobile)) {return "";} else {
    $cLet = substr($mobile,3,1);
    $cExt = substr($mobile,3,2);
    $cAlp = substr($mobile,strlen($mobile)-6,1);
        if ($cLet=='3' || $cExt=='70' || $cExt=='80' || $cExt=='76' || $cExt=='86') {
            if ($cAlp=='1' || $cAlp=='2' || $cAlp=='3' || $cAlp=='4' || $cAlp=='5') {
                $returnValue = 'alfa';
            } else {
                $returnValue = 'mtc-touch';
            }
        } else {
            if ($cAlp=='1' || $cAlp=='2' || $cAlp=='3' || $cAlp=='4' || $cAlp=='5') {
                $returnValue = 'mtc-touch';
            } else {
                $returnValue = 'alfa';
            }
        }
return $returnValue;}}
?>