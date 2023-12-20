const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
menuBtn.onclick = ()=>{
    navbar.classList.add("show");
    menuBtn.classList.add("hide");
    body.classList.add("disabled");
}
cancelBtn.onclick = ()=>{
    body.classList.remove("disabled");
    navbar.classList.remove("show");
    menuBtn.classList.remove("hide");
}
window.onscroll = ()=>{
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}

// Function to send the message
function Send() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;

    // Validation for name: Should not be empty
    if (name.trim() === '') {
      swal("Invalid Name", "Please enter your name.", "error");
      return;
    }

    // Validation for email: Should be a valid email address
    if (!validateEmail(email)) {
      swal("Invalid Email", "Please enter a valid email address.", "error");
      return;
    }

    // Validation for subject: Should not be empty
    if (subject.trim() === '') {
      swal("Invalid Subject", "Please enter a subject.", "error");
      return;
    }

    // Validation for message: Should not be empty
    if (message.trim() === '') {
      swal("Invalid Message", "Please enter your message.", "error");
      return;
    }

    var body = "Name: " + name + "<br/> Email: " + email + "<br/> Message: " + message;

    Email.send({
      SecureToken: "a61f9ed3-4369-4038-abcd-c975d0c32371",
      To: 'briti7751@gmail.com',
      From: 'briti7751@gmail.com',
      Subject: subject,
      Body: body
    }).then(function (message) {
      if (message === "OK") {
        swal("Message Sent!", "Your Data Received Successfully.", "success");
        // Clear the form fields after successful submission
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('subject').value = '';
        document.getElementById('message').value = '';
      } else {
        swal("Something Went Wrong!", "Your Data is Not Received.", "error");
      }
    });
  }

  // Email validation function
  function validateEmail(email) {
    // Regular expression to check if the email is in a valid format
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }

  // Add an event listener to the submit button
  document.getElementById('submit-button').addEventListener('click', Send);