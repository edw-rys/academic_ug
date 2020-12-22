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
		    		'title'			=> 'Gestión Usuarios',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> true,
		    		'permissions' 	=> 'admin_users_menu',
		    		'route'			=> false,
		    		'submenus'		=> [
		    			(object) [
							'title'			=> 'Administradores',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> false,
		    				'route'			=> 'admin.admin.index',
						],
						(object) [
							'title'			=> 'Profesores',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> false,
		    				'route'			=> 'admin.teachers.index',
						],
						(object) [
							'title'			=> 'Estudiantes',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> false,
		    				'route'			=> 'admin.students.index',
		    			],
		    		]
				],
				(object) [
					'title'			=> 'Gestión Aulas',
					'icon'			=> 'fas fa-fire',
					'has_permissions' 	=> true,
					'permissions' 	=> 'admin_course_menu',
					'route'			=> 'user.admin.course.index',
				],
				(object) [
					'title'			=> 'Gestión Asignaturas',
					'icon'			=> 'fas fa-fire',
					'has_permissions' 	=> true,
					'permissions' 	=> 'admin_subject_menu',
					'route'			=> 'user.admin.subject.index',
				]
		    ]
		]
	]
];
