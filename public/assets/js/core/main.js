// $('.show_confirm').click(function(event) {
//           var form =  $(this).closest("form");
//           var name = $(this).data("name");
//           event.preventDefault();
//           swal({
//               title: `Bạn có chắc chắn muốn xoá bản ghi này`,
//               text: "Nếu bạn xoá dữ liệu sẽ mất vĩnh viễn",
//               icon: "warning",
//               buttons: true,
//               dangerMode: true,
//           })
//           .then((willDelete) => {
//             if (willDelete) {
//               form.submit();
//             }
//           });
//       });
 $('.show_confirm').click(function(e) {
        if(!confirm('Bạn có chắc chắn muốn xoá bản ghi này?')) {
            e.preventDefault();
        }
    });