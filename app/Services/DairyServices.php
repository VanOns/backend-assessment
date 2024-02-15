<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 *
 * Fix the bugs in this class so that the tests in tests/Unit/DairyServicesTest.php pass.
 *
 * @package App\Services
 */
class DairyServices
{
    /**
     * Return true if the farm names are anagrams.
     * Example: 'Dairy Farm' and 'Farm Dairy' are anagrams because they contain the same letters.
     * Example: 'Dairy Farm' and 'Chicken Farm' are not anagrams because they do not contain the same letters.
     *
     * @param string $nameA
     * @param string $nameB
     * @return bool
     */
    public function FarmNamesAreAnagrams(string $nameA, string $nameB): bool
    {
        return false;
    }

    /**
     * Return the best profit that can be made from buying and selling milk.
     *
     * Find the best day to buy milk and choose a different day in the future to sell it.
     *
     * Example: [1, 2, 3, 4, 5] should return 4 because you can buy milk for $1 and sell it for $5.
     * Example: [5, 4, 3, 2, 1] should return 0 because you cannot make a profit.
     *
     * @param int[] $prices
     * @return int
     */
    public function ProfitFromMilk(array $prices): int
    {
        return 0;
    }

    /**
     * Get cow data from the cow data API.
     *
     * Documentation for the API can be found here: https://assessment.van-ons.nl/
     *
     * @return array
     */
    public function getCowData(): array {
        $response = Http::get('https://assessment.van-ons.nl/api/data');

        if ($response->status() === 200) {
            return $response->json();
        }

        return [];
    }
}
