<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>


<form>
<input type="text" name="search" class="form-control" id="searchdata" placeholder="Search" style="float:right;">
</form>

<?php
$handle = curl_init();
 
// $url = "http://103.133.204.82/Data/Disk2/Hindi%20Movie/";
// $url ="http://103.114.38.38/HDD5/Hindi%20Movies/";
$url = "http://robots.stanford.edu/movies/";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_POST, false);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($handle);
 
curl_close($handle);
 
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($output);
$element = $dom->getElementsByTagName('a');


$out = "<table id='table' class='table table-responsive'><tr><td>Name</td><td>Size</td></tr>";
for($i=5; $i<$element->length; $i++)
{
  $out .= "<tr><td><a href='".$url.$element->item($i)->nodeValue."'>".$element->item($i)->nodeValue."</a></td><td></td></tr>"; 
 
}
$out.="</table>";
echo $out;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <!-- for dynamic search  -->
    <script type="text/javascript">
      $(document).ready(function(){
      
      $('#searchdata').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
  });
    </script>

</body>
</html>