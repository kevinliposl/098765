<?php

/**
 * @authors <kevin.sandoval@ucr.ac.cr><diego.cendenofonseca@ucr.ac.cr><elena.calderonfernandez@ucr.ac.cr><brogudbarrientos@gmail.com>
 * @version 1.0
 * @copyright (c) 2017, Funcion Academia Musical
 * @access public
 * @category Model
 * Class Admin     
 */
class AdminModel {

    private $db;

    function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    /**
     * @return String result
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastname Apellido de entidad
     * @param string $secondLastname Apellido de entidad
     * Funcion para insertar administrador
     */
    function insert($id, $email, $name, $firstLastname, $secondLastname) {
        $query = $this->db->prepare("call sp_insert_admin('$id','$email','$name','$firstLastname','$secondLastname')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    /**
     * @return String result
     * @param integer $id Identificador de entidad
     * Funcion para eliminar administrador
     */
    function delete($id) {
        $query = $this->db->prepare("call sp_delete_admin('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    /**
     * @return Admin
     * @param integer $id Identificador de entidad
     * Funcion para seleccionar administrador
     */
    function select($id) {
        $query = $this->db->prepare("call sp_select_admin('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    /**
     * @return array Admin
     * Funcion para seleccionar todos los administrador
     */
    function selectAll() {
        $query = $this->db->prepare("call sp_select_all_admin()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * @return array Admin
     * Funcion para seleccionar todos los administrador borrados
     */
    function selectAllDelete() {
        $query = $this->db->prepare("call sp_select_all_admin_delete()");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }

    /**
     * @return String result
     * @param integer $id Identificador de entidad
     * @param string $email Email de entidad
     * @param string $name Nombre de entidad
     * @param string $firstLastName Apellido de entidad
     * @param string $secondLastName Apellido de entidad
     * Funcion para actualizar administrador
     */
    function updatePersonalData($idOld, $id, $email, $name, $firstLastname, $secondLastname) {
        $query = $this->db->prepare("call sp_update_admin('$idOld','$id','$email','$name','$firstLastname','$secondLastname')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    /**
     * @return String result
     * @param integer $id Identificador de entidad
     * Funcion para reactivar administrador
     */
    function reactivate($id) {
        $query = $this->db->prepare("call sp_reactivate_admin('$id')");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

}
