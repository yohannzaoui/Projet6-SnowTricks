<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 22:34
 */

namespace App\Tests\FormHandler;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AddTrickHandlerTest extends KernelTestCase
{
    /**
     * @var FileUploader
     */
    private $fileUploader;

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var SluggerInterface
     */
    private $slugger;

    public function setUp()
    {
        
    }
}