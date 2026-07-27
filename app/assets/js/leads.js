$(document).ready(function () {
    $.ajax({
        url: 'get_leads.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log("Respuesta del servidor:", response);
            if (response.error) {
                $('#body-leads').html('<tr><td colspan="5" class="text-center text-danger">' + response.message + '</td></tr>');
                return;
            }

            if (!response.leads || response.leads.length === 0) {
                $('#body-leads').html('<tr><td colspan="5" class="text-center">No hay contactos registrados</td></tr>');
                return;
            }

            let html = '';
            response.leads.forEach(lead => {
                html += `
                <tr>
                    <td>${escapeHtml(lead.nombre)}</td>
                    <td>${escapeHtml(lead.empresa)}</td>
                    <td>${escapeHtml(lead.email)}</td>
                    <td>${escapeHtml(lead.telefono)}</td>
                    <td>
                        <button class="btn btn-info btn-sm verMensaje" 
                                data-mensaje="${escapeHtml(lead.mensaje || 'Sin mensaje')}">
                        Ver mensaje
                        </button>
                    </td>
                </tr>
        `;
            });
            $('#body-leads').html(html);

            $('#tabla-leads').DataTable({
                language: { url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" },
                pageLength: 10,
                responsive: true
            });

            $(document).on('click', '.verMensaje', function () {
                let mensaje = $(this).data('mensaje');
                $('#mensajeContenido').text(mensaje);
                $('#modalMensaje').modal('show');
            });
        },
        error: function (xhr, status, error) {
            console.error("Error AJAX:", status, error);
            console.log("Respuesta completa del servidor:", xhr.responseText);
            $('#body-leads').html('<tr><td colspan="5" class="text-center text-danger">Error al cargar los datos</td></tr>');
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


});
