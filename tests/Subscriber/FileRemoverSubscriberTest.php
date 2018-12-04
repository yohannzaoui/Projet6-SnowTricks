<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 22:14
 */

namespace App\Tests\Subscriber;


use PHPUnit\Framework\TestCase;

/**
 * Class FileRemoverSubscriberTest
 * @package App\Tests\Subscriber
 */
class FileRemoverSubscriberTest extends TestCase
{
    /**
     *
     */
    public function testGetSubscribedEvents()
    {
        $result = 'onFileRemoverDefaultImage';
        static::assertSame($result, 'onFileRemoverDefaultImage');
    }
}