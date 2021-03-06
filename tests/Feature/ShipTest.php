<?php

namespace Tests\Feature;

use App\Models\Armament;
use App\Models\Ship;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ShipTest extends TestCase
{
    use DatabaseTransactions, DatabaseMigrations, WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     *
     * @test
     */
    public function itCreatesANewShip()
    {
        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/ships', [
            'name' => 'Test Ship',
            'status' => 'test status',
            'class' => 'test class',
            'crew' => 10,
            'image' => 'test image',
            'value' => 100
        ]);
        $ships = Ship::all();
        $response->assertJson(["success"=>true]);
        $response->assertStatus(200);
        $this->assertEquals(1, $ships->count());
    }

    /**
     * If the request does not validate
     *
     * @test
     */
    public function itGetsA422ValidationError()
    {
        $response = $this->postJson('/api/ships', [
            'bar'=>'fo'
        ]);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function itUpdatesAResource()
    {
        $this->withoutExceptionHandling();
        Ship::factory(10)->create();
        Armament::factory(10)->create();

        $response = $this->patchJson('/api/ships/3', [
            'name' => 'Test Ship',
            'status' => 'test status',
            'class' => 'test class',
            'crew' => 10,
            'image' => 'test image',
            'value' => 100,
            'armaments' => [1,2,3]
        ]);
        $response->assertStatus(200);

        $thirdShip = Ship::with('armaments')->find(3);

        $this->assertEquals($thirdShip->name, 'Test Ship');

        $this->assertEquals($thirdShip->armaments->count(), 3);
    }

    /**
     * Asserts that the ship is successfully deleted
     *
     * @test
     */
    public function itDeletesAShip()
    {
        $this->withoutExceptionHandling();

        Ship::factory(10)->create();

        $response = $this->deleteJson('/api/ships/3');

        $response->assertStatus(200);

        $thirdShip = Ship::with('armaments')->find(3);
        $this->assertEquals(9 , Ship::all()->count());
        $this->assertNull($thirdShip);
    }
}
