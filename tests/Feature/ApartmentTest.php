<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Apartment;


class ApartmentTest extends TestCase
{
    use DatabaseMigrations;

    //Test to CREATE an Aparment
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

    //Test to CREATE, and get all apartments
    public function test_get_all_apartments(){
        $apartment = Apartment::factory()->create();
        $response = $this->get('api/apartment');
        $response->assertSee($apartment->name);
    }

    //Test to GET one apartment
    public function test_get_apartment()
    {        
        //Creates a new instance of an apartment
        $apartment = Apartment::factory()->create();
        
        //Finds that new apartment
        $this->json('GET', 'api/apartment/'. $apartment->ext_id, [], ['Accept' => 'application/json'])
            ->assertStatus(200)
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

    //Test to EDIT the apartment
    public function test_update_apartment()
    {
        //Creates a new instance of an apartment
        $apartment = Apartment::factory()->create();

        //New Data to EDIT the apartment
        $newData = [
            "name" => "EDITED NAME",
            "description" => "EDITED DESCRIPTION",
            "quantity" => "100",
            "active" => "1"            
        ];

        $this->json('PUT', 'api/apartment/' . $apartment->ext_id , $newData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "apartment" => [
                    "name" => "EDITED NAME",
                    "description" => "EDITED DESCRIPTION",
                    "quantity" => "100",
                    "active" => "1",                 
                ],
                "message" => "Updated successfully"
            ]);
    }

    //Test to DELETE the apartment
    public function test_delete_apartment()
    {
        //Creates a new instance of an apartment
        $apartment = Apartment::factory()->create();

        $this->json('DELETE', 'api/apartment/' . $apartment->ext_id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);

    }

}
