$(document).ready(function () {
    $.ajax({
        url: 'get_users.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log("Respuesta del servidor:", response);
            if (response.error) {
                $('#body-users').html('<tr><td colspan="6" class="text-center text-danger">' + response.message + '</td></tr>');
                return;
            }

            if (!response.users || response.users.length === 0) {
                $('#body-users').html('<tr><td colspan="6" class="text-center">No hay usuarios registrados</td></tr>');
                return;
            }

            let html = '';
            response.users.forEach(user => {
                html += `
                    <tr>
                        <td>${escapeHtml(user.nombre)}</td>
                        <td>${escapeHtml(user.apellido)}</td>
                        <td>${escapeHtml(user.email)}</td>
                        <td>${escapeHtml(user.telefono)}</td>
                        <td>${escapeHtml(user.rol)}</td>
                        <td>
                            <a href="editar_user.php?id=${user.id}" 
                                class="btn btn-info btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>`;
            });
            $('#body-users').html(html);

            // Reinicializar DataTable
            if ($.fn.DataTable.isDataTable('#tabla-users')) {
                $('#tabla-users').DataTable().clear().destroy();
            }
            $('#tabla-users').DataTable({
                language: { url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" },
                pageLength: 10,
                responsive: true
            });

            // Evento para botón Editar
            $(document).on('click', '.editar', function () {
                let userId = $(this).data('id');
                console.log("Editar usuario con ID:", userId);
                // Aquí pondre el modal para cargar y editar datos de usuario
            });

        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            console.log("Respuesta completa del servidor:", xhr.responseText);
            $('#body-users').html('<tr><td colspan="6" class="text-center text-danger">Error al cargar los datos</td></tr>');
        }

    });

    function escapeHtml(unsafe) {
        if (unsafe === null || unsafe === undefined) return '';
        return unsafe.toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    //Procesar y guardar el registro de usuarios nuevos
    document.getElementById("formUser").addEventListener("submit", function (e) {
        e.preventDefault(); // Evita recargar la página

        const formData = new FormData(this);
        console.log([...formData]);

        fetch("procesar_user.php", {
            method: "POST",
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                alert(data.mensaje);

                //Redirección
                if (
                    data.mensaje === "Usuario agregado correctamente" ||
                    data.mensaje === "Usuario actualizado correctamente"
                ) {
                    window.location.href = "users.php";
                }

            })
            .catch(err => console.error("Error:", err));
    });

});
