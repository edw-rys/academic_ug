<?php

return [
	'sections_menu'	=> [
		(object) [
			'header'	=> 'Dashboard',
			'menus'	=> [
		    	(object) [
		    		'title'			=> 'Dashboard',
					'id'			=> 'xlvpa',
		    		'icon'			=> 'fas fa-home',
		    		'has_permissions' 	=> false,
		    		'permissions' 	=> false,
		    		'route'			=> 'user.dashboard.index'
		    	],
		    	
		    ]
		],
		(object) [
			'header'	=> 'Académico',
			'menus'	=> [
				(object) [
		    		'title'			=> 'Académico',
					'id'			=> 'admm',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> true,
		    		'permissions' 	=> 'show_academic_teacher',
		    		'route'			=> 'teacher.academic.index'
				],
				(object) [
					'title'			=> 'Académico',
					'id'			=> 'ackm',
		    		'icon'			=> 'fas fa-fire',
		    		'has_permissions' 	=> true,
		    		'permissions' 	=> 'academic_menu',
		    		'route'			=> false,
		    		'submenus'		=> [
		    			(object) [
							'title'			=> 'Asignaturas',
		    				'has_permissions' 	=> true,
		    				'permissions' 	=> 'show_subject_student',
		    				'route'			=> 'student.subject.index',
						],
		    		]
		    	],
		    	(object) [
		    		'title'			=> 'Gestión Usuarios',
		    		'icon'			=> 'fas fa-fire',
					'id'			=> 'xlvpac',
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
					'title'			=> 'Gestión Aula',
					'id'			=> 'xlvpacac',
					'icon'			=> 'fas fa-fire',
					'has_permissions' 	=> true,
					'permissions' 	=> 'admin_course_menu',
					'route'			=> false,
					'submenus'		=> [
		    			(object) [
							'title'			=> 'Gestión Asignaturas',
							'has_permissions' 	=> true,
							'permissions' 	=> 'access_subject',
							'route'			=> 'admin.subject.index',
						],
						(object) [
							'title'			=> 'Gestión Curso',
							'has_permissions' 	=> true,
							'permissions' 	=> 'access_course',
							'route'			=> 'admin.course.index',
						],
						(object) [
							'title'			=> 'Gestión Periodos',
							'has_permissions' 	=> true,
							'permissions' 	=> 'access_period',
							'route'			=> 'admin.period.index',
						],
						(object) [
							'title'			=> 'Asignación Profesor',
							'has_permissions' 	=> true,
							'permissions' 	=> 'access_course_subject',
							'route'			=> 'admin.course_subject.index',
						],
						(object) [
							'title'			=> 'Estudiantes|Paralelo',
							'has_permissions' 	=> true,
							'permissions' 	=> 'access_registration',
							'route'			=> 'admin.course_student.index',
		    			],
		    		]
				],
			],
			
		],
	],
	'setting' 	=> [
		'date_format'	=> 'd-m-Y',
		'date_format_show'	=> 'd/m/Y',
		'date_picker'	=> 'dd-mm-yyyy'
	],
	'api'		=> [
		'url'		=> env('APP_API','https://api.atlantislow.com'),
		'comment'	=> 'api/comment/analize',
        'timeout'	=> 10,
		'user'		=> env('USER_API'),
		'password'	=> env('PSSW_API'),
	],
	'views_title'	=> [
		'dashboard' => 'Dashboard',
	]
];
