<?php
class homeController extends Controller {

    public function index() {
        $dados = array();
        $products = new Products();

        $products = $products->getProducts(12);

        if(!empty($products)) {
        	
        	$dados['products'] = $products;

        }

        $this->loadTemplate('home', $dados);
    }

}

