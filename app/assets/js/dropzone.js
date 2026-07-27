Dropzone.autoDiscover = false;

// Variable para controlar si el usuario envió el formulario
let formWasSubmitted = false;

// Ruta base para mostrar imágenes
const baseUrl = window.location.origin + "/globxel/assets/products/";

// Inicializar Dropzone
const myDropzone = new Dropzone("#dropzone", {
    url: "procesar_product.php",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 10,
    maxFilesize: 5,
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    paramName: "imagenes",
    dictDefaultMessage: "Arrastra imágenes aquí o haz clic para subir",
});

// Mostrar imágenes existentes
if (typeof existingImages !== "undefined" && existingImages.length > 0) {

    existingImages.forEach(filename => {

        const mockFile = { name: filename, size: 12345, accepted: true };

        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit("thumbnail", mockFile, baseUrl + productId + "/" + filename);
        myDropzone.emit("complete", mockFile);

        myDropzone.files.push(mockFile);
    });
}

// Agregar datos del formulario al Dropzone
myDropzone.on("sending", function (file, xhr, formData) {
    let form = document.querySelector("#formProduct");
    let data = new FormData(form);

    for (const pair of data.entries()) {
        formData.append(pair[0], pair[1]);
    }
});

// Submit principal del formulario
document.querySelector("#formProduct").addEventListener("submit", function (e) {
    e.preventDefault();

    formWasSubmitted = true;
    if (myDropzone.getQueuedFiles().length > 0) {
        myDropzone.processQueue();
    } else {
        let formData = new FormData(this);

        fetch("procesar_product.php", {
            method: "POST",
            body: formData
        })
            .then(r => r.json())
            .then(d => {
                alert(d.mensaje);
                window.location.href = "products.php";
            });
    }
});

// Solo redirigimos después de Dropzone si el usuario envió el formulario
myDropzone.on("queuecomplete", function () {

    if (!formWasSubmitted) return;

    alert("Producto guardado correctamente");
    window.location.href = "products.php";
});

/* Eliminar imagenes del dropzone */
myDropzone.on("removedfile", function (file) {

    // Si es imagen existente (viene como mockFile)
    if (file.name && existingImages.includes(file.name)) {

        fetch("eliminar_imagen.php", {
            method: "POST",
            body: new URLSearchParams({
                id: productId,
                filename: file.name
            })
        })
            .then(r => r.json())
            .then(d => {
                if (d.ok) {
                    console.log("Imagen eliminada del servidor:", file.name);
                } else {
                    alert("Error al eliminar: " + d.error);
                }
            })
            .catch(err => console.error(err));
    }
});

