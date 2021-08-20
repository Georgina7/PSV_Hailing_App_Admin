const edit_modal = document.getElementById('edit_modal');
//const edit_modal_driver = document.getElementById('edit_modal_driver');
const add_modal = document.getElementById('add_modal');

function userEditModal(userID){
    let xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            //console.log("Ndio hii: " + this.responseText);
            let userObject = JSON.parse(this.responseText);
            document.querySelector("#edit_name").value = userObject.fullName;
            document.querySelector("#edit_phone_number").value = userObject.number;
            document.querySelector("#edit_email").value = userObject.email;
            document.querySelector("#user_id").value = userID;
            edit_modal.classList.remove('hidden');
			edit_modal.classList.add('flex');
        }
    };
    xmlhttp.open("POST","Logic.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = "user_id=" + userID + "&type=getUserData";
    xmlhttp.send(data);
	//console.log(userID);
	
}
function addModal() {
    add_modal.classList.remove('hidden');
	add_modal.classList.add('flex'); 
}

function closeAddModal(){
	add_modal.classList.remove('flex');
	add_modal.classList.add('hidden');
}

function closeEditModal(){
	edit_modal.classList.remove('flex');
	edit_modal.classList.add('hidden');
}

$(document).ready(function(){
    $('#userEdit').submit(function(event){
        event.preventDefault();
        //clearMessageField();
        let formData = new FormData($(this)[0]);
        console.log(formData);
        formData.append("type","updateUser");
        let formEmpty = false;
        for(var value of formData.entries()){
            formEmpty = (value[1] == "")? true:false;
        }
        if (!formEmpty) {
        	//console.log("All fields present");
            $.ajax({
                url:'Logic.php',
                enctype:'multipart/form-data',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                	$("#userEdit_success").text("Update Successful");
                	//setTimeout(function(){ location.reload(); }, 1400);
                    // if (data=="Successful") {
                    // 	console.log("Successful");
                    //     // setTimeout(function(){ location.reload(); }, 1400);
                    //     // $("#eventEdit_success").text("Event Updated Successfully");
                    // } else {
                    //     // $("#eventEdit_error").text(data);
                    //     console.log("Unsuccessful");
                    // }
                },
                error: function (e) {
                    alert(e.responseText);
                    console.log("ERROR : ", e);
                }     
            });
        }else{
            // $(".error").text("All fields are required");
            console.log("All fields are required");
        }
    });
});
$(document).ready(function () {
    $('#userAdd').submit(function (event1) {
        event1.preventDefault();
        //clearMessageField();
        let formData1 = new FormData($(this)[0]);
        console.log(formData1);
        formData1.append("type","createUser");
        let formEmpty1 = false;
        for(var value1 of formData1.entries()){
            formEmpty1 = (value1[1] == "")? true:false;
        }
        if(!formEmpty1){
            $.ajax({
                url:'Logic.php',
                enctype:'multipart/form-data',
                data:formData1,
                processData: false,
                contentType: false,
                type: 'POST',
                success:function (values) {
                    $("#userAdd_success").text("User Created Successfully!");
                },
                error: function (e) {
                    alert(e.responseText);
                    console.log("ERROR : ", e);
                }     
            });
        }else{
            // $(".error").text("All fields are required");
            console.log("All fields are required");
        }
        
    });
    
});


//Driver
$(document).ready(function () {
    $('#driverAdd').submit(function (eventDriver) {
        eventDriver.preventDefault();
        //clearMessageField();
        let formDataDriver = new FormData($(this)[0]);
        console.log(formDataDriver);
        formDataDriver.append("type","createDriver");
        let formEmptyDriver = false;
        for(var valueDriver of formDataDriver.entries()){
            formEmptyDriver = (valueDriver[1] == "")? true:false;
        }
        if(!formEmptyDriver){
            $.ajax({
                url:'Logic.php',
                enctype:'multipart/form-data',
                data:formDataDriver,
                processData: false,
                contentType: false,
                type: 'POST',
                success:function (values) {
                    $("#driver_add_success").text("Driver Created Successfully!");
                },
                error: function (e) {
                    alert(e.responseText);
                    console.log("ERROR : ", e);
                }     
            });
        }else{
            // $(".error").text("All fields are required");
            console.log("All fields are required");
        }
        
    });
    
});
