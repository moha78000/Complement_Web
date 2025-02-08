<?php

$JSON_file = 'data.json';

$read = json_decode(file_get_contents($JSON_file),true);


foreach ($read as $value){
    print_r($value);
}

