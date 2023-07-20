<?php
$index=$_POST['index'];

$messageArrayCod=array( 
'platin-d4-white'=>array('productCode'=>"19031W","prodName"=>"KUHL PLATIN-D4 WHITE","category"=>"FG KUHL Fans"),
'platin-d4-brown'=>array('productCode'=>"19031B","prodName"=>"KUHL PLATIN-D4 BROWN","category"=>"FG KUHL Fans"),
'platin-d4-teak'=>array('productCode'=>"19031T","prodName"=>"KUHL PLATIN-D4 TEAK","category"=>"FG KUHL Fans"),

'platin-d5-white'=>array('productCode'=>"19033W","prodName"=>"KUHL PLATIN-D5 WHITE","category"=>"FG KUHL Fans"),
'platin-d5-brown'=>array('productCode'=>"19033B","prodName"=>"KUHL PLATIN-D5 BROWN","category"=>"FG KUHL Fans"),
'platin-d5-teakwood'=>array('productCode'=>"19033T","prodName"=>"KUHL PLATIN-D5 TEAKWOOD","category"=>"FG KUHL Fans"),

'platin-d6-white'=>array('productCode'=>"19034W","prodName"=>"KUHL PLATIN-D6 WHITE","category"=>"FG KUHL Fans"),
'platin-d6-brown'=>array('productCode'=>"19034B","prodName"=>"KUHL PLATIN-D6 BROWN","category"=>"FG KUHL Fans"),
'platin-d6-teakwood'=>array('productCode'=>"19034T","prodName"=>"KUHL PLATIN-D6 TEAKWOOD","category"=>"FG KUHL Fans"),

'platin-d8-white'=>array('productCode'=>"19032W","prodName"=>"KUHL PLATIN-D8 WHITE","category"=>"FG KUHL Fans"),
'platin-d8-brown'=>array('productCode'=>"19032B","prodName"=>"KUHL PLATIN-D8 BROWN","category"=>"FG KUHL Fans"),
'platin-d8-teak'=>array('productCode'=>"19032T","prodName"=>"KUHL PLATIN-D8 TEAK","category"=>"FG KUHL Fans"),

'luxus-c3-white'=>array('productCode'=>"19021W","prodName"=>"KUHL LUXUS-C3 WHITE","category"=>"FG KUHL Fans"),
'luxus-c3-brown'=>array('productCode'=>"19021B","prodName"=>"KUHL LUXUS-C3 BROWN","category"=>"FG KUHL Fans"),
'luxus-c3-teak'=>array('productCode'=>"19021T","prodName"=>"KUHL LUXUS-C3 TEAK","category"=>"FG KUHL Fans"),

'luxus-c4-white'=>array('productCode'=>"19022W","prodName"=>"KUHL LUXUS-C4 WHITE","category"=>"FG KUHL Fans"),
'luxus-c4-brown'=>array('productCode'=>"19022B","prodName"=>"KUHL LUXUS-C4 BROWN","category"=>"FG KUHL Fans"),
'luxus-c4-teak'=>array('productCode'=>"19022T","prodName"=>"KUHL LUXUS-C4 TEAK","category"=>"FG KUHL Fans"),

'luxus-c5-white'=>array('productCode'=>"19023W","prodName"=>"KUHL LUXUS-C5 WHITE","category"=>"FG KUHL Fans"),
'luxus-c5-brown'=>array('productCode'=>"19023B","prodName"=>"KUHL LUXUS-C5 BROWN","category"=>"FG KUHL Fans"),
'luxus-c5-teak'=>array('productCode'=>"19023T","prodName"=>"KUHL LUXUS-C5 TEAK","category"=>"FG KUHL Fans"),

'brise-e3-wood'=>array('productCode'=>"19041T","prodName"=>"KUHL BRISE-E3 WOOD","category"=>"FG KUHL Fans"),
'brise-e3-black'=>array('productCode'=>"19041BL","prodName"=>"KUHL BRISE-E3 BLACK","category"=>"FG KUHL Fans"),
'brise-e3-brown'=>array('productCode'=>"19041B","prodName"=>"KUHL BRISE-E3 BROWN","category"=>"FG KUHL Fans"),
'brise-e3-copper'=>array('productCode'=>"19041C","prodName"=>"KUHL BRISE-E3 COPPER","category"=>"FG KUHL Fans"),
'brise-e3-white'=>array('productCode'=>"19041W","prodName"=>"KUHL BRISE-E3 WHITE","category"=>"FG KUHL Fans"),
'brise-e3-silver'=>array('productCode'=>"19041S","prodName"=>"KUHL BRISE-E3 SILVER","category"=>"FG KUHL Fans"),

'brise-e4-wood'=>array('productCode'=>"19043T","prodName"=>"KUHL BRISE-E4 WOOD","category"=>"FG KUHL Fans"),
'brise-e4-black'=>array('productCode'=>"19043BL","prodName"=>"KUHL BRISE-E4 BLACK","category"=>"FG KUHL Fans"),
'brise-e4-brown'=>array('productCode'=>"19043B","prodName"=>"KUHL BRISE-E4 BROWN","category"=>"FG KUHL Fans"),
'brise-e4-copper'=>array('productCode'=>"19043C","prodName"=>"KUHL BRISE-E4 COPPER","category"=>"FG KUHL Fans"),
'brise-e4-white'=>array('productCode'=>"19043W","prodName"=>"KUHL BRISE-E4 WHITE","category"=>"FG KUHL Fans"),
'brise-e4-silver'=>array('productCode'=>"19043S","prodName"=>"KUHL BRISE-E4 SILVER","category"=>"FG KUHL Fans"),

'brise-ew3-wood'=>array('productCode'=>"19042T","prodName"=>"KUHL BRISE-EW3 WOOD","category"=>"FG KUHL Fans"),
'brise-ew3-copper'=>array('productCode'=>"19042C","prodName"=>"KUHL BRISE-EW3 COPPER","category"=>"FG KUHL Fans"),
'brise-ew3-brown'=>array('productCode'=>"19042B","prodName"=>"KUHL BRISE-EW3 BROWN","category"=>"FG KUHL Fans"),
'brise-ew3-white'=>array('productCode'=>"19042W","prodName"=>"KUHL BRISE-EW3 WHITE","category"=>"FG KUHL Fans"),
'brise-ew3-silver'=>array('productCode'=>"19042S","prodName"=>"KUHL BRISE-EW3 SILVER","category"=>"FG KUHL Fans"),

'brise-ew4-wood'=>array('productCode'=>"19044T","prodName"=>"KUHL BRISE-EW4 WOOD","category"=>"FG KUHL Fans"),
'brise-ew4-copper'=>array('productCode'=>"19044C","prodName"=>"KUHL BRISE-EW4 COPPER","category"=>"FG KUHL Fans"),
'brise-ew4-brown'=>array('productCode'=>"19044B","prodName"=>"KUHL BRISE-EW4 BROWN","category"=>"FG KUHL Fans"),
'brise-ew4-white'=>array('productCode'=>"19044W","prodName"=>"KUHL BRISE-EW4 WHITE","category"=>"FG KUHL Fans"),
'brise-ew4-silver'=>array('productCode'=>"19044S","prodName"=>"KUHL BRISE-EW4 SILVER","category"=>"FG KUHL Fans"),

'prima-a-white'=>array('productCode'=>"19000W","prodName"=>"KUHL PRIMA-A WHITE","category"=>"FG KUHL Fans"),
'prima-a-brown'=>array('productCode'=>"19000B","prodName"=>"KUHL PRIMA-A BROWN","category"=>"FG KUHL Fans"),

'prima-a3-white'=>array('productCode'=>"19003W","prodName"=>"KUHL PRIMA-A3 WHITE","category"=>"FG KUHL Fans"),
'prima-a3-brown'=>array('productCode'=>"19003B","prodName"=>"KUHL PRIMA-A3 BROWN","category"=>"FG KUHL Fans"),

'prima-a2-white'=>array('productCode'=>"19002W","prodName"=>"KUHL PRIMA-A2 WHITE","category"=>"FG KUHL Fans"),
'prima-a2-brown'=>array('productCode'=>"19002B","prodName"=>"KUHL PRIMA-A2 BROWN","category"=>"FG KUHL Fans"),

'prima-a1-white'=>array('productCode'=>"19001W","prodName"=>"KUHL PRIMA-A1 WHITE","category"=>"FG KUHL Fans"),
'prima-a1-brown'=>array('productCode'=>"19001B","prodName"=>"KUHL PRIMA-A1 BROWN","category"=>"FG KUHL Fans"),
);

 $messageRs = $messageArrayCod[$index];
//  print_r($messageRs);
// die; 
$return['status'] = 'sucess';
$return['productCode'] = $messageRs['productCode'];
$return['prodName'] = $messageRs['prodName'];
$return['category'] = $messageRs['category'];
$return_arr[] =$return;
echo json_encode($return);

?>