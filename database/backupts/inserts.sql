INSERT INTO `period` (`id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES ('1', 'Periodo CI 2019', '2019-01-01', '2019-04-01', 'finalized', '2019-01-01', '2019-04-01'), ('2', 'Periodo CII 2019', '2020-07-01', '2020-11-01', 'finalized', '2020-07-01', '2020-11-01'), (NULL, 'Periodo CI 2020', '2020-01-01', '2020-04-01', 'finalized', '2020-01-01', '2020-04-01'), (NULL, 'Periodo CII 2020', '2020-07-01', '2021-04-15', 'active', '2020-07-01', null) ;

INSERT INTO `course_subject` (`id`, `teacher_id`, `course_id`, `period_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES 
(NULL, '3', '1', '2', '5', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '1', '2', '1', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '1', '2', '2', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '2', '3', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '2', '4', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '2', '2', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '2', '5', 'active', '2020-12-19 19:55:56', NULL),

(NULL, '3', '1', '12', '1', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '1', '12', '2', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '12', '3', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '12', '4', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '12', '2', 'active', '2020-12-19 19:55:56', NULL),
(NULL, '3', '2', '12', '5', 'active', '2020-12-19 19:55:56', NULL);


INSERT INTO `course_student` (`id`, `student_id`, `course_subject_id`, `status`, `created_at`, `updated_at`) VALUES (NULL, '3', '1', 'active', NULL, NULL), (NULL, '3', '2', 'active', NULL, NULL), (NULL, '3', '4', 'active', NULL, NULL), (NULL, '3', '5', 'active', NULL, NULL), (NULL, '3', '6', 'active', NULL, NULL), (NULL, '3', '7', 'active', NULL, NULL), (NULL, '3', '8', 'active', NULL, NULL), (NULL, '3', '9', 'active', NULL, NULL), (NULL, '3', '10', 'active', NULL, NULL), (NULL, '3', '11', 'active', NULL, NULL), (NULL, '3', '12', 'active', NULL, NULL), (NULL, '3', '13', 'active', NULL, NULL) ;


-- Class subject

INSERT INTO `class_subject` (`id`, `name`, `course_subject_id`, `status`, `created_at`, `updated_at`) VALUES 
(NULL, 'Clase número 1', '1', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '2', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '3', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '4', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '5', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '6', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '7', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '8', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '9', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '10', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '11', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '12', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 1', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '1', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '2', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '3', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '4', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '5', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '6', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '7', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '8', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '9', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '10', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '11', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '12', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 2', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '1', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '2', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '3', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '4', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '5', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '6', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '7', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '8', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '9', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '10', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '11', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '12', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 3', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '1', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '2', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '3', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '4', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '5', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '6', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '7', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '8', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '9', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '10', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '11', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '12', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 4', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '1', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '2', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '3', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 c', '4', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 dc', '5', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 ', '6', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 b', '7', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '8', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '9', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '10', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '11', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '12', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 00', '13', 'active', '2020-12-19 22:59:35', NULL),
(NULL, 'Clase número 5 ad', '13', 'active', '2020-12-19 22:59:35', NULL);

-- roles permissions
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES ('1', '1');


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES 
(NULL, 'admin_course_menu', 'web', '2020-12-21 18:09:47', NULL),
(NULL, 'admin_subject_menu', 'web', '2020-12-21 18:09:47', NULL);


INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES (NULL, '2', '3', 'active', '2020-12-21 18:22:44', NULL);


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES 
(NULL, 'create_students', 'web', '2020-12-21 18:38:35', NULL), 
(NULL, 'create_teachers', 'web', '2020-12-21 18:38:35', NULL), 
(NULL, 'create_admin', 'web', '2020-12-21 18:38:35', NULL), 
(NULL, 'create_subject', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'create_course', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'edit_teachers', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'edit_students', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'edit_admin', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'edit_subject', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'edit_course', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'delete_teachers', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'delete_students', 'web', '2020-12-16 19:21:58', NULL),
(NULL, 'delete_admin', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'delete_subject', 'web', '2020-12-16 19:21:58', NULL), 
(NULL, 'delete_course', 'web', '2020-12-16 19:21:58', NULL);


INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES 
('7',  '7'),
('8',  '7'),
('9',  '7'),
('10', '7'),
('11', '7'),
('12', '7'),
('13', '7'),
('14', '7'),
('15', '7'),
('16', '7'),
('17', '7'),
('18', '7'),
('19', '7'),
('20', '7'),
('21', '7');


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES 
(NULL, 'restore_teachers', 'web', '2020-12-21 18:38:35', NULL),
(NULL, 'restore_students', 'web', '2020-12-21 18:38:35', NULL),
(NULL, 'restore_admin', 'web', '2020-12-21 18:38:35', NULL),
(NULL, 'restore_subject', 'web', '2020-12-21 18:38:35', NULL),
(NULL, 'restore_course', 'web', '2020-12-21 18:38:35', NULL);

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES 
('22', '7'),
('23', '7'),
('24', '7'),
('25', '7'),
('26', '7');