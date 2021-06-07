<?php

use Blibli\SellerApi\client\BlibliSellerBasicAuthClient;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertInstanceOf;

class BlibliSellerBasicAuthTest extends TestCase
{
    /**
     * Test InstanceOf Class BlibliSellerBasicAuthClient
     * @author Ravi Mukti <shinjiravi@gmail.com>
     * @created 31-May-2021
     * @return void
     */
    public function test_class_blibli_seller_basic_auth_and_return_instance_of_itself()
    {
        $client = new BlibliSellerBasicAuthClient();

        assertInstanceOf(BlibliSellerBasicAuthClient::class, $client);
    }
}