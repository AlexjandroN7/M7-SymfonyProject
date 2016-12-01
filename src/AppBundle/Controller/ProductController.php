<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 2016-11-25
 * Time: 15:53
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{

    /**
     *@Route (path="/", name="app_product_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function indexAction()
    {

        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');

    /* crear un producto
        $p = new Product();

        $p->setName('Marc 8.0')
          ->setDescription('Quieres al maestro de one piece, aqui esta!')
          ->setPrice('200')
    ;
        $m->persist($p);
        $m->flush();


     encontrar producto, modificarlo, y eliminarlo
        $p = $repo->find(1);
        $p2 = $repo->findOneBy([

            'name'  =>  'Sabuco 8.0']);
        $p->setPrice('800');
        $p->setDescription('Quieres boost en clash royale este es tu producto, aprovecha la oferta!');
        $m->remove($p2);
        $m->flush();
        $products = $repo->findAll();
        return $this->render(':product:index.html.twig',

            [
                'productos'  => $products,
                'product'    => $p,

            ]);
    */
        $m->flush();
        $products = $repo->findAll();
        return $this->render(':product:index.html.twig',
        [
            'productos' => $products,

        ]);
    }

    /**
     * @Route (path="/add",
     * name="app_product_add")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function añadirAction()
    {

        return $this->render(':product:add.html.twig');
    }

    /**
     * @Route (path="/doadd",
     *      name="app_product_doAdd")
     *
     *
     */

    public function doAñadirAction(Request $request)
    {

        $product = new Product();

        $product->setName($request->request->get('name'));
        $product->setDescription($request->request->get('desc'));
        $product->setPrice($request->request->get('price'));

        $m = $this->getDoctrine()->getManager();
        $m->persist($product);
        $m->flush();

        $this->addFlash('messages','product created');

        return $this->redirectToRoute('app_product_index');
    }

    /**
     * @Route (
     *     path="/update/{id}",
     *     name="app_product_update"
     * )
     */

    public function updateAction($id){

        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');

        $prod = $repo->find($id);

        return $this->render(':product:update.html.twig',
        [
            'prod' =>  $prod,
        ]);
    }

    /**
     * @Route (
     *     path="/doUpdate",
     *     name="app_product_doUpdate")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function doUpdateAction(Request $request)
    {
        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');

        $id = $request->request->get('id');
        $name = $request->request->get('name');
        $desc = $request->request->get('desc');
        $price = $request->request->get('price');

        $prod = $repo->find($id);

        $prod->setName($name);
        $prod->setDescription($desc);
        $prod->setPrice($price);

        $m->flush();
        $this->addFlash('messages', 'Product Updated');

        return $this->redirectToRoute('app_product_index');

    }

    /**
     * @Route (
     *     path="/remove/{id}",
     *     name="app_product_remove"
     * )
     */
    public function removeAction($id)
    {
        $m = $this->getDoctrine()->getManager();
        $repo = $m->getRepository('AppBundle:Product');

        $prod = $repo->find($id);
        $m->remove($prod);
        $m->flush();

        $this->addFlash('messages', 'User Deleted');

        return $this->redirectToRoute('app_product_index');
    }
}