function promptAantal(button) {
    var nieuwAantal = prompt("Hoeveel stuks wilt u van dit artikel?", "0");
    if (!isNaN(parseFloat(nieuwAantal)) && isFinite(nieuwAantal)) {
        if (nieuwAantal <= 9) {
            button.form.insertAdjacentHTML('beforeend', '<input type="hidden" name="nieuwAantal" value="' + nieuwAantal + '">');
            button.form.submit();
        } else {
            alert("Je mag maximaal 9 stuks bestellen van een product.");
        }
    } else {
        alert("Ongeldige invoer. Voer een geldig getal in.");
    }
}