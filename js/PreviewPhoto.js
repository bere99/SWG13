function readImage (input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imagen").html("<img src='"+e.target.result+"' width='270' heigth='270' />");
        }
        reader.readAsDataURL(input.files[0]);
    }
}