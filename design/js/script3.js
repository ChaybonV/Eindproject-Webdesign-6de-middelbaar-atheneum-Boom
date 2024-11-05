document.getElementById('footer-select').addEventListener('change', function() {
    if (this.value == "empty") {
        window.location.href = hoofdmap+"index.php";
    } else {
        window.location.href = hoofdmap+"talen/"+this.value;
    }
});