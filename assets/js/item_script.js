$(".item_del").click(function () { 
    var item_id = $(this).val();
    swal({
    title: "Are you sure?",
    text: "Do you want to delete This Item permanently",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          location=`manage_order.php?delete_item=${item_id}`
      }
      });
    });