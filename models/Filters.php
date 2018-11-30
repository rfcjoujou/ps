<?php 
class Filters extends Model 
{
	public function getFilters($filters, $especif) {




		if(!empty($filters['options']['options'])) {

			$filters['options'] = $filters['options']['options'];
		} 
			



		$products = new Products();

		$array = array(
			'options' => array(),
			'especif' => array()


			);
		

		// fILTRO das caracterisiticas.




		$array['options'] = $products->getAvailableOptions($filters, $especif);

		return $array;
	}
}