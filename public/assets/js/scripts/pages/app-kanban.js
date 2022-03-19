
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var kanban_board_data;

function index(){
   $.ajax({
      type: "post",
      url: '/api/kanban/index',
      async: false,
      data: {
        project_id: $('#project_id').val(),
      }
    }).done(function(resp) {
       kanban_board_data = resp.data;
       console.log(kanban_board_data);
    });
}



$(function () {
  'use strict';
  var kanban_curr_el, kanban_curr_item_id, kanban_item_title, kanban_data, kanban_item, kanban_users;
  index();
  // Kanban Board and Item Data passed by json
  //Khai báo dữ liệu kanban mẫu. Thực tế sẽ dùng ajax để push dữ liệu vào biến kanban_board_data
  

  // console.log('kanban', kanban_board_data);


  // Kanban Board
  var KanbanExample = new jKanban({
    element: "#kanban-wrapper", // selector of the kanban container
    itemAddOptions: {
      enabled: true,                                              // add a button to board for easy item creation
      content: '+ Thêm thẻ mới',                                                // text or html content of the board button
      class: 'kanban-title-button btn btn-default btn-xs',         // default class of the button
      footer: true                                                // position the button on footer
    },

    // click on current kanban-item
    click: function (el) {
      //Bật side bar khi click 1 card 
      // $(".kanban-overlay").addClass("show");
      // $(".kanban-sidebar").addClass("show");

      //bật modal info card
      $('#exampleModal').modal();
      let list_id = $(el).attr("data-list_id");
      $('#list_id').val(list_id);
      let card_eid = $(el).data("eid");
      let card_id = $(el).data("id");
      if(card_eid !== "undefined"){
        $('#card_id').val(card_eid);
        card_detail(card_eid);
      }else{
        $('#card_id').val(card_id);
        card_detail(card_id);
      }
      
      // Set el to var kanban_curr_el, use this variable when updating title
      kanban_curr_el = el;

      // Extract  the kan ban item & id and set it to respective vars
      kanban_item_title = $(el).contents()[0].data;
      kanban_curr_item_id = $(el).attr("data-eid");

      // set edit title
      $(".edit-kanban-item .edit-kanban-item-title").val(kanban_item_title);
    },

    buttonClick: function (el, boardId) {
      // Xổ ra form tạo thêm 1 card
      var formItem = document.createElement("form");
      formItem.setAttribute("class", "itemform");
      //Bắn ra texarea nhập title card
      formItem.innerHTML =
        '<div class="form-group">' +
        '<textarea class="form-control add-new-item" rows="2" autofocus required></textarea>' +
        "</div>" +
        '<div class="form-group">' +
        '<button type="submit" class="btn btn-primary btn-sm mr-50">Xác nhận</button>' +
        '<button type="button" id="CancelBtn" class="btn btn-sm btn-danger">Huỷ</button>' +
        "</div>";

      // add new card on submit click
      KanbanExample.addForm(boardId, formItem);
      formItem.addEventListener("submit", function (e) {
        e.preventDefault();
        var text = e.target[0].value;
        KanbanExample.addElement(boardId, {
          title: text
        });
        formItem.parentNode.removeChild(formItem);
        add_card(boardId, text);
      });
      //Cancel add card
      $(document).on("click", "#CancelBtn", function () {
        $(this).closest(formItem).remove();
      })
    },
    addItemButton: true, // add a button to board for easy item creation
    boards: kanban_board_data // data passed from defined variable
  });

  function add_card(list_id, name){
      $.ajax({
        type: "post",
        url: '/api/kanban/create-card',
        data: {
          project_id: $('#project_id').val(),
          list_id: list_id,
          name: name
        }
      }).done(function(resp) {
        // 
        
      });
  }

  function card_detail(card_id){
      $.ajax({
        type: "post",
        url: '/api/kanban/card-detail',
        data: {
          card_id: card_id
        }
      }).done(function(resp) {
         let data = resp.data;
         $('input[name="name"]').val(data.name);
         $("#manager_id").val(data.manager_id).change();
         $("#status").val(data.status).change();
         $("#level").val(data.level).change();
         $("#intended_start_time").val(data.intended_start_time);
         $("#intended_end_time").val(data.intended_end_time);
         console.log('sub', data.subtask)
         $.each( data.subtask, function( index , value ) {
             let subtask_html = "";
             subtask_html = `<div class="row form-group" id="inputFormRow">
                                <input data-task_id="`+value.id+`" data-id="`+index+`" type="checkbox" class="checkbox-input check_task" style="margin-top: 4px; width: 25px; height: 25px;" id="checkbox1">
                                <div class="col-3">
                                <input id="subTaskName" type="" class="form-control" name="" value="`+value.name+`">
                                </div>
                                <div class="col-2">
                                 <select class="form-control select2" id="subTaskUser" name="user_id">    
                                  <option selected>Tien Dat</option>
                                   <option>Admin</option> 
                                </select>
                                </div>
                                 <div class="col-2">
                                <input type="datetime-local" class=" form-control" id="subTaskStart" name="" value="`+value.intended_start_time+`">
                                </div>
                                <div class="col-2">
                                <input type="datetime-local" class=" form-control" id="subTaskEnd" name="" value="`+value.intended_end_time+`">
                                </div>
                                <div class="col-1">
                                <button type="button" id="updateSubTask" data-task_id="" class="btn btn-outline-primary" style="position: absolute; bottom: 0;">Sửa</button>
                                </div>
                                <div class="col-1">
                                <button type="buttom" id="removeRow" class="btn btn-outline-danger" style="position: absolute; bottom: 0;">Huỷ</button>
                                </div>
                            </div>`;
             // subtask_html += '<div id="inputFormRow">';
             // subtask_html += '<div class="input-group mb-1">';
             // subtask_html += '<input type="checkbox" class="check_task" style="height: 35px; width:20px;" data-task_id="'+value.id+'" data-id="'+index+'">';
             // subtask_html += '<input type="text" name="subtask[]" data-is_db="1" id="input_'+index+'" required class="form-control m-input" placeholder="Enter title" autocomplete="off" value="'+value.name+'">';
             // subtask_html += '<div class="input-group-append">';
             // subtask_html += '<button id="removeRow" type="button" class="btn btn-outline-danger">Xoá</button>';
             // subtask_html += '</div>';
             // subtask_html += '</div>';
             $('#newRow').append(subtask_html);
         });
         
         
      });
  }

  // Add html for Custom Data-attribute to Kanban item
  var board_item_id, board_item_el, board_item_badge = "",board_item_users="",board_item_dueDate = "", board_item_comment="", board_item_attachment="",board_item_image="";
  // Kanban board(list) loop
  for (kanban_data in kanban_board_data) {
    // console.log('kanban_board_data', kanban_board_data);
    // Kanban board items (card) loop
    for (kanban_item in kanban_board_data[kanban_data].item) {
      var board_item_details = kanban_board_data[kanban_data].item[kanban_item]; // set item details
      board_item_id = $(board_item_details).attr("id"); // set 'id' attribute of kanban-item

      (board_item_el = KanbanExample.findElement(board_item_id)), // find element of kanban-item by ID
      (board_item_users = board_item_dueDate = board_item_comment = board_item_attachment = board_item_image = board_item_badge =
        " ");

      // check if users are defined or not and loop it for getting value from user's array
      if (typeof $(board_item_el).attr("data-users") !== "undefined") {
        for (kanban_users in kanban_board_data[kanban_data].item[kanban_item].users) {
          board_item_users +=
            '<li class="avatar pull-up my-0">' +
            '<img class="media-object rounded-circle" src=" ' +
            kanban_board_data[kanban_data].item[kanban_item].users[kanban_users] +
            '" alt="Avatar" height="24" width="24">' +
            "</li>";
        }
      }
      // check if dueDate is defined or not
      if (typeof $(board_item_el).attr("data-dueDate") !== "undefined") {
        board_item_dueDate =
          '<div class="kanban-due-date d-flex align-items-center mr-50">' +
          '<i class="bx bx-time-five font-size-small mr-25"></i>' +
          '<span class="font-size-small">' +
          $(board_item_el).attr("data-dueDate") +
          "</span>" +
          "</div>";
      }
      // check if comment is defined or not
      if (typeof $(board_item_el).attr("data-comment") !== "undefined") {
        board_item_comment =
          '<div class="kanban-comment d-flex align-items-center mr-50">' +
          '<i class="bx bx-message font-size-small mr-25"></i>' +
          '<span class="font-size-small">' +
          $(board_item_el).attr("data-comment") +
          "</span>" +
          "</div>";
      }
      // check if attachment is defined or not
      if (typeof $(board_item_el).attr("data-attachment") !== "undefined") {
        board_item_attachment =
          '<div class="kanban-attachment d-flex align-items-center">' +
          '<i class="bx bx-link-alt font-size-small mr-25"></i>' +
          '<span class="font-size-small">' +
          $(board_item_el).attr("data-attachment") +
          "</span>" +
          "</div>";
      }
      // check if Image is defined or not
      if (typeof $(board_item_el).attr("data-image") !== "undefined") {
        board_item_image =
          '<div class="kanban-image mb-1">' +
          '<img class="img-fluid" src=" ' +
          kanban_board_data[kanban_data].item[kanban_item].image +
          '" alt="kanban-image">';
        ("</div>");
      }
      // check if Badge is defined or not
      if (typeof $(board_item_el).attr("data-badgeContent") !== "undefined") {
        board_item_badge =
          '<div class="kanban-badge">' +
          '<div class="badge-circle badge-circle-sm badge-circle-light-' +
          kanban_board_data[kanban_data].item[kanban_item].badgeColor +
          ' font-size-small font-weight-bold">' +
          kanban_board_data[kanban_data].item[kanban_item].badgeContent +
          "</div>";
        ("</div>");
      }
      // add custom 'kanban-footer'
      if (
        typeof (
          $(board_item_el).attr("data-dueDate") ||
          $(board_item_el).attr("data-comment") ||
          $(board_item_el).attr("data-users") ||
          $(board_item_el).attr("data-attachment")
        ) !== "undefined"
      ) {
        $(board_item_el).append(
          '<div class="kanban-footer d-flex justify-content-between mt-1">' +
          '<div class="kanban-footer-left d-flex">' +
          board_item_dueDate +
          board_item_comment +
          board_item_attachment +
          "</div>" +
          '<div class="kanban-footer-right">' +
          '<div class="kanban-users">' +
          board_item_badge +
          '<ul class="list-unstyled users-list m-0 d-flex align-items-center">' +
          board_item_users +
          "</ul>" +
          "</div>" +
          "</div>" +
          "</div>"
        );
      }
      // add Image prepend to 'kanban-Item'
      if (typeof $(board_item_el).attr("data-image") !== "undefined") {
        $(board_item_el).prepend(board_item_image);
      }
    }
  }

  // Add new kanban board (list)
  //---------------------
  var addBoardDefault = document.getElementById("add-kanban");
  var i = 1;
  
  addBoardDefault.addEventListener("click", function () {
    KanbanExample.addBoards([{
      id: i, // generate random id for each new kanban
      title: "Default Title"
    }]);

     $.ajax({
        type: "post",
        url: '/api/kanban/create-board',
        dataType: 'JSON',
        async: false,
        data: {
          project_id: $('#project_id').val(),
          name: "Default Title"
        }
      }).done(function(resp) {
        i = resp.data.id;
      });
   
    var kanbanNewBoard = KanbanExample.findBoard(i)
    
    if (kanbanNewBoard) {
      $(".kanban-title-board").on("mouseenter", function () { //over chuộht lên board title
        $(this).attr("contenteditable", "true");
        $(this).addClass("line-ellipsis");
      });
      var kanbanNewBoardData =
        '<div class="dropdown">' +
        '<div class="dropdown-toggle cursor-pointer" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></div>' +
        '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"> ' +
        '<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-link mr-50"></i>Copy Link</a>' +
        '<a class="dropdown-item kanban-delete" id="kanban-delete" href="javascript:void(0);"><i class="bx bx-trash mr-50"></i>Delete</a>' +
        "</div>" + "</div>";
      var kanbanNewDropdown = $(kanbanNewBoard).find("header");
      $(kanbanNewDropdown).append(kanbanNewBoardData);
    }
    i++;

  });

  // Delete kanban board
  //---------------------
  $(document).on("click", ".kanban-delete", function (e) {
    var $id = $(this)
      .closest(".kanban-board")
      .attr("data-id");
    addEventListener("click", function () {
      KanbanExample.removeBoard($id);
    });
  });

  // Kanban board dropdown
  // ---------------------

  var kanban_dropdown = document.createElement("div");
  kanban_dropdown.setAttribute("class", "dropdown");

  dropdown();

  function dropdown() {
    kanban_dropdown.innerHTML =
      '<div class="dropdown-toggle cursor-pointer" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></div>' +
      '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"> ' +
      '<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-link-alt mr-50"></i>Copy Link</a>' +
      '<a class="dropdown-item kanban-delete" id="kanban-delete" href="javascript:void(0);"><i class="bx bx-trash mr-50"></i>Delete</a>' +
      "</div>";
    if (!$(".kanban-board-header div").hasClass("dropdown")) {
      $(".kanban-board-header").append(kanban_dropdown);
    }
  }

  // Kanban-overlay and sidebar hide
  // --------------------------------------------
  $(
    ".kanban-sidebar .delete-kanban-item, .kanban-sidebar .close-icon, .kanban-sidebar .update-kanban-item, .kanban-overlay"
  ).on("click", function () {
    $(".kanban-overlay").removeClass("show");
    $(".kanban-sidebar").removeClass("show");
  });

  // Updating Data Values to Fields
  // -------------------------------
  $(".update-kanban-item").on("click", function (e) {
    // var $edit_title = $(".edit-kanban-item .edit-kanban-item-title").val();
    // $(kanban_curr_el).txt($edit_title);
    e.preventDefault();
  });

  // Delete Kanban Item
  // -------------------
  $(".delete-kanban-item").on("click", function () {
    $delete_item = kanban_curr_item_id;
    addEventListener("click", function () {
      KanbanExample.removeElement($delete_item);
    });
  });

  // Kanban Quill Editor
  // -------------------
  var composeMailEditor = new Quill(".snow-container .compose-editor", {
    modules: {
      toolbar: ".compose-quill-toolbar"
    },
    placeholder: "Write a Comment... ",
    theme: "snow"
  });

  // Making Title of Board editable
  // ------------------------------
  $(".kanban-title-board").on("mouseenter", function () {  //đặt chuột lên title board
    $(this).attr("contenteditable", "true");
    $(this).addClass("line-ellipsis");
  });

  // kanban Item - Pick-a-Date
  $(".edit-kanban-item-date").pickadate();

  // Perfect Scrollbar - form content in kanban-sidebar
  if ($(".kanban-sidebar .edit-kanban-item .kanban-edit-content").length > 0) {
    new PerfectScrollbar(".kanban-edit-content", {
      wheelPropagation: false
    });
  }

  // select default bg color as selected option
  $("select").addClass($(":selected", this).attr("class"));

  // change bg color of select form-control
  $("select").change(function () {
    $(this)
      .removeClass($(this).attr("class"))
      .addClass($(":selected", this).attr("class") + " form-control text-white");
  });
});
