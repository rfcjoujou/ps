<?php
class homeController extends Controller {

    public function index() {
        $store = new Store();
        $products = new Products();
        $products = new Products();
        $f = new Filters();
        $dados = $store->getTemplateData();
        $products = $products->getProducts(12);
        

        if(!empty($products)) {
        	
        	$dados['products'] = $products;



        }



        $this->loadTemplate('home', $dados);
    }


}

