$(".delete_user").click(function () { 
    var user_id = $(this).val();
    swal({
    title: "Are you sure?",
    text: "Do you want to delete User permanently",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          location=`users.php?delete=${user_id}`
      }
      });
    });
    $(".change_status").click(function () { 
    var user_id = $(this).val();
    swal({
    title: "Are you sure?",
    text: "Do you want to delete User permanently",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        location=`users.php?status=${user_id}`
    }
    });
});