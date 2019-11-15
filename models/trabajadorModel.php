<?php

if (is_file('../core/mainModel.php')) {
    require_once '../core/mainModel.php';
} else {
    require_once 'core/mainModel.php';
}
// require_once '../core/mainModel.php';

// session_start(['name' => 'NSW']);

class trabajadorModel extends sigModel{

    function lista_trab_modelo($ced){

        $sql = "SELECT id_trabajador, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre as nombres,
        t.cedula, tp.nombre AS trabajador_nomina, estatus, d.nombre AS dependencia, descripcion_cargo
        FROM trabajador t
        Inner Join personal p On (t.id_personal = p.id_personal)
        Inner Join tipopersonal tp On (t.id_tipo_personal = tp.id_tipo_personal)
        Inner Join dependencia d On (t.id_dependencia = d.id_dependencia)
        Inner Join cargo c On (t.id_cargo = c.id_cargo)
        WHERE t.cedula = :ced;";

        $query = sigModel::conectarSige()->prepare($sql);

        $query->bindValue(':ced',$ced,PDO::PARAM_INT);

        $query->execute();

        if ($query->rowCount()>0) {
            return $query->fetchAll();
        } else {
            return false;
        }
        
        
        
    }

    function lista_personal_modelo($ced){

        $sql = "SELECT t.id_trabajador, t.cedula, t.estatus, t.fecha_ingreso, d.nombre as dependencia, 
        c.descripcion_cargo as cargo, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre as nombres, 
        p.sexo, p.email, 
        p.telefono_celular as celular, p.estado_civil,tp.nombre as nomina
        
        from personal as p

        inner join trabajador as t on (t.id_personal=p.id_personal)
        inner join dependencia as d on (d.id_dependencia=t.id_dependencia)
        inner join cargo as c on (c.id_cargo=t.id_cargo)
        inner join tipopersonal as tp on (tp.id_tipo_personal=t.id_tipo_personal)
        where t.cedula = :ced;";

        $query = sigModel::conectarSige()->prepare($sql);

        $query->bindValue(':ced',$ced,PDO::PARAM_INT);

        $query->execute();

        if ($query->rowCount()>0) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
        
        
        
    }


}