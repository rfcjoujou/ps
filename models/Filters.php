<?php 
class Filters extends Model 
{
	public function getFilters($filters, $category = 0, $especif) {

		$products = new Products();

		$array = array(
			'options' => array(),
			'especif' => array()

			);

		// fILTRO das caracterisiticas.

		$array['options'] = $products->getAvailableOptions($filters, $category, $especif);

		return $array;
	}
}