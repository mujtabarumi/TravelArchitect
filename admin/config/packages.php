<?php

return [
    "tabRoutes" => [
        \App\Enums\PackageStatus::PUBLISHED => 'published',
        \App\Enums\PackageStatus::DRAFT => 'draft',
        \App\Enums\PackageStatus::ARCHIVED => 'archived',
        \App\Enums\PackageStatus::EXPIRED => 'expired',
    ],
    'listing' => [
        'tabs' => [
            \App\Enums\PackageStatus::PUBLISHED => [
                'title' => 'Published Package',
                'view' => 'package._listing_tab_published',
            ],
            \App\Enums\PackageStatus::DRAFT => [
                'title' => 'Draft Package',
                'view' => 'package._listing_tab_draft'
            ],
            \App\Enums\PackageStatus::ARCHIVED => [
                'title' => 'Archived Package',
                'view' => 'package._listing_tab_archived'
            ],
            \App\Enums\PackageStatus::EXPIRED => [
                'title' => 'Expired Package',
                'view' => 'package._listing_tab_expired'
            ],
        ]
    ]
];
