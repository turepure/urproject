<?php
$serverName = "121.196.233.153,12580";
$connectionInfo = array("UID"=>"sa","PWD"=>"allroot89739659","Database"=>"ShopElf");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$sql = " exec ww_test_finacial @DateFlag=?,@BeginDate=?,@EndDate=?,@Flag=?,@RateFlag=?";
if( $conn ){
    echo "Connection established.\n";
}
else{
    echo "Connection could not be established.\n";
}
$DateFlag= '1';
$BeginDate ='2016-11-12';
$EndDate ='2016-11-12';
$Flag = 0;
$RateFlag=0;
$params = array(
    array('1',SQLSRV_PARAM_IN),
    array('2016-12-25', SQLSRV_PARAM_IN),
    array('2016-12-25', SQLSRV_PARAM_IN),
    array(&$Flag,SQLSRV_PARAM_IN),
    array(&$RateFlag,SQLSRV_PARAM_IN)

);
$stmt = sqlsrv_prepare($conn, $sql,$params);
$result = sqlsrv_execute($stmt);
if($result){
    print  'it works!';
    while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){//返回结果集

   echo  $row['Suffix'].'\\n';

}
}
else{
    print "wrong!";
}
sqlsrv_close( $conn);

