$('#formLogin').on('submit', login);

function login(e) {
  e.preventDefault();
  var formData = $("#formLogin").serializeArray();
  $.ajax({
    type: "POST",
    url: "./src/library/loginManager.php",
    cache: false,
    data: formData,
    success: function () {
      $('.text-danger').text('');
      window.location.href = "./src/dashboard.php";
    },
    error: function () {
      $('.text-danger').text('Wrong email or password');
    }
  });
}
