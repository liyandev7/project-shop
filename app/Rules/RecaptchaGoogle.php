<?php

namespace App\Rules;


use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class RecaptchaGoogle implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $client = new Client();
            $response = $client->request('POST' , 'https://www.google.com/recaptcha/api/siteverify' ,
                [
                    'form_params' => [
                        'secret' => env('GOOGLE_RECAPCHA_SECRET'),
                        'response' => $value,
                        'remoteip' => request()->ip()
                    ]
                ]);

            $response = json_decode($response->getBody());

            return $response->success;
        } catch (\Exception $e){
            // TODO Log an Error
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
