document.addEventListener("DOMContentLoaded", function (event) {
    jsonPost(location.origin + '/profiles/info', urlPart[2])
        .then(response => changeProfileInfo(JSON.parse(response)));

    function changeProfileInfo(changeProfileInfo) {
        console.log(changeProfileInfo);
        let userNameId = document.getElementById('login_user'); //div
        let userName = document.createElement('td');  //p in div



        userName.innerHTML = changeProfileInfo[0]['name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="userName"></button>';
        userNameId.appendChild(userName);


        document.getElementById('userName').onclick = function () {

            userName.innerHTML = "<input type='text' id='userNameInput' value='" + changeProfileInfo[0]['name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='userNameButton'></button>";

            document.getElementById('userNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/profiles/changeUserName", urlPart[2], document.getElementById('userNameInput').value);
                location.reload();
            }
        };


        let passwordId = document.getElementById('Pass_user'); //div
        let password = document.createElement('td');  //p in div



        password.innerHTML = "**********************"+
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="password"></button>';
        passwordId.appendChild(password);


        document.getElementById('password').onclick = function () {

            password.innerHTML = "<input type='password' id='passwordInput'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='passwordButton'></button>";

            document.getElementById('passwordButton').onclick = function () {
                jsonPostEdit(location.origin + "/profiles/changeUserPassword", urlPart[2], document.getElementById('passwordInput').value);
                location.reload();
            }
        };

        let emailId = document.getElementById('Mail_user'); //div
        let email = document.createElement('td');  //p in div



        email.innerHTML = changeProfileInfo[0]['email']+
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="email"></button>';
        emailId.appendChild(email);


        document.getElementById('email').onclick = function () {

            email.innerHTML = "<input type='text' id='emailInput' value='" + changeProfileInfo[0]['email'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='emailButton'></button>";

            document.getElementById('emailButton').onclick = function () {
                jsonPostEdit(location.origin + "/profiles/changeUserEmail", urlPart[2], document.getElementById('emailInput').value);
                location.reload();
            }
        };



    }













});
