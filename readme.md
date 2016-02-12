<h1>Yandex map for Yii2</h1>

Yii2 extension for Yandex map.

<h2>Installation</h2>

<pre>
$ composer require sergmoro1/yii2-yamap "dev-master"
</pre>

<h2>Usage</h2>

If you have one map in a view, 
define points on the map , set params, and place the widget.

<pre>
&lt;?= Yamap::widget([
	'points' =&gt; [
		[
			'lat' =&gt; 55.780669,
			'lng' =&gt; 49.144449,
			'icon' =&gt; '',
			'header' =&gt; 'Company name',
			'body'=&gt; 'Sales & Marketing&lt;/br&gt;&lt;small&gt;Office&lt;/small&gt;',
			'footer' =&gt; '8-800-200-07-71',
		],
	],
	'params' =&gt; ['visible' =&gt; true, 'zoom' =&gt; 13]
]); ?&gt;
</pre>

If you have more then one map, then place maps divs for each of them, and place the widget.

<pre>

...

&lt;div id='kazan_office' style='width:100%; height:300px; margin-right:10px; display:none;'&gt;&lt;/div&gt;

...

&lt;div id='moscow_office' style='width:100%; height:300px; margin-right:10px; display:none;'&gt;&lt;/div&gt;

...

&lt;?= Yamap::widget(['areas' =&gt;
	[
		'kazan_office' =&gt; [
			'points' =&gt; [
				[
					'lat' =&gt; 55.780669,
					'lng' =&gt; 49.144449,
					'icon' =&gt; '',
					'header' =&gt; 'Company name',
					'body' =&gt; 'Sales & Marketing&lt;/br&gt;&lt;small&gt;Kazan office&lt;/small&gt;',
					'footer' =&gt; '8-800-000-00-00',
				],
			],
			'params' =&gt; ['visible' =&gt; true, 'zoom' =&gt; 13]
		],
		'moscow_office' =&gt; [
			'points' =&gt; [
				[
					'lat' =&gt; 55.7643,
					'lng' =&gt; 37.6454,
					'icon' =&gt; '',
					'header' =&gt; 'Company name',
					'body' =&gt; 'Sales & Marketing&lt;/br&gt;&lt;small&gt;Moscow office&lt;/small&gt;',
					'footer' =&gt; '+7 495 222-22-22',
				],
			],
			'params' =&gt; ['visible' =&gt; true,'zoom' =&gt; 15],
		],
]]); ?&gt;
</pre>
