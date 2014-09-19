<?php
	namespace Afpa\artistBundle\Twig\Extension;
	
	class MyExtension extends \Twig_Extension{
		public function getFilters(){
			return array(
				'boostPop'=> new \Twig_Filter_Method($this, 'doBoostPop')
			);
		}
		public function doBoostPop($value){
			if ($value <= 90)
				$value = $value+10;
			return $value;
		}
		public function getName(){
			return 'boost_extension';
		}
	}
?>