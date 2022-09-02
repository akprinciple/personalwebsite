<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<link rel="shortcut icon" type="image/jpg" href="images/
<?php 
$sql = "SELECT text from profile WHERE id = 4";
$query = mysqli_query($connect, $sql);
while ($show = mysqli_fetch_array($query))
echo $show['text'];
 ?>
">
     <link rel="stylesheet" type="text/css" href="font/all.min.css">
     
  
        
           <?php 
        
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
            
    if (isset($ip)) {
            $date = date('d/M/Y');

             $sql  = "SELECT * FROM visitors WHERE date = '{$date}'";
             $query = mysqli_query($connect, $sql);
             $count = mysqli_num_rows($query);
             if ($count == 0) {
            $ins = "INSERT INTO visitors (ip, date) VALUES ('1', '$date')";
            $i_query = mysqli_query($connect, $ins);
             }
             else{
                $s_sql = "SELECT * FROM visitors WHERE date = '{$date}'";
                $s_query = mysqli_query($connect, $s_sql);
                while ($p = mysqli_fetch_array($s_query)) {
                    $plus = $p['ip'] + 1;
                    $ins = "UPDATE visitors SET ip = '{$plus}' WHERE date = '{$date}'";
                    $i_query = mysqli_query($connect, $ins);
                }
              
             }

            } 
            if (isset($ip)) {

                      $select = "SELECT * FROM comers WHERE address = '{$ip}'";
                      $sel_query = mysqli_query($connect, $select);
                      $counter = mysqli_num_rows($sel_query);
                      if ($counter == 0) {
                        $a_sql = "INSERT INTO comers(address, times, date) VALUES ('$ip', '1', '$date')";
                        $a_query = mysqli_query($connect, $a_sql);
                      }
                      else{
                       $a_sql = "SELECT * FROM comers WHERE address = '{$ip}'";
                $a_query = mysqli_query($connect, $a_sql);
                while ($r = mysqli_fetch_array($a_query)) {
                    $add = $r['times'] + 1;
                    $update = "UPDATE comers SET times = '{$add}',date = '{$date}' WHERE address = '{$ip}'";
                    $up_query = mysqli_query($connect, $update);
                      }
                   }
                   }       

            #$c_ins = "INSERT INTO visitors (address, page, time, date) VALUES ('$ip', '$script', '$time', '$date')";
           # $set = mysqli_query($connect, $c_ins);
     ?>

