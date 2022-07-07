// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
        dom: "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",
        lengthMenu: [
            [5, 10, 25, -1],
            [5, 10, 25, 'All'],
        ],
        columnDefs: [
          {
              targets: 0,
              className: 'text-center'
          }
        ],
    });

    $('#dtCompleted').DataTable({
      dom: "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",
      lengthMenu: [
          [5, 10, 25, -1],
          [5, 10, 25, 'All'],
      ],
      columnDefs: [
        {
            targets: 0,
            className: 'text-center'
        }
      ],
    });

    // Add minus icon for collapse element which
    // is open by default
    $(".collapse.show").each(function () {
      $(this).prev(".card-header").find(".fa")
          .addClass("fa-angle-up").removeClass("fa-angle-down");
    });
    // Toggle plus minus icon on show hide
    // of collapse element
    $(".collapse").on('show.bs.collapse', function () {
        $(this).prev(".card-header").find(".fa")
            .removeClass("fa-angle-down").addClass("fa-angle-up");
    }).on('hide.bs.collapse', function () {
        $(this).prev(".card-header").find(".fa")
            .removeClass("fa-angle-up").addClass("fa-angle-down");
    });
});

$('input[type="checkbox"]').click(function(){
  if($(this).prop("checked") == true){
      $( "#completedForm"+$("input[type='checkbox']:checked").val() ).submit();
  }
  else if($(this).prop("checked") == false){
  }
});
