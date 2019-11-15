SELECT * FROM "users";
update users set id_user = 1 WHERE id_user=2;

SELECT civ, nombre, reg_date, rol, status FROM users u
INNER JOIN roles r ON (u.id_rol = r.id_rol)
INNER JOIN estatus e ON (u.id_status = e.id_status)
WHERE id_user=4;

DELETE FROM users WHERE id_user != 1;

--ALTER SEQUENCE public.users_id_user_seq RESTART WITH 1;

SELECT  id_trabajador, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre as nombres,
        t.cedula, tp.nombre AS trabajador_nomina, estatus, d.nombre AS dependencia,
        fecha_ultimo_movimiento
        FROM trabajador t
        Inner Join personal p On (t.id_personal = p.id_personal)
        Inner Join tipopersonal tp On (t.id_tipo_personal = tp.id_tipo_personal)
        Inner Join dependencia d On (t.id_dependencia = d.id_dependencia)
        WHERE t.cedula = :ced;
-- resultado de la busqueda de trabajador

SELECT id_trabajador, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre as nombres,
        t.cedula, tp.nombre AS trabajador_nomina, estatus, d.nombre AS dependencia, descripcion_cargo
        FROM trabajador t
        Inner Join personal p On (t.id_personal = p.id_personal)
        Inner Join tipopersonal tp On (t.id_tipo_personal = tp.id_tipo_personal)
        Inner Join dependencia d On (t.id_dependencia = d.id_dependencia)
        Inner Join cargo c On (t.id_cargo = c.id_cargo)
        WHERE t.cedula = 24280430

select t.id_trabajador, t.cedula, t.estatus, t.fecha_ingreso, d.nombre as dependencia, 
        c.descripcion_cargo as cargo, primer_apellido||' '||segundo_apellido||' '||primer_nombre||' '||segundo_nombre as nombres, 
        p.sexo, p.email, 
        p.telefono_celular as celular, p.estado_civil,tp.nombre as nomina
        
from personal as p

inner join trabajador as t on (t.id_personal=p.id_personal)
inner join dependencia as d on (d.id_dependencia=t.id_dependencia)
inner join cargo as c on (c.id_cargo=t.id_cargo)
inner join tipopersonal as tp on (tp.id_tipo_personal=t.id_tipo_personal)
where t.cedula= 24280430