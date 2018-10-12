<?php

namespace App\Controller;

use App\Entity\Avatar;
use App\Form\ProfilType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProfilController extends AbstractController
{
    /**
     * @Route("/monprofil", name="profil", methods={"GET"})
     */
    public function index(Request $request, ObjectManager $manager)
    {
        
        $form = $this->createForm(ProfilType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $avatar->getFile();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            try {
                $file->move(
                    $this->getParameter('avatarFolder'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            $avatar->setFile($fileName);
            $manager->persist($avatar);
            $manager->flush();
        }

        return $this->render('profil/index.html.twig', [
            'title' => 'Gestion de mon profil',
            'form' => $form->createView()
        ]);
    }

    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    
}