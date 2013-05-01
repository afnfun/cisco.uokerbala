<?php
include('class.hr3');     
$cisco= new cisco;
// 
// define external xml file
// هنا ممكن اضافة مسار ملفات ال xml  اذا كانتا موجودتا خارج الموقع
$courses=''; // define the URL of courses.xml  
$site=''; // define the URL of site.xml  
//
if (!file_exists($courses))  // if courses file not exist externally, use internal file
    {
    if (file_exists('../includes/courses.xml')) {$courses='../includes/courses.xml';}
    if (file_exists('includes/courses.xml')) {$courses='includes/courses.xml';}
    }
if (!file_exists($site))  // if site file not exist externally, use internal file
    {
    if (file_exists('../includes/site.xml')) {$site='../includes/site.xml';}
    if (file_exists('includes/site.xml')) {$site='includes/site.xml';}
    }
//
$xml1 = simplexml_load_file($courses, null, true);
$xml2 = simplexml_load_file($site, null, true);
?>