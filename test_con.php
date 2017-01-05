<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-28
 * Time: 8:23
 */

$serverName = "121.196.233.153,12580";
$connectionInfo = array( "UID"=>"sa","PWD"=>"allroot89739659","Database"=>"ShopElf");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false )
{
    echo "Error in tring to establish conn.</br>";
    die( print_r( sqlsrv_errors(), true));
}

$DateFlag= '1';
$BeginDate ='2016-11-12';
$EndDate ='2016-11-14';
$test = '0';
$params = array(
    array($DateFlag, SQLSRV_PARAM_IN),
    array($BeginDate, SQLSRV_PARAM_IN),
    array($EndDate, SQLSRV_PARAM_IN),
    array($test,SQLSRV_PARAM_IN)
);

$tsql_callSP = "{call zz_FinancialProfit(?,?,?,?)}";

$stmt3 = sqlsrv_query( $conn, $tsql_callSP,$params);
if( $stmt3 === false )
{
    echo "Error in executing statement 3.</br>";
    die( print_r( sqlsrv_errors()));
}
//while( $row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)){//返回结果集
//
//    $row['wlway'] = iconv('GBK', 'UTF-8', $row['wlway']);
//    $row['wlCompany'] = iconv('GBK', 'UTF-8', $row['wlCompany']);
//    dump($row);die;
//
//}
sqlsrv_close( $conn);