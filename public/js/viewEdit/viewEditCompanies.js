document.addEventListener("DOMContentLoaded", function (event) {


    jsonPost(location.origin + '/company/getCompanyName', urlPart[3])
        .then(response => change_CompanyNameAddress(JSON.parse(response)));

    function change_CompanyNameAddress(companyNameAddress) {
        console.log(companyNameAddress);
        let employNameId = document.getElementById('name_company'); //div
        let employAddressId = document.getElementById('address_company');//div
        let employName = document.createElement('td');  //p in div
        let employAddress = document.createElement('td');  //p in div


        employName.innerHTML = companyNameAddress[0]['company_name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employName"></button>';
        employAddress.innerHTML = companyNameAddress[0]['address'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employAddress"></button>';

        employNameId.appendChild(employName);
        employAddressId.appendChild(employAddress);
        document.getElementById('employName').onclick = function () {

            employName.innerHTML = "<input type='text' id='employNameInput' value='" + companyNameAddress[0]['company_name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employNameButton'></button>";

            document.getElementById('employNameButton').onclick = function () {
                jsonPostEdit(location.origin + "company/ChangeName", urlPart[3], document.getElementById('employNameInput').value);
                 location.reload();
            }
        };
        document.getElementById('employAddress').onclick = function () {
            employAddress.innerHTML = "<input type='text' id='employAddressInput' value='" + companyNameAddress[0]['address'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employAddressButton'></button>";

            document.getElementById('employAddressButton').onclick = function () {
                jsonPostEdit(location.origin + "/students/ChangeAddress", urlPart[3], document.getElementById('employAddressInput').value);
                location.reload();
            }
        }
    }


    // companyNameAddress


});