<!-- Have the function noIterate(strArr) take the array of strings stored in strArr, which will contain only two strings, the first parameter being the string N and the second parameter being a string K of some characters, and your goal is to determine the smallest substring of N that contains all the characters in K. For example: if strArr is ["aaabaaddae", "aed"] then the smallest substring of N that contains the characters a, e, and d is "dae" located at the end of the string. So for this example your program should return the string "dae".
Another example: if strArr is ["aabdccdbcacd", "aad"] then the smallest substring of N that contains all of the characters in K is "aabd" which is located at the beginning of the string. Both parameters will be strings ranging in length from 1 to 50 characters and all of K's characters will exist somewhere in the string N. Both strings will only contains lowercase alphabetic characters. -->
<?php
function noIterate($strArr) {
    $N = $strArr[0];
    $K = $strArr[1];

    $minSubstring = '';
    $frequentCharacters = array_count_values(str_split($K));
    $characters = [];
    $left = 0;
    $counter = 0;
    $minLength = PHP_INT_MAX;
    $uniqueCharacters = count($frequentCharacters);

    for ($right = 0; $right < strlen($N); $right++) {
        $char = $N[$right];

        if (isset($frequentCharacters[$char])) {
            $characters[$char] = ($characters[$char] ?? 0) +1;

            if ($characters[$char] ===($frequentCharacters[$char])) {
                $counter++;
            }
        } 
        
        while ($counter === $uniqueCharacters) {
            $currentLength = $right - $left + 1;
    
            if ($currentLength < $minLength) {
                $minLength = $currentLength;
                $minSubstring = substr($N, $left, $currentLength);
            }

            $leftChar = $N[$left];
            if (isset($frequentCharacters[$leftChar])) {
                $characters[$leftChar]--;

                if ($characters[$leftChar] < $frequentCharacters[$leftChar]) {
                    $counter--;
                }
            }

            $left++;
        }    
    }

    return $minSubstring;
}

echo noIterate(["ahffaksfajeeubsne", "jefaa"]);
    
?>