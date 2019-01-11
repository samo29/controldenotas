<?php
declare(strict_types=1);

namespace App;

use Core\FrontController;

/**
 * Class Init
 * @package App
 */
class Routes extends FrontController
{
    /**
     * Método para setear rutas, basadas en controlers y actions
     */
    protected function initRoutes()
    {
        # Normal requests

        # $ar['route_name'] = ['route' => '/', 'controller' => 'controller_name', 'action' => 'action_name'];

        $ar['home'] = ['route' => '/', 'controller' => 'alumnos', 'action' => 'showStudents'];
        $ar['courses'] = ['route' => '/cursos', 'controller' => 'cursos', 'action' => 'showcourses'];
        $ar['add_new_students'] = ['route' => '/alumnos/nuevoalumno', 'controller' => 'alumnos', 'action' => 'addnewstudent'];
        $ar['add_new_course'] = ['route' => '/cursos/nuevocurso', 'controller' => 'cursos', 'action' => 'addnewcourse'];
        $ar['show_notes'] = ['route' => '/calificaciones', 'controller' => 'calificaciones', 'action' => 'shownotes'];

        # Ajax requests
        $ar['save_student'] = ['route' => '/alumnos/savenewstudent', 'controller' => 'alumnos', 'action' => 'savenewstudent'];
        $ar['save_course'] = ['route' => '/cursos/savenewcourse', 'controller' => 'cursos', 'action' => 'savenewcourse'];
        $ar['asign_course'] = ['route' => '/cursos/asignarcurso', 'controller' => 'cursos', 'action' => 'asigncourse'];
        $ar['save_new_note'] = ['route' => '/cursos/agregarnuevanota', 'controller' => 'cursos', 'action' => 'addnewnote'];

        $this->setRoutes($ar);
    }
}
