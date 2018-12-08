<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 20:19
 */

namespace App\Tests\Controller;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class DeleteTrickControllerFunctionalTest
 * @package App\Tests\Controller
 */
class DeleteTrickControllerFunctionalTest extends WebTestCase
{
    /**
     * @var null
     */
    private $client = null;

    /**
     *
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     *
     */
    public function testDeleteTrickConfirmePageIsFound()
    {
        $this->client->request('GET', '/confirmeDeleteTrick/{id}');

/*        $trick = $this->createMock(Trick::class);
        $trick
            ->method('getDefaultImage')
            ->willReturn('getUrl');*/

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }
}