<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Shopify\Clients\Rest;
use Symfony\Component\HttpFoundation\Response;

class CheckProductIdValidRule implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws \Shopify\Exception\MissingArgumentException
     */
    public function passes($attribute, $value): bool
    {
        $client = new Rest(env('SHOP'), env('ACCESS_TOKEN'));
        $res = $client->get(
            "products/$value"
        );
        return $res->getStatusCode() === Response::HTTP_OK;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Sản phẩm không tồn tại!';
    }
}
