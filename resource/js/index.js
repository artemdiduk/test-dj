let form = document.querySelector(".form-send");
let button = document.querySelector(".form-send button");

button.addEventListener("click", (e) => {
    e.preventDefault();
    let name = document.querySelector("#name").value;
    let surname = document.querySelector("#surname").value;
    let email = document.querySelector("#email").value;
    let password = document.querySelector("#password").value;
    let confirmPassword = document.querySelector("#confirmPassword").value;
    let errorForm = document.querySelector('#error')
    let userGroup = document.querySelector('#user table');
    let data = {
        name: name,
        surname: surname,
        email: email,
        password: password,
        confirmPassword: confirmPassword
    }


    fetch('/user', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            if (data.error) {
                errorForm.innerHTML = "";
                errorForm.classList.remove('d-none');
                for (const key in data.error) {
                    errorForm.innerHTML += `<p> ${data.error[key]} </p>`
                }

            }
            if (data.ok) {
                errorForm.classList.add('d-none');
                userGroup.classList.remove('d-none');
                errorForm.innerHTML = "";
                form.style.display = "none";
                for (const key in data.ok) {
                    for (const elementUser in data.ok[key]) {
                        userGroup.innerHTML += `
                        <tr>
                            <th scope="row">${+key + 1}</th>
                            <td>${data.ok[key][elementUser].name}</td>
                            <td>${data.ok[key][elementUser].surname}</td>
                            <td>${data.ok[key][elementUser].email}</td>
                            <td>${data.ok[key][elementUser].password}</td>
                        </tr>
                        `
                        
                    }
                }

            }
        })

});