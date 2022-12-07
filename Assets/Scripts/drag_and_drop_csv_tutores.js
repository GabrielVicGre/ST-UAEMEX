dropArea = document.getElementById("drop-area-tutores");
fileInput = document.getElementById("file-input-tutores");
submitBtn = document.getElementById("submit-btn-tutores");
loadingBtn = document.getElementById("loading-btn-tutores");

dropArea.addEventListener("mouseenter", highlight);
dropArea.addEventListener("mouseover", highlight);
dropArea.addEventListener("mouseleave", unhighlight);
dropArea.addEventListener("dragenter", highlight);
dropArea.addEventListener("dragover", highlight);
dropArea.addEventListener("dragleave", unhighlight);
//dropArea.addEventListener("drop", unhighlight);
dropArea.addEventListener("drop", handleDrop);

fileInput.addEventListener("change", handleSelect);

submitBtn.addEventListener("click", loading);

function highlight(e) {
    e.preventDefault();
    e.stopPropagation();
    this.classList.add('highlight');
}

function unhighlight(e) {
    e.preventDefault();
    e.stopPropagation();
    this.classList.remove('highlight');
}

function handleDrop(e) {
    e.preventDefault();

    let files = e.dataTransfer.files;

    fileInput.files = files;

    handleFiles(files);
}

function handleSelect() {
    let files = fileInput.files;

    handleFiles(files);
}

function handleFiles(files) {

    allowedExtensions = [
        "text/csv"
    ]

    if(files.length > 1) {
        window.alert("Debes subir un solo archivo como evidencia.");
        return;
    }

    let file = files[0];

    console.log(file.type);

    if(!allowedExtensions.some(function (value){
        return value === file.type;
    })) {
        window.alert("La extension del archivo es incorrecta");
        return;
    }

    showSubmitBtn(file.name);
}

function showSubmitBtn(fname) {
    document.getElementById("file-name-tutores").innerHTML = fname;
    document.getElementById("file-info-tutores").classList.remove("hidden");
}

function loading(e) {
    submitBtn.classList.add('hidden');
    loadingBtn.classList.remove("hidden");

    document.getElementById("drag-and-drop-form-tutores").submit();
}

