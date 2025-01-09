$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        

        let email = $('#email').val();
        let password = $('#password').val();
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        if (password.length < 6) {
            alert('Password must be at least 6 characters long.');
            return;
        }

        alert('Form submitted successfully!');
        // Here you can add code to send form data to the server if needed




        // navber start
         function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }


  
});

    });

