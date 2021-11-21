
SELECT *
FROM cursos_materias 

SELECT *
FROM alumnos_cursos

SELECT *
FROM usuarios

SELECT *
FROM alumnos

SELECT *
FROM cursos



INSERT INTO usuarios (
    usuario,
    password,
    idrol,
    activo
) VALUES (
    'lucas',
    '123',
    3,
    1
)


INSERT INTO alumnos (
    nombre,
    dni,
    idusuario
) VALUES (
    'Lucas Aquino',
    '40872315',
    38
)

INSERT INTO alumnos_cursos (
    idalumno,
    idcurso
) VALUES (
    5,
    13
), (
    5,
    14
);



SELECT cursos.*
FROM alumnos_cursos
JOIN cursos ON cursos.idcursos = alumnos_cursos.idcurso
WHERE alumnos_cursos.idalumno = 6


SELECT * FROM alumnos WHERE idusuarios = 6