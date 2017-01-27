<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
  /**
   * Symfony homepage
   *
   * @Route("/", name="homepage")
   * @return \Symfony\Component\HttpFoundation\Response
   */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => 'toto',
        ]);
    }

  /**
   * @Route(
   *      "/hello/{name}",
   *      defaults={"name"="world"},
   *      requirements={"name"="[A-Z][a-z]+"}
   * )
   * @Method("GET")
   * @Cache(expires="+2days")
   * @Template()
   * @param $name
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return array|\Symfony\Component\HttpFoundation\Response
   * @throws \Exception
   */
    public function helloAction($name, Request $request)
    {
        $request->getSession()->get('sessiondata');
        $request->getPreferredLanguage(['fr', 'en']);

        switch ($name) {
            case 'Oups':
                throw new \Exception();
            case 'Notfound':
                throw $this->createNotFoundException('Pas de chocolat!');
            case 'Redirect':
                return $this->redirectToRoute(
                    'app_default_hello',
                    ['name' => 'world'],
                    Response::HTTP_SEE_OTHER
                );
            case 'Forward':
                return $this->forward(
                    'AppBundle:Default:hello',
                    ['name' => 'sub-request']
                );
        }


        $this->forward('AppBundle:Default:index', ['request'=> new Request()]);

        $this->addFlash('user_info', 'merci de votre ...');
        $logger = $this->get('logger');
        $logger->info('message d info');

        $response = new Response();
        $response->setContent('ma page html')
                ->setStatusCode(201)
                ->headers->set('Content-type', 'text/plain');
        $response->headers->addCacheControlDirective('must-revalidate', true);
        $response->headers->addCacheControlDirective('s-maxage', 30);
        $response->setMaxAge(60);
        $response->setPublic();
        $response->setExpires(new \DateTime('tomorrow'));
/*
        $response->setLastModified($article->getLastModified());
        $response->setEtag(md5($article->getBody()));

        $subResponse = $this->forward('BlogBundle:Post:show', ['slug' => 'sdfgskdh hff']);
*/
        if ($response->isNotModified($request)) {
            return $response;
        }

        return ['name'=>$name];
    }

  /**
   * @Route("/setLocale/{_locale}")
   *
   * Action that define user locale
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   */
    public function setLocaleAction(Request $request)
    {
        $request->getSession()->set('_locale', $request->getLocale());
        return $this->redirectToRoute('homepage');
    }
}
