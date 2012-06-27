<?php

namespace Site\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Site\SiteBundle\Form\SiteType;
use Site\SiteBundle\Entity\Site;

class DefaultController extends Controller {

    public function indexAction() {
        $request = $this->getRequest();
        $form = $this->createForm(new SiteType(), new Site());
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $data = $form->getData();
                $em->merge($data);
                $em->flush();
                $this->get('session')->setFlash('notice', 'Item added successfully.');
                return $this->redirect($this->generateUrl('SiteSiteBundle_homepage'));
            }
        }

        return $this->render('SiteSiteBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
    
    public function displayAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $sites_query = $em->getRepository('SiteSiteBundle:Site')->getSites();
        $paginator = $this->get('ideato.pager');
        $paginator->setMaxPerPage(5);
        $paginator->setPage($this->get('request')->query->get('page', 1));
        $paginator->setQuery($sites_query);
        $paginator->init();
        return $this->render('SiteSiteBundle:Default:list.html.twig', array('paginator' => $paginator));
    }

}
