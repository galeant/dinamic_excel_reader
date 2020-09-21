<?php

return [

    // sub set idetifier of sheet
    // main: main data is using
    // addtion: sub data using, define name and start and end of coll
    'default' => [
        [
            'header_row' => 1,
            'attribute_col' => NULL,
            'data_start' => 2,
            'col_range' => ['A', 'ZZZ']
        ],
        // [
        //     'header_row' => 1,
        //     'attribute_col' => NULL,
        //     'data_start' => 2,
        //     'col_range' => ['J', 'K']
        // ],
    ],
    'finance' => [
        'summary' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'E']
            ],
        ],
        'revenue' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'hpp' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'opex' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'laba_rugi' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'neraca' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'cash_flow' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'rasio' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'capex' => [
            [
                'header_row' => 1,
                'attribute_col' => 'A',
                'data_start' => 2,
                'col_range' => ['B', 'H']
            ],
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['J', 'K']
            ]
        ],
        'isu_strategis' => [
            [
                'header_row' => 1,
                'attribute_col' => NULL,
                'data_start' => 2,
                'col_range' => ['A', 'B']
            ]
        ]
    ]
];
