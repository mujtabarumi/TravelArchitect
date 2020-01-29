<?php

namespace App\Enums;


interface PackageStatus
{
    const DRAFT = 1;
    const PUBLISHED = 2;
    const ARCHIVED = 3;
    const DELETED = 4;
    const REPUBLISHED = 10;
}
