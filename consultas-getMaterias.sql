SELECT *
FROM materias

SELECT *
FROM cursos_materias


SELECT m.nombreMateria as 'materia', c.nombre_curso AS 'curso', p.nombre AS 'profesor'
FROM alumnos_cursos 
JOIN cursos c ON c.idcursos = alumnos_cursos.idcurso
JOIN cursos_materias cm ON cm.idcurso = c.idcursos
JOIN materias m ON m.idmaterias = cm.idmateria
JOIN profesores_cursos pc ON pc.idcurso = c.idcursos
JOIN profesores p ON p.idprofesores = pc.idprofesor
WHERE alumnos_cursos.idalumno = 5


