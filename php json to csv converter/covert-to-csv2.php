<?php

$idsWanted = ['1144', '2033', '1022', '7596'];

$raw_data = file_get_contents('transactions.json');
$decoded_json = json_decode($raw_data, true);

$memoryFile = fopen('php://temp/maxmemory:'. (5*1024*1024), 'r+');

foreach ($decoded_json as $rowN => &$row)
{
    if (in_array(($row['payee']['merchantId']), $idsWanted))  // takes only the merchant id's req. for cashback 
    {
        foreach ($row as $k => $v) // 'flatten' keys
            if (is_array($v)) 
            {
                $row[$k . '_' . array_key_first($v)] = reset($v); 
                unset($row[$k]);
            }
        
        if ($rowN === 0)
            fputcsv($memoryFile, array_keys($row));  // CSV headers
        
        fputcsv($memoryFile, $row);
    }
}

rewind($memoryFile);

file_put_contents('output.csv', stream_get_contents($memoryFile));  

fclose($memoryFile);    
?>
