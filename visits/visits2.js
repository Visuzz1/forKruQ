window.onload = function() {
    console.log("Page loaded, sending AJAX request...");

    var page = window.location.pathname.split("/").pop();

    fetch("../visits/update_views.php", { // ถ้าอยู่ในโฟลเดอร์เดียวกัน
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "page=" + encodeURIComponent(page),
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Network response was not ok: ' + response.status);
        }
    })
    .then(data => {
        console.log("Response from server:", data);
    })
    .catch(error => console.error("Error:", error));
};
