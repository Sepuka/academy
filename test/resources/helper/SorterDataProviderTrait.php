<?php

namespace sepuka\academy\test\resources\helper;

trait SorterDataProviderTrait
{
    public function sorterDataProvider(): array
    {
        return [
            [[1,2,3,4,5,6,7,8,9], [1,2,3,4,5,6,7,8,9]],
            [[9,8,7,6,5,4,3,2,1], [1,2,3,4,5,6,7,8,9]],
            [[9,7,5,3,1], [1,3,5,7,9]],
        ];
    }
}
