<?php

namespace App\Services;

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
     * Example: 'Dairy Farm' and 'Farm Dairy 2' are not anagrams because they do not contain the same letters.
     *
     * @param string $nameA
     * @param string $nameB
     * @return bool
     */
    public function FarmNamesAreAnagrams(string $nameA, string $nameB): bool
    {
        return false;
    }
}
