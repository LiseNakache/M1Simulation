<?php

namespace miageSimulation\AdminBundle\Controller;

use miageSimulation\AdminBundle\Entity\Course;
use miageSimulation\AdminBundle\Entity\Subject;
use miageSimulation\AdminBundle\Form\CourseType;
use miageSimulation\AdminBundle\Form\CourseEditType;
use miageSimulation\AdminBundle\Form\SubjectType;
use miageSimulation\AdminBundle\Form\SubjectEditType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $subjectslist = $em->getRepository('miageSimulationAdminBundle:Subject')->findAll();
        $courseslist = $em->getRepository('miageSimulationAdminBundle:Course')->findAll();
        return $this->render("@miageSimulationAdmin/Admin/index.html.twig",
            array('subjectslist' => $subjectslist, 'courseslist' => $courseslist));
    }

    public function addCourseAction(Request $request)
    {
        $course = new Course();
        $form   = $this->get('form.factory')->create(CourseType::class, $course);

          if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($course);
          $em->flush();

    //      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

//          return $this->redirectToRoute('miage_simulation_admin_homepage', array(
//              'id' => $course->getId()));
          }

        return $this->render("@miageSimulationAdmin/Admin/addCourse.html.twig", array(
            'form' => $form->createView(),
        ));
    }

    public function addSubjectAction(Request $request)
    {
        $subject = new Subject();
        $form   = $this->get('form.factory')->create(SubjectType::class, $subject);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subject);
            $em->flush();

//      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

//            return $this->redirectToRoute('miage_simulation_admin_homepage', array('id' => $subject->getId()));
        }

        return $this->render("@miageSimulationAdmin/Admin/addSubject.html.twig", array(
            'form' => $form->createView(),
        ));
    }

    public function editCourseAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('miageSimulationAdminBundle:Course')->find($id);

        if (null === $course) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(CourseEditType::class, $course);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
//            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
////            return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));
        }
        return $this->render("@miageSimulationAdmin/Admin/editCourse.html.twig", array(
//            'course' => $course,
            'form'   => $form->createView(),
        ));
    }


    public function editSubjectAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('miageSimulationAdminBundle:Subject')->find($id);

        if (null === $subject) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }

        $form = $this->get('form.factory')->create(SubjectEditType::class, $subject);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
//            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
////            return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));
        }
        return $this->render("@miageSimulationAdmin/Admin/editSubject.html.twig", array(
            'form'   => $form->createView(),
        ));
    }


    public function deleteCourseAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('miageSimulationAdminBundle:Course')->find($id);
        if (null === $course) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
//        $form = $this->get('form.factory')->create();

//        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->remove($course);
            $em->flush();
//            $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");
//            return $this->redirectToRoute('oc_platform_home');
//        }

        return $this->redirectToRoute('miage_simulation_admin_homepage');
    }


    public function deleteSubjectAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('miageSimulationAdminBundle:Subject')->find($id);
        if (null === $subject) {
            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
        }
        // On crée un formulaire vide, qui ne contiendra que le champ CSRF
        // Cela permet de protéger la suppression d'annonce contre cette faille
//        $form = $this->get('form.factory')->create();

//        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
        $em->remove($subject);
        $em->flush();
//            $request->getSession()->getFlashBag()->add('info', "L'annonce a bien été supprimée.");
//            return $this->redirectToRoute('oc_platform_home');
//        }

        return $this->redirectToRoute('miage_simulation_admin_homepage');
    }

}
