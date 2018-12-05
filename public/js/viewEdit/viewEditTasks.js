document.addEventListener("DOMContentLoaded", function (event) {

    jsonPost(location.origin + '/tasks/getTaskInfo', urlPart[3])
        .then(response => changeTaskInfo(JSON.parse(response)));

    function changeTaskInfo(taskInfo) {
        //task name
        console.log(taskInfo);
        a = taskInfo
        let nameTaskId = document.getElementById('name_task'); //div
        let nameTask = document.createElement('td');
        nameTask.innerHTML = taskInfo[0][0]['task_name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="nameTask"></button>';
        nameTaskId.appendChild(nameTask);


        document.getElementById('nameTask').onclick = function () {

            nameTask.innerHTML = "<input type='text' id='taskNameInput' value='" + taskInfo[0][0]['task_name']  + "'>" +
                "<button class ='btn btn-link  glyphicon glyphicon-floppy-saved' id='taskNameButton'></button>";

            document.getElementById('taskNameButton').onclick = function () {
                jsonPostEdit(location.origin + "/task/ChangeName", urlPart[3], document.getElementById('employNameInput').value);
                location.reload();
            }
        };






        //task description
        let taskDesciptionId = document.getElementById('description_task'); //div
        let taskDesciption= document.createElement('td');
        taskDesciption.innerHTML = taskInfo[0][0]['description'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskDesciption"></button>';
        taskDesciptionId.appendChild(taskDesciption);

        //task dead_line
        let taskDeadLineId = document.getElementById('dead_line_task'); //div
        let taskDeadLine = document.createElement('td');
        taskDeadLine.innerHTML = taskInfo[0][0]['dead_line'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskDesciption"></button>';
        taskDeadLineId.appendChild(taskDeadLine);

        //task customer
        let taskCustomerId = document.getElementById('customer'); //div
        let taskCustomer= document.createElement('td');
        taskCustomer.innerHTML = taskInfo[0][0]['name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskCustomer"></button>';
        taskCustomerId.appendChild(taskCustomer);

        //task doer
        let taskDoerId = document.getElementById('doer'); //div
        let taskDoer= document.createElement('td');
        taskDoer.innerHTML = taskInfo[1][0]['name'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskDoer"></button>';
        taskDoerId.appendChild(taskDoer);

        //task doers_report
        let taskDoerReportId = document.getElementById('report'); //div
        let taskDoerReport= document.createElement('td');
        taskDoerReport.innerHTML = taskInfo[0][0]['doers_report'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskDoer"></button>';
        taskDoerReportId.appendChild(taskDoerReport);

        //done or no
        let DoneId = document.getElementById('done'); //div
        let Done = document.createElement('td');
        Done.innerHTML = taskInfo[0][0]['task_completed'] +
            '   <button class=\'btn btn-link  glyphicon glyphicon-pencil\' id="taskDoer"></button>';
        DoneId.appendChild(Done);


    }








});