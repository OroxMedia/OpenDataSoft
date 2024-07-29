<?php

namespace OroxMedia\OpenDataSoft;

use OroxMedia\OpenDataSoft\Builder\OpenDataSoftQuery;

class OpenDataSoft
{
    public function query(string $dataset): OpenDataSoftQuery
    {
        return new OpenDataSoftQuery($dataset);
    }
}
