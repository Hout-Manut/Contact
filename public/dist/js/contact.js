document.getElementById("addPhone").onclick = function () {
    var div = document.createElement("div");
    div.className = "input-group mb-3 phone-input-group";
    div.innerHTML = `
            <div class="input-group-prepend">
                <select class="custom-select" name="phone_type[]">
                    <option value="Home">Home</option>
                    <option value="Personal">Personal</option>
                    <option value="Work">Work</option>
                    <option value="School">School</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <input type="text" name="phones[]" class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-field">Remove</button>
            </div>
        `;
    document.getElementById("phoneFields").appendChild(div);
};

document.getElementById("addEmail").onclick = function () {
    // Fixed the ID to match the button's ID
    var div = document.createElement("div");
    div.className = "input-group mb-3 email-input-group";
    div.innerHTML = `
            <div class="input-group-prepend">
                <select class="custom-select" name="email_type[]">
                    <option value="Home">Home</option>
                    <option value="Personal">Personal</option>
                    <option value="Work">Work</option>
                    <option value="School">School</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <input type="email" name="emails[]" class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-field">Remove</button>
            </div>
        `;
    document.getElementById("emailFields").appendChild(div);
};

document.getElementById("addConnection").onclick = function () {
    var div = document.createElement("div");
    div.className = "input-group mb-3 connection-input-group";
    div.innerHTML = `
            <div class="input-group-prepend">
                <select class="custom-select" name="connection_platform[]">
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Github">Github</option>
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Discord">Discord</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <input type="text" name="connections[]" class="form-control">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-field">Remove</button>
            </div>
        `;
    document.getElementById("connectionFields").appendChild(div);
};

document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("remove-field")) {
        e.target.closest(".input-group").remove();
    }
});

// document.addEventListener("DOMContentLoaded", function () {
//     document.querySelectorAll(".input-group").forEach(function (group) {
//         group
//             .querySelectorAll(".form-check-input")
//             .forEach(function (radioButton) {
//                 radioButton.addEventListener("change", function () {
//                     var buttonText = this.closest(
//                         ".input-group-prepend"
//                     ).querySelector(".dropdown-label");
//                     if (buttonText) {
//                         buttonText.textContent = this.value;
//                         var dropdownCaret = document.createElement("span");
//                         dropdownCaret.classList.add("caret");
//                         buttonText.appendChild(dropdownCaret);
//                     }
//                 });
//             });
//     });
// });
