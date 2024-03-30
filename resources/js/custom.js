$(document).ready(function () {
    let color = document.getElementById("warna").value;
    if (color != null) {
        document.getElementById(
            "panelWarna"
        ).style.backgroundColor = `${color}`;
    } else {
        document.getElementById("panelWarna").style.backgroundColor = "#000";
    }
    // ketika warna diubah
    $("#warna").blur(function () {
        let color = document.getElementById("warna").value;
        if (color != null) {
            document.getElementById(
                "panelWarna"
            ).style.backgroundColor = `${color}`;
        } else {
            document.getElementById("panelWarna").style.backgroundColor =
                "#000";
        }
    });
});

function getValue() {
    let checkboxes = document.getElementsByName("filter");

    let result = [];

    for (const element of checkboxes) {
        if (element.checked) {
            result.push(element.value);
        }
    }
    let id = result;
    window.location.replace(
        `http://spm-app.test/data-document/filter/${result}`
    );
}
