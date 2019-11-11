SELECT * FROM "users";
update users set id_user = 1 WHERE id_user=2;

SELECT civ, nombre, reg_date, rol, status FROM users u
INNER JOIN roles r ON (u.id_rol = r.id_rol)
INNER JOIN estatus e ON (u.id_status = e.id_status)
WHERE id_user=4;

DELETE FROM users WHERE id_user != 1;

--ALTER SEQUENCE public.users_id_user_seq RESTART WITH 1;