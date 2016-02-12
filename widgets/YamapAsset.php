<?php

namespace sergmoro1\yamap\widgets;

use yii\web\AssetBundle;

class YamapAsset extends AssetBundle
{
	public $sourcePath = '@vendor/sergmoro1/yii2-yamap/assets';
	public $js = [
		'yamap.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
	];
}
