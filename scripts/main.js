function sendData() {
    fetch("api/v/text_processor.php", {
        method: "POST",
        body: JSON.stringify({
            "text": document.getElementById('text').value,
            "reverse": document.getElementById('reverse').checked,
            "to_upper": document.getElementById('to-upper').checked
        }),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
    })
        .then((response) => response.json())
        .then((json) => {
            document.getElementById('result').value = json.data.result
        });
}