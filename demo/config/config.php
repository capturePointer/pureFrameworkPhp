<?php
function getConfigs(){
    $configs = array(
        "db" => array(
            "mysqli" =>array(
                "host" => "localhost",
                "port" => 3306,
                "user" => "root",
                "pass" => "root",
                "db" => "demo",
                "charset" => "utf8"
            )
        ),
        'route' => array(
            '' => '',
        ),
    );
    return $configs;
}
global $configs;
$configs = getConfigs();


