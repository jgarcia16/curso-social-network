<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\User;

class UserController extends Controller
{   
    public function loginAction(Request $request){
        return $this->render('AppBundle:User:login.html.twig', array(
            "titulo"=>"Usuarios"
        ));
       
    }
    
    public function registerAction(Request $request){
       
        $user= new User();
        $form= $this->createForm(\AppBundle\Form\RegisterType::class,$user);
           $form->handleRequest($request);
           if($form->isSubmitted()){
               if($form->isValid()){
                   $em=$this->getDoctrine()->getManager();
                   $user_repo=$em->getRepository("BackendBundle:User");
                   
                   $query=$em->createQuery('SELECT u FROM BackendBundle:User u WHERE u.email= :email OR u.nick= :nick')
                            ->setParameter('email',$form->get("email")->getData())
                            ->setParameter('nick',$form->get("nick")->getData());
                   
                   $user_isset=$query->getResult();
                   
                        if(count($user_isset)==0){
                            $factory=$this->get("security.encoder_factory");
                            $encoder=$factory->getEncoder($user);
                            
                            $password=$encoder->encodePassword($form->get("password")->getData(), $user->getSalt());
                            $user->setPassword($password);
                            $user->setRole("ROLE_USER");
                            $user->setImage(null);
                            
                            /*almacena el dato en Doctrine a modo de objeto */
                            $em->persist($user);
                            /* guarda todos los datos de Doctrine en la base de datos */
                            $flush=$em->flush();
                            
                            if($flush==null){
                                $status="Te has registrado correctamente";
                                
                                return $this->redirect("login");
                            }else{
                                
                            }   $status="fallo al registrarse";
                            
                        }else{
                            $status="El usuario ya existe";
                        }
                   }
                   var_dump($status);
                   die();
               }
           
          return $this->render('AppBundle:User:register.html.twig', array(
            "form"=>$form->createView()
        ));
       
       }  
 }


