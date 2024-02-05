<?php

$config = array(
    'authentication' => function () {
        return true; // Bạn có thể sửa đổi logic xác thực ở đây nếu cần
    },
    'backends' => array(
        array(
            'name' => 'default',
            'adapter' => 'local',
            'baseUrl' => '/ckfinder/userfiles/',
            'root' => '/public/ckfinder/userfiles/',
        ),
    ),
);

return $config;
