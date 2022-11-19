function confirmacao() {
    if (document.getElementById('senha').value == document.getElementById('senha2').value && document.getElementById('senha').value.length >= 8) {
        document.getElementById('processo').disabled = false;
    } else {
        document.getElementById('processo').disabled = true;
    }
}