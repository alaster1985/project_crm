document.addEventListener("DOMContentLoaded", function (event) {


    jsonPost(location.origin + '/groups/getGroupInformation', urlPart[3])
        .then(response => change_groupInfo(JSON.parse(response)));

    function change_groupInfo(groupInfo) {
        console.log(groupInfo);
        let groupNameId = document.getElementById('name_group'); //div
        let groupName = document.createElement('td');  //p in div



        groupName.innerHTML = groupInfo[0]['group_name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="groupName"></button>';
        groupNameId.appendChild(groupName);


        document.getElementById('groupName').onclick = function () {

            groupName.innerHTML = "<input type='text' id='groupNameInput' value='" + groupInfo[0]['group_name'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='groupNameButton'></button>";

            document.getElementById('groupNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/groups/groupNameChange", urlPart[3], document.getElementById('groupNameInput').value);
                location.reload();
            }
        };

        let groupDirectionId = document.getElementById('direction_group'); //div
        let groupDirection = document.createElement('td');  //p in div



        groupDirection.innerHTML = groupInfo[0]['direction'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="groupDirection"></button>';
        groupDirectionId.appendChild(groupDirection);

        document.getElementById('groupDirection').onclick = function () {

            document.getElementById('direction_group').innerHTML = "<select class=\"form-control\" id=" + 'groupDirectionSelect' + "></select><button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='groupDirectionSel'></button>";

            httpGet(location.origin + "/direction")
                .then(response => selectDirections(JSON.parse(response)));

            function selectDirections(extData) {
                for (let gr = 0; gr < extData.length; gr++) {
                    let selectOption = new Option(extData[gr]['direction']);
                    document.getElementById('groupDirectionSelect').appendChild(selectOption)
                }
            }

            document.getElementById('groupDirectionSel').onclick = function () {
                var result = [];
                resultCounterId = [];
                var opt;
                for (let i = 0; i < document.getElementById('groupDirectionSelect').options.length; i++) {
                    opt = document.getElementById('groupDirectionSelect').options[i];
                    if (opt.selected) {
                        result.push(opt.value || opt.text);
                        resultCounterId.push(document.getElementById('groupDirectionSelect').options[i].index + 1);
                    }
                }
                console.log(resultCounterId);
                jsonPostEdit(location.origin + "/groups/changeGroupsDirection", urlPart[3], resultCounterId[0]);
                location.reload();
            }
        }
        let groupStartDateId = document.getElementById('start_date_group'); //div
        let groupStartDate= document.createElement('td');  //p in div

        groupStartDate.innerHTML = groupInfo[0]['start_date'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="groupStartDate"></button>';
        groupStartDateId.appendChild(groupStartDate);


        document.getElementById('groupStartDate').onclick = function () {

            groupStartDate.innerHTML = "<input type='date' id='groupStartDateInput' value='" + groupInfo[0]['start_date'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='groupStartDateButton'></button>";

            document.getElementById('groupStartDateButton').onclick = function () {
                jsonPostEdit(location.origin + "/groups/ChangeStartDate", urlPart[3], document.getElementById('groupStartDateInput').value);
                location.reload();
            }
        };


        let groupEndDateId = document.getElementById('finish_date_group'); //div
        let groupEndDate= document.createElement('td');  //p in div



        groupEndDate.innerHTML = groupInfo[0]['finish_date'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="groupEndDate"></button>';
        groupEndDateId.appendChild(groupEndDate);


        document.getElementById('groupEndDate').onclick = function () {

            groupEndDate.innerHTML = "<input type='date' id='groupEndDateInput' value='" + groupInfo[0]['finish_date'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='groupEndDateButton'></button>";

            document.getElementById('groupEndDateButton').onclick = function () {
                jsonPostEdit(location.origin + "/groups/ChangeEndDate", urlPart[3], document.getElementById('groupEndDateInput').value);
                location.reload();
            }
        };




        let HomecomingDateId = document.getElementById('homecoming_date_group'); //div
        let HomecomingDate= document.createElement('td');  //p in div



        HomecomingDate.innerHTML = groupInfo[0]['homecoming_date'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="HomecomingDate"></button>';
        HomecomingDateId.appendChild(HomecomingDate);


        document.getElementById('HomecomingDate').onclick = function () {

            HomecomingDate.innerHTML = "<input type='date' id='HomecomingDateInput' value='" + groupInfo[0]['homecoming_date'] + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='HomecomingDateButton'></button>";

            document.getElementById('HomecomingDateButton').onclick = function () {
                jsonPostEdit(location.origin + "/groups/ChangeHomecomingDate", urlPart[3], document.getElementById('HomecomingDateInput').value);
                location.reload();
            }
        };




    }






});