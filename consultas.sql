SELECT c.*, p.nombre AS 'profesor', m.nombreMateria as 'materia'
FROM alumnos_cursos 
JOIN cursos c ON c.idcursos = alumnos_cursos.idcurso
JOIN profesores_cursos pc ON pc.idcurso = c.idcursos
JOIN profesores p ON p.idprofesores = pc.idprofesor
JOIN cursos_materias cm ON cm.idcurso = c.idcursos
JOIN materias m ON m.idmaterias = cm.idmateria 
WHERE alumnos_cursos.idalumno = 6