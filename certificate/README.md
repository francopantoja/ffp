# Configuración Certificado #

TODO Describe the plugin shortly here.

TODO Provide more detailed description here.

## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/local/certificate

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

2023 by IDEF https://idef21.com UniMoodle P31

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.

## API REST ##
Desarrollo de la funcionalidad “Webservices para obtener el certificado“ dentro del plugin local_certificate
https://github.com/UNIMOODLE/moodle-local_certificate-P31
El sistema ofrecerá diferentes servicios web para obtener certificados desde sistemas externos. Estos servicios web serán los siguientes:
1.	getPdfTeaching (id-modelo, dni, course)
Devuelve el PDF del certificado de que el profesor ha impartido docencia en el curso indicado con el detalle del uso que ha realizado de la herramienta que aparecerá en el certificado. Este servicio web llamará a getJsonTeaching para obtener la información a maquetar.
2.	getJsonTeaching (dni, course)
Devuelve un json con la información necesaria para el anterior servicio para confeccionar el certificado. El objetivo de este servicio es independizar el proceso de obtención de los datos del proceso de generación del documento con la presentación final.
3.	getPdfStudentCourseCompleted (id-modelo, dni, course)
Devuelve el PDF del certificado de que el alumno ha cursado y superado el curso indicado en el parámetro. Este servicio web llamará a getJsonStudentCourseCompleted para obtener la información a maquetar.
4.	getJsonStudentCourseCompleted (dni, course)
Devuelve un json con la información necesaria para el anterior servicio para confeccionar el certificado. El objetivo de este servicio es independizar el proceso de obtención de los datos del proceso de generación del documento con la presentación final.
5.	getCoursesAsStudent (dni)
Devuelve un json con la lista de los cursos a los cuales ha asistido el alumno. Este servicio permitirá a un sistema externo mostrar los cursos certificables para que seleccionen uno para generar su certificado. El servicio devolverá como mínimo los siguientes atributos de cada curso y se valorará que se ofrezca un servicio para configurar otros atributos de los disponibles para el alumno y los cursos en Moodle:
a. course.shortname
b. course.fullname
c. course.categoryid.
d. course.completed booleano indicando si el curso ha sido superado por el alumno.
e. Lista de modelos que pueden usarse para emitir el certificado para cada curso. El servicio también devolverá los atributos del alumno:student.fullname
6.	getCoursesAsTeacher (dni)
Devuelve un json con la lista de cursos en los cuales figura como profesor la persona indicada por su dni. Este servicio permitirá a un sistema externo mostrar los cursos certificables para que seleccionen uno para generar su certificado. El servicio devolverá como mínimo los siguientes atributos de cada curso y se valorará que se ofrezca un servicio para configurar otros atributos de los disponibles para el profesor y los cursos en moodle:
a. course.shortname
b. course.fullname
c. course.categoryid.
d. course.completed booleano indicando si el curso ha sido superado por el alumno.
e. Lista de modelos que pueden usarse para emitir el certificado para cada curso. El servicio también devolverá los atributos del alumno:teacher.fullname

El parámetro “Course” de pdfTeaching y jsonTeaching debe ser un multivaluado (array de uno o más) de courseid. Por coherencia con la especificación del report. Si el array es vacío se entiende todo el servidor.

