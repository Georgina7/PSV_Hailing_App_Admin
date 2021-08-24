var firebaseConfig = {
    apiKey: "AIzaSyAlUP4hytIAMtzBMfWQL0Eb8QwytcBWGZk",
    authDomain: "psvhailingapp.firebaseapp.com",
    databaseURL: "https://psvhailingapp-default-rtdb.firebaseio.com",
    projectId: "psvhailingapp",
    storageBucket: "psvhailingapp.appspot.com",
    messagingSenderId: "917593455964",
    appId: "1:917593455964:web:5d57f01b1247dc5ef11599",
    measurementId: "G-LKEWJ11K47"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  console.log("Firebase Started");
  function login(){
        let email = document.getElementById('email_login').value;
        let password = document.getElementById('password_login').value;
        firebase.auth().signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Signed in
        var user = userCredential.user;
        console.log("Successful Login");
        location.href=" Dashboard.php"
        document.getElementById("admin_name").innerHTML = user.displayName;
        
        // ...
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
      });
  }

  function register(){
      firebase.auth().createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Signed in 
        var user = userCredential.user;
        // ...
      })
      .catch((error) => {
        var errorCode = error.code;
        var errorMessage = error.message;
        // ..
      });

  }

  function logout(){
    let xmlhttp1= new XMLHttpRequest();
    xmlhttp1.onreadystatechange= function() {
        if (this.readyState==4 && this.status==200) {
            firebase.auth().signOut().then(() => {
            // Sign-out successful.
            console.log("Logged Out")
            location.href="Login.php"
          }).catch((error) => {
            // An error happened.
            console.log("Not Logged Out");
          });
        }
    };
    xmlhttp1.open("POST","Logic.php",true);
    xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data1 = "&type=logoutAdmin";
    xmlhttp1.send(data1);
}

// function addUser() {
//     let admin = require("firebase-admin");
//   admin.initializeApp(firebaseConfig);
//   let nEmail = document.getElementById('new_email').value;
//   let nFullName = document.getElementById('new_name').value;
//   let nNumber = document.getElementById('new_number').value;
//   let nProfilePhotoPath = "";
//     //import admin SDK
//     admin.auth().createUser({
//     phoneNumber: (nNumber)
//     }).then((userCredential) => {
//           console.log('Successfully created new user:', userCredential.uid);
//     }).catch((error) => {
//     console.log('Error creating new user:', error);
//   });

//   // firebase.database().ref('Users/'+userID).set({
//   //   email:nEmail,
//   //   fullName:nFullName,
//   //   number:nNumber,
//   //   profileImagePath:nProfilePhotoPath
//   // });
// }