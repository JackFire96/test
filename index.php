<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function foo($tab){
            $result = array();
            $arr = array();
            for($i = 0; $i < count($tab); $i++){
                for($j = 0; $j < count($tab[$i]); $j++){
                    if(isset($tab[$i-1])){
                        if ($tab[$i][$j] <= $tab[$i-1][1] && $tab[$i][$j] >= $tab[$i-1][0]) {
                           unset($tab[$i][$j]);
                        }
                        
                    }
                    sort($tab[$i]);
                }
                    
                for($j = 0; $j < count($tab[$i]); $j++){
                    if(!isset($tab[$i][0]) || !isset($tab[$i][1])){
                        if(isset($tab[$i][0]) && $tab[$i][0] < $tab[$i-1][0]){
                            $tab[$i-1][0] = $tab[$i][0];
                        }
                        else if(isset($tab[$i][0]) && $tab[$i][0] > $tab[$i-1][1]){
                            $tab[$i-1][1] = $tab[$i][0];
                        }
                        else{
                            unset($tab[$i]);
                        }
                        sort($tab[$i]);
                    }
                }
                sort($tab);

            }
            
            echo "<pre>";
            print_r($tab);
            echo "</pre>";
        }
        
    foo([[0, 3], [6, 10]]);
    //foo([[0, 5], [3, 10]]);
    //foo([[0, 5], [2, 4]]);
    //foo([[7, 8], [3, 6], [2, 4]]);
    //foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]);
    
    ?>
</body>
</html>