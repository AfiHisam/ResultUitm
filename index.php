<?php

if (isset($_POST['result_link'])){
	$result_link  = $_POST['result_link'];

$parts = parse_url($result_link);
parse_str($parts['query'], $query);
$id1 = $query['id1'];
$id2 = $query['id2'];
$id3 = $query['id3'];
$id4 = $query['id4'];
$id5 = $query['id5'];
$idsem1 = $query['idsem1'];
$idsem2 = $query['idsem2'];
$idsem3 = $query['idsem3'];

$link = 'http://simsweb.uitm.edu.my/sportal_app/STUDENTPORTAL_EXAM_RESULT_SLIP_FROM_EMAIL/print.cfm?';

/*

id1 : kalau sama tahun +2, lain +8
id2 : tak berubah
id3 : kalau sama tahun +2, lain +8
id4 : kalau sama tahun +2, lain +8
id5 : No matrix, x berubah
idsem1 : sem 20182/20184, ada dua jer 2 dan 4, kalau sebelum ni 20182 selepas nya 20184, kalau 20184 seterusnya 20192
idsem2 : +8 kalau sama tahun, +32 kalau lain tahun
idsem3 : +4 kalau sama tahun, +16 kalau lain tahun

*/


 $currentYear = date("Y");
 $linkYear = substr($idsem1, 0, 4);

 if($currentYear == $linkYear){

 	// echo 'Same year';

 	$newid1 = $id1+2;
 	$newid2 = $id2;
 	$newid3 = $id3+2;
 	$newid4 = $id4+2;
 	$newid5 = $id5;


 	$newidsem1 = $idsem1+2;
 	$newidsem2 = $idsem2+8;
 	$newidsem3 = $idsem3+4;

 	$newlink = $link.'id1='.$newid1.'&id2='.$newid2.'&id3='.$newid3.'&id4='.$newid4.'&id5='.$newid5.'&idsem1='.$newidsem1.
 	'&idsem2='.$newidsem2.'&idsem3='.$newidsem3;


 }else{


 	// echo 'Diff Year';

 	$newid1 = $id1+8;
 	$newid2 = $id2;
 	$newid3 = $id3+8;
 	$newid4 = $id4+8;
 	$newid5 = $id5;
 
 	$newidsem1 = $idsem1+8;
 	$newidsem2 = $idsem2+32;
 	$newidsem3 = $idsem3+16;

 	 $newlink = $link.'id1='.$newid1.'&id2='.$newid2.'&id3='.$newid3.'&id4='.$newid4.'&id5='.$newid5.'&idsem1='.$newidsem1.
 	'&idsem2='.$newidsem2.'&idsem3='.$newidsem3;



 }

 echo 'Generated Link : <br>
 <a href='.$newlink.'>'.$newlink.'</a>';


/*echo 'id1 : '.$id1.
	'<br> id2 : '.$id2.
	'<br> id3 : '.$id3.
	'<br> id4 : '.$id4.
	'<br> id5 : '.$id5.
	'<br> idsem1 : '.$idsem1.
	'<br> idsem2 : '.$idsem2.
	'<br> idsem3 : '.$idsem3;*/
}

echo '<hr>';
?>


<html>
<body>

<form action="" method="post">
Pervious Result Link : 
<p>
<textarea name="result_link" rows="5" cols="40"> </textarea>
<br>
<input type="submit">
<input type="reset">
</form>

</body>
</html>