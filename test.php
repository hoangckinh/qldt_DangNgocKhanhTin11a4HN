<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function GetNB($arrayGet){
            $newArray=[];
            $j= 1;
            foreach($arrayGet as $value)
            {
                if($value % 2 == 1){
                    $newArray[$j]=$value;
                    $j++;
                }
            }
            
            return $newArray;
        }
        $arr = array(1,3,4,5,99,34,54,76,3,2,7,3,765,4312,12,11);
        $numbers = GetNB($arr);
        var_dump($numbers);
        
    ?>
    <p>© <?php echo date('Y'); ?></p>
</body>
</html>
