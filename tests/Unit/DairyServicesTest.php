<?php

namespace Tests\Unit;

use App\Services\DairyServices;
use Tests\TestCase;

class DairyServicesTest extends TestCase
{
    protected DairyServices $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new DairyServices();
    }

    public function test_farm_name_anagram(): void
    {
        $this->assertTrue($this->service->FarmNamesAreAnagrams('Test Dairy Farm', 'Test Dairy Farm'));
        $this->assertTrue($this->service->FarmNamesAreAnagrams('Dairy Farm', 'Farm Dairy'));
        $this->assertTrue($this->service->FarmNamesAreAnagrams('old England', 'golden land'));
        $this->assertTrue($this->service->FarmNamesAreAnagrams('dormitory','dirty room'));
        $this->assertTrue($this->service->FarmNamesAreAnagrams('', ''));

        $this->assertFalse($this->service->FarmNamesAreAnagrams('Test Dairy Farm', 'Test Dairy Farms'));
        $this->assertFalse($this->service->FarmNamesAreAnagrams('Dairy Farm', 'Farm Dairy Farm'));
        $this->assertFalse($this->service->FarmNamesAreAnagrams('abcde', 'abcdfg'));
    }

    public function test_profit_from_milk(): void
    {
        $this->assertEquals(4, $this->service->ProfitFromMilk([1, 2, 3, 4, 5]));
        $this->assertEquals(0, $this->service->ProfitFromMilk([5, 4, 3, 2, 1]));
        $this->assertEquals(0, $this->service->ProfitFromMilk([1, 1, 1, 1, 1]));
        $this->assertEquals(0, $this->service->ProfitFromMilk([1]));
        $this->assertEquals(0, $this->service->ProfitFromMilk([]));
        $this->assertEquals(9, $this->service->ProfitFromMilk([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]));
        $this->assertEquals(0, $this->service->ProfitFromMilk([10, 9, 8, 7, 6, 5, 4, 3, 2, 1]));
        $this->assertEquals(9, $this->service->ProfitFromMilk([1, 2, 3, 10, 4, 5, 8, 4]));
    }

    public function test_get_cow_data(): void
    {
        $this->assertArrayHasKey('data', $this->service->getCowData());
    }
}
