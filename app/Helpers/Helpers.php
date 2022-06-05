<?php

if (!function_exists('getSexUser')) {
    function getSexUserText($gender)
    {
        $genders = [
            'maple',
            'female',
            'other',
        ];

        for($i = 0; $i < count($genders); $i++) {
           if ($genders[$i] == $gender) {
               $checked = 'checked';
           } else {
                $checked = '';
           }

            $render = '<label class="Radio__StyledRadio-sc-1tpsfw1-0 eQckrx">
                <input type="radio" name="gender" value="'. $genders[$i] .'"'. $checked .'>
                <span class="radio-fake"> </span>
                <span class="label">' . 
                    $genders[$i] . '
                </span>
            </label>';

            echo $render;
        }
    }
}
