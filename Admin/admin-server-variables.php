    <?php
    foreach($_SERVER as $k => $v){
        print_r($k . ' - ');
        if(!is_array($v)){
            print_r($v);
        }
        echo '<pre>';
    }
    ?>
