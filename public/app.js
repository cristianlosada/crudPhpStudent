
$(document).ready(function() {
    // Global Settings
    let edit = false;
    

    console.log('jquery is working!');
    fetchStudent();
    selectDep();
    selectCity();

    function selectCity(){
      $.ajax({
        url: 'student-list-city.php',
        type: 'GET',
        success: function(response) {
          //console.log(response)
          
          const citys = $.parseJSON(response);
          let template = '';
          citys.forEach(city => {
            template += `
                    <option value="${city.id}">${city.nombre}</option>
                  `
          });
          $('#ciudad').html(template);
        }
      });
    }

    function selectDep(){
      $.ajax({
        url: 'student-list-dep.php',
        type: 'GET',
        success: function(response) {
          //console.log(response)
          
          const deps = $.parseJSON(response);
          let template = '';
          deps.forEach(dep => {
            template += `
                    <option value="${dep.id}">${dep.nombre}</option>
                  `
          });
          $('#departamento').html(template);
        }
      });
    }

  
    $('#student-form').submit(e => {
      e.preventDefault();
      const postData = {
        identificacion: $('#identificacion').val(),
        nombre: $('#nombre').val(),
        fecha: $('#fecha').val(),
        ciudad: $('#ciudad').val(),
        edad: $('#edad').val(),
        departamento: $('#departamento').val(),
        id: $('#studentId').val()

      };
      console.log(postData)
      const url = edit === false ? 'student-add.php' : 'student-edit.php';
      console.log(postData, url);
      $.post(url, postData, (response) => {
        
        confirm(response);
        
        $('#student-form').trigger('reset');
        edit = false;
        fetchStudent();
      });
    });
  
    // Fetching Tasks
    function fetchStudent() {
      $.ajax({
        url: 'student-list.php',
        type: 'GET',
        success: function(response) {
          //console.log(response)
          
          const students = $.parseJSON(response);
          let template = '';
          
          students.forEach(student => {
            template += `
                    <tr studentId="${student.id}">
                    <td>${student.id}</td>
                    <td>
                    <a href="#" class="student-item">
                      ${student.identificacion} 
                    </a>
                    </td>
                    <td>${student.nombre}</td>
                    <td>${student.fecha}</td>
                    <td>${student.ciudad}</td>
                    <td>${student.departamento}</td>
                    <td>${student.edad}</td>
                    <td>
                      <button class="student-delete btn btn-danger">
                       Delete 
                      </button>
                    </td>
                    </tr>
                  `
          });
          $('#students').html(template);
        }
      });
    }
  
    // Get a Single Task by Id 
    $(document).on('click', '.student-item', (e) => {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('studentId');
      edit = true;
      $.post('student-single.php', {id}, (response) => {
        const student = $.parseJSON(response);
        $('#nombre').val(student.nombre);
        $('#identificacion').val(student.identificacion);
        $('#fecha').val(student.fecha);
        $('#ciudad').val(student.ciudad);
        $('#edad').val(student.edad);
        $('#departamento').val(student.departamento);
        $('#studentId').val(student.id);
        
      });
      e.preventDefault();
      
    });
  
    // Delete a Single Task
    $(document).on('click', '.student-delete', (e) => {
      if(confirm('Are you sure you want to delete it?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('studentId');
        $.post('student-delete.php', {id}, (response) => {
          edit = false;
          fetchStudent();
        });
      }
    });
  });