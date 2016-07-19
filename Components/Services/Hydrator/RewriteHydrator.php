<?php

namespace B3nnu3SeoRewrites\Components\Services\Hydrator;

use B3nnu3SeoRewrites\Components\Struct\Rewrite;

class RewriteHydrator
{
    public function hydrateRow(array $row)
    {
        return new Rewrite(
            $row['from_url'],
            $row['to_url'],
            $row['position'],
            $row['type']
        );
    }
}
