<?php

namespace Msi\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CoreController extends Controller
{
  public function indexAction($name)
  {
    if (!$session->has('limit'))
      $session->set('limit', 15);
    return $this->render('MsiCoreBundle:Core:index.html.twig');
  }

  public function setLimitAction($return_route)
  {
    $session = $this->get('session');
    $request = $this->get('request')->request;
    
    $session->set('limit', $request->get('limit'));
    return $this->redirect($this->generateUrl($return_route));
  }

  public function setFiltersAction($return_route)
  {
    $session = $this->get('session');
    $request = $this->get('request')->request;

    $session->set('filters', $request->get('filters'));
    return $this->redirect($this->generateUrl($return_route));
  }

  public function resetFiltersAction($return_route)
  {
    $session = $this->get('session');

    $session->set('filters', array());
    return $this->redirect($this->generateUrl($return_route));
  }
}
