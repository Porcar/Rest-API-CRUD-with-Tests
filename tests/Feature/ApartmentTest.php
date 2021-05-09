<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Apartment;
use App\Models\ApartmentCategory;

class ApartmentTest extends TestCase
{
    use DatabaseMigrations;
    public function test_create_apartment()
    {        
        $apartmentData = [
            "name" => "Name",
            "description" => "Apartment Description",
            "quantity" => "5",
            "active" => "1"
        ];

        $this->json('POST', 'api/apartment', $apartmentData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "apartment" => [
                    'id',
                    'ext_id',
                    'description',
                    'quantity',
                    'active',
                    'created_at',
                    'updated_at',                  
                ],
                "message"
            ]);
    }

}
