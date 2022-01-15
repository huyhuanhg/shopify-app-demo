<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Shopify\Clients\Rest;
use Shopify\Exception\MissingArgumentException;
use Symfony\Component\HttpFoundation\Response;

class ShopifyApiModel extends Model
{

    //TODO
    protected $id;

    protected $methodList = [
        'get',
        'post',
        'put',
        'delete'
    ];

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        //        if (in_array())
        $called = get_called_class();
        $class = new $called();
        return $class->$method(...$parameters);
        //        return (new static)->$method(...$parameters);

        //        return parent::$method;
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->$method(...$parameters);
    }


    /**
     * @param $id
     * @return void
     * @throws MissingArgumentException
     */
    protected function find($id)
    {
        return $this->callShopifyApi('get', $id);
        //        return $this->newInstance($res, true);
    }

    protected function findOrFail($id)
    {
        return $this->callShopifyApi('get', $id);
    }

    protected function insert($data)
    {
        return $this->callShopifyApi('post', null, $data);
    }

    public function update(array $attributes = [], array $options = [])
    {
        return $this->callShopifyApi('put', null, $attributes);
    }

    public static function destroy($id)
    {
        return (new static)->callShopifyApi('delete', $id);
    }

    /**
     * @param $method
     * @param null $id
     * @param null $data
     * @param array $params
     * @return void
     * @throws MissingArgumentException
     */
    protected function callShopifyApi(string $method = 'get', $id = null, $data = null, array $params = [])
    {
        $method = strtolower($method);
        if (!in_array($method, $this->methodList)) {
            return;
        }

        array_walk($params, function (&$paramValue, $paramKey) {
            $paramValue = "$paramKey=$paramValue";
        });
        $query = implode('&', $params);

        $path = "$this->table/$id";
        $client = new Rest(env('SHOP'), env('ACCESS_TOKEN'));
        $response = ($method === 'get' || $method === 'delete') ? $client->$method($path) : $client->$method($path, $data);
        if ($response->getStatusCode() === Response::HTTP_OK) {
            return json_decode($response->getBody(), true);
        }
    }
}
