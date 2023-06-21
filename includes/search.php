<?php

    session_start();
    include "conn.php";
    $search1 = $_GET['search'];
    
    $search = explode(',', $search1);
    
    foreach($search as $v){
    
        $ch = curl_init();
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol='.$v;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        
        
        $headers = array();
        $headers[] = 'X-Cmc_pro_api_key: 27ab17d1-215f-49e5-9ca4-afd48810c149';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $result = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        
        $json = json_decode($result, TRUE);
        $value = [];
        foreach($json['data'][$v]['quote'] as $value){
            $coin_price = $value['price'];
        }
?>

            <div class="col-md-4 mb-2">
                <div class="card shadow w-100">
                    <div class="card-header c-header">
                        <h3><?php echo $json['data'][$v]['name']; ?> (<?php echo $v; ?>)</h3>
                    </div>
                    <div class="card-body">
                        <div class="row data">
                            <div class="col-8">
                                <span>Price</span><br>
                                <h6><b>$ <?php echo $coin_price; ?></b></h6>
                            </div>
                            <div class="col-4">
                                <span>Rank</span><br>
                                <h6><b><?php echo $json['data'][$v]['cmc_rank']; ?></b></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php
    }
?>