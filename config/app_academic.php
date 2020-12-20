<?php

return [
	'sections_menu'	=> [
		(object) [
			'header'	=> 'Dashboard',
			'menus'	=> [
		    	(object) [
		    		'title'			=> 'Dashboard',
		    		'icon'			=> 'fas fa-fire',
		    		'permissions' 	=> false,
		    		'route'			=> 'user.dashboard.index'
		    	],
		    	(object) [
		    		'title'			=> 'Acadèmico',
		    		'icon'			=> 'fas fa-fire',
		    		'permissions' 	=> false,
		    		'route'			=> false,
		    		'submenus'		=> [
		    			(object) [
							'title'			=> 'Dashboard',
		    				'permissions' 	=> false,
		    				'route'			=> 'user.panel.index',
		    			],
		    			(object) [
							'title'			=> 'Asignaturas',
		    				'permissions' 	=> false,
		    				'route'			=> 'user.student.subject',
		    			]
		    		]
		    	]
		    ]
		]
	]
];
