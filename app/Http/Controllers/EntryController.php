<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\EntryInsertService;

class EntryController
{
    public function insert(Request $request)
    {
        (new EntryInsertService())->process($request);

        return ['success' => true, 'result' => 'Запись успешно добавлена'];
    }
}
