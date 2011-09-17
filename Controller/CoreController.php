<?php

namespace Msi\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CoreController extends Controller
{
  public function indexAction($name)
  {
    if (!$session->has('limit'))
      $session->set('limit', 15);
    return $this->render('MsiCoreBundle:Core:index.html.twig');
  }

  public function setLimitAction()
  {
    $session = $this->get('session');
    $request = $this->get('request')->request;
    
    $session->set('limit', $request->get('limit'));
    return $this->redirect($this->generateUrl('page'));
  }
}
