<?php

namespace App\Http\Helpers;

trait RandomCode
{
    public function random_str()
    {
        $alpha = implode(range('a', 'j'));
        $alpha_caps = implode(range('A', 'J'));
        $num = implode(range(0, 9));

        $code = '';
        for ($i = 0; $i <= 1; $i++) {
            $key = random_int(0, 9);
            $code .= $alpha[$key];
        }

        for ($i = 0; $i <= 1; $i++) {
            $key = random_int(0, 9);
            $code .= $alpha_caps[$key];
        }

        for ($i = 0; $i <= 1; $i++) {
            $key = random_int(0, 9);
            $code .= $num[$key];
        }

        return $code;
    }

    public function company_code($name)
    {
        $new_name = explode(" ", $name);
        return 'COM-'.strtolower($new_name[1]).$this->random_str();
    }

}
