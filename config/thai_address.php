<?php

return [
    'uuid' => false,
    'generate_uuid_pgsql_mode' => false,

    'models' => [
        'sub_district' => TopKSTT\ThaiAddress\Models\SubDistrict::class,
        'district' => TopKSTT\ThaiAddress\Models\District::class,
        'province' => TopKSTT\ThaiAddress\Models\Province::class,
        'postal_code' => TopKSTT\ThaiAddress\Models\PostalCode::class,
    ],

    'table_names' => [
        'sub_district' => 'sub_districts',
        'district' => 'districts',
        'province' => 'provinces',
        'postal_code' => 'postal_codes',
    ],

    'api' => [
        'enabled' => false,
        'prefix_routes' => '/thai-address/',
    ],
];
