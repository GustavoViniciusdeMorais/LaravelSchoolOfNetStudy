<?php

namespace Modules\Pages\Actions;

use Modules\Pages\Models\Page;

class GetPages extends Action
{

    public function execute()
    {
        return Page::paginate(10);
    }
}
