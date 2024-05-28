document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".container.forms");
    const signupLink = document.querySelector(".signup-link");
    const loginLink = document.querySelector(".login-link");

    signupLink.addEventListener("click", function(e) {
        e.preventDefault();
        container.classList.add("show-signup");
    });

    loginLink.addEventListener("click", function(e) {
        e.preventDefault();
        container.classList.remove("show-signup");
    });

    // Password show/hide toggle
    const pwShowHide = document.querySelectorAll(".eye-icon");
    pwShowHide.forEach(eyeIcon => {
        eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.querySelectorAll(".password");
            pwFields.forEach(password => {
                if (password.type === "password") {
                    password.type = "text";
                    eyeIcon.classList.replace("bx-hide", "bx-show");
                } else {
                    password.type = "password";
                    eyeIcon.classList.replace("bx-show", "bx-hide");
                }
            });
        });
    });
});
