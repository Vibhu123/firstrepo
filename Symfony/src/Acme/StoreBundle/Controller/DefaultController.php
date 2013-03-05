<?php

namespace Acme\StoreBundle\Entity\Prod;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function createAction(){
        
$prod=new Prod();

$prod->setName('First Product');

$prod->setPrice('25');

$prod->setDescription('The first product of the database');

$em=$this->getDoctrine()->getManager();

$em->persist($prod);

$em->flush();

return new Response('Created product id of first product'.$prod->getId());

} 
public function showAction($id){
    
$prod=$this->getDoctrine()->getRepository('AcmeStoreBundle:Prod')->find($id);

if(!$prod){
    
throw $this->createNotFoundException('No product found for id'.$id);

}
}
    public function indexAction($name)
    {
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
?>
