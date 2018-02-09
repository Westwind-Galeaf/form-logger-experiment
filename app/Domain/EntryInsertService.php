<?php

namespace App\Domain;

use App\Models\Entry;
use App\Models\Service;
use Illuminate\Http\Request;

class EntryInsertService
{
    /**
     * Выподнение процедуры.
     *
     * @param Request $request
     * @return Entry
     */
    public function process(Request $request)
    {
        return $this->makeEntry(
            $this->findServiceByKey($request->only('key')),
            $request->except('key')
        );
    }

    /**
     * @param array $conditions
     * @return mixed
     */
    public function findServiceByKey(array $conditions)
    {
        return Service::where($conditions)->first();
    }

    /**
     * @param $service
     * @param $data
     * @return Entry
     */
    public function makeEntry($service, $data)
    {
        return Entry::create([
            'service_id' => $service->id,
            'data' => json_encode($data),
        ]);
    }
}
