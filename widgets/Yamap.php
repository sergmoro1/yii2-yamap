<?php
/**
* @author sergmoro1@ya.ru
* @license MIT
*
* Yandex map extension for Yii
* Multiple points for area and multiple areas.
*
* Two type of parameters:
* 1. One area. Set only points and params (has defaults)
* 2. Many areas. Set all areas
* 	$areas = array(
* 		'map_canvas_name1' => ['points' => [], 'params' => []],
* 		'map_canvas_name2' => [],
* 	);
* 
* Where: 
* $points = [ 
* 	[
*   	lat,lng - point coords
*   	icon, header, body, footer - balloon options
*   	color - place mark color, number[0..12]
* 	],
* ];
* Define if needed but it has defaults
* $params = [
*   width, height - map sizes in px
*   visible - should be a map displayed directly or on request
*   zoom - map scale
* ];
*/

namespace sergmoro1\yamap\widgets;

use Yii;
use yii\base\Widget;
use yii\web\View;
use yii\helpers\Url;
use yii\base\NotSupportedException;

class Yamap extends Widget
{
	public $points = [];
	public $areas = [];
	public $params = ['visible' => 0,'zoom' => 13,'width' => '420px','height' => '210px'];

	public function init()
	{
        parent::init();

		if(count($this->areas) == 0)
			$this->areas['map_canvas'] = ['points' => $this->points, 'params' => $this->params];
		
		foreach($this->areas as $area)
		{
			if(!isset($area['params']))
				$area['params'] = $this->params;
			if(count($area['points']) == 0)
				$area['params']['visible']=0;
		}

		$script = 'yaMapAreas=' . json_encode($this->areas) . ';';
		$this->view->registerJs($script, View::POS_READY, 'yamap');
		$this->view->registerJsFile('https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU');
		
		// assets 
		YamapAsset::register($this->view);
	}
	
    public function run()
    {
		if(count($this->areas) == 1)
			return $this->render('yamap');
	}
}
