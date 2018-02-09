<?php

use App\Models\Service;
use Laravel\Lumen\Testing\DatabaseMigrations;

class EntryInsertTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Валидация.
     *
     * @throws Exception
     */
    public function testValidation()
    {
        $this->call('POST', '/');

        $response = json_decode($this->response->getContent(), true);

        $this->assertFalse($response['success']);
        $this->assertArrayHasKey('key', $response['error']);
    }

    /**
     * Запись в БД.
     */
    public function testInsertEntry()
    {
        $service = factory(Service::class)->create();
        $data = [
            'one' => 'One',
            'two' => 'Two',
            'three' => 'Three'
        ];
        $this->call('POST', '/', ['key' => $service->key] + $data);

        $this->assertResponseOk();
        $this->seeInDatabase('entries', ['service_id' => $service->id, 'data' => json_encode($data)]);
    }
}
