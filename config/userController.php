<?php
namespace App\Controller

use App\Entity\User;
use App\Form_UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFounfation\Request;
use Symfony\Component\HttpFounfation\*Response;
use Symfony\Component\routing\Annotation\Route;

#[Route('/user')]
  class UserController extends AbstactController
  {
    #[Route('/', name: 'app_user_index', method: ['GET'], schemes: 'http')]
    public function index(UserRepository $userRepository) : response
    {
      return $this->render('user/index.html.twig', [
                           'users'=> $userRepository->finAll(),
      ]);
    }

    #[Route('/new', name: 'new', method: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
      $user = new User();
      $form = $this -> createForm(UserType::class, $user);
      $form -> handleRequest($request);

      if($form->isSubmited() && $form->isValid()) {
        $userRepository->save($user, true);

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
      }

      return $this->renderForm('user/new.html.twig', [
                               'user' => $user,
                               'form' => $form
      ]);
    }

    #[Route('{/id}', name: 'app_user_show', method: ['GET'])]
    public function show(User $user): Response

    return $this-> render('user/show.html.twig', [
                          'user' => $user,
    ]);

  }
?>