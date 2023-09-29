<?php

namespace Framework;

class Helper
{
    static public function requestReplace($search, $replace, $str)
    {
        return trim(str_replace($search, $replace, $str));
    }

    static public function validation($data, $filed): array
    {
        $errors = [];
        foreach ($data as $field => $rules) {
            $rules = explode('|', $rules);
            foreach ($rules as $rule) {
                [$ruleName, $args] = array_pad(explode(':', $rule, 2), 2, null);
                switch ($ruleName) {
                    case 'required':
                        if (empty($filed[$field])) {
                            $errors[$field][] = "The '$field' field is required";
                        }
                        break;
                    case 'email':
                        if (!filter_var($filed[$field], FILTER_VALIDATE_EMAIL)) {
                            $errors[$field][] = "The '$field' field must be a valid email address";
                        }
                        break;
                    case 'password_confirmation':
                        if ($filed[$field] != $filed[$args]) {
                            $errors[$field][] = "Passwords don't match";
                        }
                        break;
                    default:

                        break;
                }
            }
        }

        return $errors;
    }
}