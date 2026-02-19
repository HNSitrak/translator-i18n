document.addEventListener("DOMContentLoaded", function () {
    const loginBtn = document.getElementById("loginBtn");
    const loginPopup = document.getElementById("loginPopup");

    if (loginBtn && loginPopup) {
        loginBtn.addEventListener("click", function () {
            loginPopup.style.display = "flex";
        });

        loginPopup.addEventListener("click", function(e) {
            if (e.target === loginPopup) {
                loginPopup.style.display = "none";
            }
        });
    }

});
