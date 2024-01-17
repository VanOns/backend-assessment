<?php

namespace Tests\Unit;

use App\Services\DairyServices;
use PHPUnit\Framework\TestCase;

class DairyServicesTest extends TestCase
{
    protected DairyServices $service;

    protected function setUp(): void
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
        $this->assertFalse($this->service->FarmNamesAreAnagrams('abcde', 'abcdf'));
    }
}
