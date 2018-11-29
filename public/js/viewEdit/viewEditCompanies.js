document.addEventListener("DOMContentLoaded", function (event) {


    jsonPost(location.origin + '/company/getCompanyName', urlPart[3])
        .then(response => change_CompanyNameAddress(JSON.parse(response)));

    function change_CompanyNameAddress(companyNameAddress) {
        // console.log(companyNameAddress);
        let employNameId = document.getElementById('name_company'); //div
        let employAddressId = document.getElementById('address_company');//div
        let employName = document.createElement('td');  //p in div
        let employAddress = document.createElement('td');  //p in div
        let companyCommentId = document.getElementById('company_comment');
        let companyName = document.createElement('td');

        employName.innerHTML = companyNameAddress[0]['company_name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employName"></button>';
        employAddress.innerHTML = companyNameAddress[0]['address'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="employAddress"></button>';
        companyCommentId.innerHTML = companyNameAddress[0]['comment'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="companyAddress"></button>';

        companyCommentId.append(companyName);
        employNameId.appendChild(employName);
        employAddressId.appendChild(employAddress);
        document.getElementById('employName').onclick = function () {

            employName.innerHTML = "<input type='text' id='employNameInput' value='" + companyNameAddress[0]['company_name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employNameButton'></button>";

            document.getElementById('employNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeName", urlPart[3], document.getElementById('employNameInput').value);
                location.reload();
            }
        };
        document.getElementById('employAddress').onclick = function () {
            employAddress.innerHTML = "<input type='text' id='employAddressInput' value='" + companyNameAddress[0]['address'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='employAddressButton'></button>";

            document.getElementById('employAddressButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeAddress", urlPart[3], document.getElementById('employAddressInput').value);
                location.reload();
            }
        }


        document.getElementById('companyAddress').onclick = function () {
            companyCommentId.innerHTML = "<input type='text' id='companyCommentInput' value='" + companyNameAddress[0]['comment'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='companyCommentButton'></button>";

            document.getElementById('companyCommentButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeComment", urlPart[3], document.getElementById('companyCommentInput').value);
                location.reload();
            }
        }
    }

    jsonPost(location.origin + '/company/getCompanyStack', urlPart[3])
        .then(response => change_CompanyStack(JSON.parse(response)));

    function change_CompanyStack(companyStack) {
        //change stack comment
        console.log(companyStack);
        let stackCommentId = document.getElementById('comment_company');
        let stackComment = document.createElement('td');

        stackComment.innerHTML = companyStack[0]['comment'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="ButtonStackComment"></button>';

        stackCommentId.appendChild(stackComment);


        document.getElementById('ButtonStackComment').onclick = function () {
            stackComment.innerHTML = "<input type='text' id='StackComment' value='" + companyStack[0]['comment'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='StackCommentButton'></button>";

            document.getElementById('StackCommentButton').onclick = function () {
                jsonPostEdit(location.origin + "/company/ChangeCommentStack", urlPart[3], document.getElementById('StackComment').value);
                location.reload();
            }
        }

        //change stack


        var stackId= [];

        for (i = 0; i < companyStack.length; i++) {

            var stack = document.createElement('a');
            stack.innerHTML = companyStack[i]['stack_name'] + ' ';
            stack.id = 'companyStack';
            document.getElementById('stack_company').appendChild(stack);
            //GroupId[i] = skills[i]['skillGroupId'];
        }
        let stack_button = document.createElement('button');
        stack_button.id = 'StackButton';
        stack_button.className='btn btn-link  glyphicon glyphicon-pencil';
        document.getElementById('stack_company').appendChild(stack_button);


        document.getElementById('stackButton').onclick = function () {
            document.getElementById('companyStack').innerHTML = "<sel" +
                "\]ect class=\"form-control\" id=" + 'stSelect' + " size=\"4\" name=\"skill_id[]\" multiple></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='stSkills'></button>";
            httpGet(location.origin + "/stacks")
                .then(response => selectSkills(JSON.parse(response)));

            function selectSkills(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['stack_name']);
                    document.getElementById('companyStack').appendChild(selectOption)
                }
            }

            document.getElementById('stSkills').onclick = function () {
                var result = [];
                var resultCounterId = [];
                var opt;
                for (let i = 0; i < document.getElementById('stSkillsSelect').options.length; i++) {
                    opt = document.getElementById('stSkillsSelect').options[i];
                    if (opt.selected) {
                        result.push(opt.value || opt.text);
                        resultCounterId.push(document.getElementById('stSkillsSelect').options[i].index + 1);
                    }
                }
                // console.log(result);
                jsonPostEdit(location.origin + "/students/ChangeSkills", urlPart[3], result, resultCounterId);
                location.reload();
            }
        }
    }




});