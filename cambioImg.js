function change() {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('imagen').files[0]);         
    reader.onload = function (e) {             
        document.getElementById('imgC').src = e.target.result;         
    };     
}
