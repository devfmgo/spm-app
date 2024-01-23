$(document).ready(function() {
    let color = document.getElementById("warna").value;
    if (color != null) {
        document.getElementById("panelWarna").style.backgroundColor = `${color}`;
    } else {
        document.getElementById("panelWarna").style.backgroundColor = "#000";
    }
    // ketika warna diubah
    $("#warna").blur(function() {
        let color = document.getElementById("warna").value;
        if (color != null) {
            document.getElementById("panelWarna").style.backgroundColor = `${color}`;
        } else {
            document.getElementById("panelWarna").style.backgroundColor = "#000";
        }
    });

});
