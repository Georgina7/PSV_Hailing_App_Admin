const edit_modal = document.getElementById('edit_modal');
//const edit_modal_driver = document.getElementById('edit_modal_driver');
const add_modal = document.getElementById('add_modal');
const disable_modal = document.getElementById('disable_user_modal');
const enable_modal = document.getElementById('enable_user_modal');
const driver_disable_modal = document.getElementById('driver_disable_user_modal');
const driver_enable_modal = document.getElementById('driver_enable_user_modal');
// const disable_btn = document.getElementById('disable_btn');
// const enable_btn = document.getElementById('enable_btn');
const disable_success_msg = document.getElementById('disable_success_message');
const enable_success_msg = document.getElementById('enable_success_message');
const driver_disable_success_msg = document.getElementById('driver_disable_success_message');
const driver_enable_success_msg = document.getElementById('driver_enable_success_message');
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
function disableUser(userID){
    let xmlhttp1= new XMLHttpRequest();
    xmlhttp1.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            document.querySelector("#user_id").value = userID;
            disable_modal.classList.remove('hidden');
			disable_modal.classList.add('flex');
            disable_success_msg.classList.remove('hidden');
        }
    };
    xmlhttp1.open("POST","Logic.php",true);
    xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data1 = "user_id=" + userID + "&type=disableUserData";
    xmlhttp1.send(data1);
	//console.log(userID);
	
}
function disableDriver(userID){
    let xmlhttp1= new XMLHttpRequest();
    xmlhttp1.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            document.querySelector("#user_id").value = userID;
            driver_disable_modal.classList.remove('hidden');
			driver_disable_modal.classList.add('flex');
            driver_disable_success_msg.classList.remove('hidden');
        }
    };
    xmlhttp1.open("POST","Logic.php",true);
    xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data1 = "user_id=" + userID + "&type=disableDriver";
    xmlhttp1.send(data1);
	//console.log(userID);
	
}
// function disableUserConfirm(userID){
//     let xmlhttp1= new XMLHttpRequest();
//     xmlhttp1.onreadystatechange= function() {
//         if (this.readyState==4 && this.status==200) {
//             document.querySelector("#user_id").value = userID;
//             alert(userID);
//             disable_success_msg.classList.remove('hidden');
//             enable_btn.classList.remove('hidden');
//             disable_btn.classList.add('hidden');
//             // disable_success_msg.classList.add('hidden');
//         }
//     };
//     xmlhttp1.open("POST","Logic.php",true);
//     xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     let data1 = "user_id=" + userID + "&type=disableUser";
//     xmlhttp1.send(data1);
// 	//console.log(userID);
	
// }
function enableUser(userID){
    let xmlhttp1= new XMLHttpRequest();
    xmlhttp1.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            document.querySelector("#user_id").value = userID;
            enable_modal.classList.remove('hidden');
			enable_modal.classList.add('flex');
            enable_success_msg.classList.remove('hidden');
        }
    };
    xmlhttp1.open("POST","Logic.php",true);
    xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data1 = "user_id=" + userID + "&type=enableUser";
    xmlhttp1.send(data1);
	//console.log(userID);
	
}
function enableDriver(userID){
    let xmlhttp1= new XMLHttpRequest();
    xmlhttp1.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            document.querySelector("#user_id").value = userID;
            driver_enable_modal.classList.remove('hidden');
			driver_enable_modal.classList.add('flex');
            driver_enable_success_msg.classList.remove('hidden');
        }
    };
    xmlhttp1.open("POST","Logic.php",true);
    xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data1 = "user_id=" + userID + "&type=enableDriver";
    xmlhttp1.send(data1);
	//console.log(userID);
	
}
// function enableUserConfirm(userID){
//     let xmlhttp1= new XMLHttpRequest();
//     xmlhttp1.onreadystatechange= function() {
//         if (this.readyState==4 && this.status==200) {
//             document.querySelector("#user_id").value = userID;
//             enable_success_msg.classList.remove('hidden');
//             enable_btn.classList.add('hidden');
//             disable_btn.classList.remove('hidden');
//             enable_success_msg.classList.add('hidden');
//         }
//     };
//     xmlhttp1.open("POST","Logic.php",true);
//     xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     let data1 = "user_id=" + userID + "&type=enableUser";
//     xmlhttp1.send(data1);
// 	//console.log(userID);
	
// }
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
function closeDisableModal(){
	disable_modal.classList.remove('flex');
	disable_modal.classList.add('hidden');
    disable_success_msg.classList.add('hidden');
    location.reload();
}
function closeEnableModal(){
	enable_modal.classList.remove('flex');
	enable_modal.classList.add('hidden');
    disable_success_msg.classList.add('hidden');
    location.reload();
}
function closeDriverDisableModal(){
	driver_disable_modal.classList.remove('flex');
	driver_disable_modal.classList.add('hidden');
    driver_disable_success_msg.classList.add('hidden');
    location.reload();
}
function closeDriverEnableModal(){
	driver_enable_modal.classList.remove('flex');
	driver_enable_modal.classList.add('hidden');
    driver_disable_success_msg.classList.add('hidden');
    location.reload();
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
                    location.reload();
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
                    location.reload();
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
                    location.reload();
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

// //register admin
// $(document).ready(function () {
//     $('#adminRegister').submit(function (e) {
//         e.preventDefault();
//         //clearMessageField();
//         let formDataAdmin = new FormData($(this)[0]);
//         console.log(formDataAdmin);
//         formDataAdmin.append("type","createAdmin");
//         let formEmptyAdmin = false;
//         for(var valueAdmin of formDataAdmin.entries()){
//             formEmptyAdmin = (valueAdmin[1] == "")? true:false;
//         }
//         if(!formEmptyAdmin){
//             $.ajax({
//                 url:'Logic.php',
//                 enctype:'multipart/form-data',
//                 data:formDataAdmin,
//                 processData: false,
//                 contentType: false,
//                 type: 'POST',
//                 success:function (values) {
                   
//                 },
//                 error: function (e) {
//                     alert(e.responseText);
//                     console.log("ERROR : ", e);
//                 }     
//             });
//         }else{
//             // $(".error").text("All fields are required");
//             console.log("All fields are required");
//         }
        
//     });
    
// });

//filter users
function filterUsers() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search_users");
  filter = input.value.toUpperCase();
  table = document.getElementById("users_table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

//filter users
function filterDrivers() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search_drivers");
  filter = input.value.toUpperCase();
  table = document.getElementById("drivers_table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
