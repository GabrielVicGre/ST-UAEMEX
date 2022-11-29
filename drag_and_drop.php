<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="">
    <link rel="stylesheet" href="Assets/Icons/fontawesome-6.2.0/css/all.css">
    <link rel="stylesheet" href="Assets/CSS/drag_and_drop.css">
</head>

<body>
    <div id="drop-area">
        <form class="drop-area-form">
            <input type="file" id="fileElem" accept="image/*" onchange="handleFile(this.files[0])">
            <label id="fileInput" for="fileElem">
                <p>Selecciona o arrastra un archivo</p>
                <p><i class="fa fa-cloud-upload" aria-hidden="true"></i></p>
            </label>
        </form>
    </div>
    <div id="file-upload" class="hidden">
        <i class="fa fa-file" aria-hidden="true"></i>
        <p id="file-name"></p>
    </div>
    <!--<p id="progress"></p>-->
</body>

<script>
    let dropArea = document.getElementById("drop-area");
    let fileInfo = document.getElementById("file-upload");

    dropArea.addEventListener("mouseenter", highlight);
    dropArea.addEventListener("mouseover", highlight);
    dropArea.addEventListener("mouseleave", unhighlight);
    dropArea.addEventListener("dragover", highlight);
    dropArea.addEventListener("dragleave", unhighlight);
    dropArea.addEventListener("drop", unhighlight);
    dropArea.addEventListener("drop", handleDrop);

    function highlight(e) {
        e.preventDefault();
        e.stopPropagation();
        dropArea.classList.add('highlight');
    }

    function unhighlight(e) {
        e.preventDefault();
        e.stopPropagation();
        dropArea.classList.remove('highlight');
    }

    function handleDrop(e) {
        console.log("Drop!");

        let dt = e.dataTransfer;
        let files = dt.files;

        if(files.length > 1) {
            // Error, mas de un archivo
        } else if(verifyFile(files[0]) == false){
            // Tamanio o tipo incorrecto
        } else {
            handleFile(files[0]);
        }
    }

    function verifyFile(file) {
        return true;
    }

    function handleFile(file) {
        //dropArea.classList.add("hidden");
        fileInfo.classList.add("visible");
        document.getElementById("file-name").innerHTML = file.name;

        uploadFile(file);
    }

    function uploadFile(file) {
        var url = "Controller/upload_evidence.php";
        var xhr = new XMLHttpRequest();
        var formData = new FormData();

        xhr.open('POST', url, true);

        xhr.upload.addEventListener("progress", uploadProgress);

        xhr.addEventListener("readystatechange", function(e) {
            console.log("ReadyState : " + xhr.readyState);
            console.log("Status : " + xhr.status);

            /*
                Ready State :
                    0   UNSET               No se ha llamado a open()
                    1   OPENED              Se ha llamado a open()
                    2   HEADERS_RECEIVED    Se ha llamado a send()
                    3   LOADING             Cargando / Descargando
                    4   DONE                La operacion fue completada
            */
            if(xhr.readyState == 4 && xhr.status == 200) {
                console.log("listo");
                // Listo
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                console.log("error");
                // Error
            } 
        });

        formData.append("file", file);
        xhr.send(formData);
    }

    function uploadProgress(e) {
        console.log(e.loaded);
        document.getElementById("progress").innerHTML = (e.loaded * 100 / e.total) + "%" ;
    }

</script>

</html>