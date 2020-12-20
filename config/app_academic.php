<?php

return [
	'sections_menu'	=> [
		(object) [
			'header'	=> 'Dashboard',
			'menus'	=> [
		    	(object) [
		    		'title'			=> 'Dashboard',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> false,
		    		'permissions' 	=> false,
		    		'route'			=> 'user.dashboard.index'
		    	],
		    	(object) [
		    		'title'			=> 'Acadèmico',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> true,
		    		'permissions' 	=> 'academic_menu',
		    		'route'			=> false,
		    		'submenus'		=> [
		    			(object) [
							'title'			=> 'Asignaturas',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> 'show_subject_student',
		    				'route'			=> 'user.student.subject',
		    			]
		    		]
		    	],
		    	(object) [
		    		'title'			=> 'Gestiòn',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> true,
		    		'permissions' 	=> 'admin_users_menu',
		    		'route'			=> false,
		    		'submenus'		=> [
		    			(object) [
							'title'			=> 'Usuarios',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> false,
		    				'route'			=> 'user.panel.index',
		    			],
		    		]
		    	]
		    ]
		]
	]
];
