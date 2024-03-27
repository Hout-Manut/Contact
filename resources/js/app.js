// import "./bootstrap";

document.getElementById("addEmail").onclick = function () {
    var div = document.createElement("div");
    div.innerHTML = `
            <label for="emailType">Type:</label>
            <input type="text" name="emailType[]" id="emailType">

            <label for="email">Email:</label>
            <input type="email" name="email[]" id="email">
        `;
    document.getElementById("emailFields").appendChild(div);
};

document.getElementById("addPhone").onclick = function () {
    var div = document.createElement("div");
    div.innerHTML = `
            <label for="phoneType">Type:</label>
            <input type="text" name="phoneType[]" id="phoneType">

            <label for="number">Number:</label>
            <input type="tel" name="number[]" id="number">
        `;
    document.getElementById("phoneFields").appendChild(div);
};

document.getElementById("addConnection").onclick = function () {
    var div = document.createElement("div");
    div.innerHTML = `
            <label for="connectionType">Type:</label>
            <input type="text" name="connectionType[]" id="connectionType">

            <label for="connection">Connection:</label>
            <input type="text" name="connection[]" id="connection">
        `;
    document.getElementById("connectionFields").appendChild(div);
};
