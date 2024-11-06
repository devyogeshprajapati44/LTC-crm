<?php
function EDV($Value,$type)
{
    if($type==1)
    {
        $encodedEmployeeID = base64_encode($Value);

        return $encodedEmployeeID;
    }
    if($type==2)
    {
        $decodedEmployeeID = base64_decode($Value);
        return $decodedEmployeeID;
    }
}
?>

