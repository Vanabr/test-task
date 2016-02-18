function getList() {
    $.ajax({
        url: '/todo/getList',
        type: "POST",
        cache: false,
        success: function (msg) {
            var response = JSON.parse(msg);
            if(response.info !== undefined && response.info === 'no_list') {
                $('.list').append('<h2>Пока дел нет, можете отдохнуть.</h2>');
            } else {
                for (var key in response) {
                    $('.list').append('<div class="todo_each"><div class="todo_list_item">'+
                        '<div class="todo_name" onclick="$(\'#todo'+response[key]['id']+'\').toggle(\'slow\');">'+
                        response[key]['name']+
                        '</div><a href="/todo/edit?id='+response[key]['id']+'&action=delete" class="list_delete">Удалить</a>'+
                        '<a href="/todo/edit?id='+response[key]['id']+'" class="list_delete">Редактировать</a></div>' +
                        '<div class="todo_list_desc" id="todo'+response[key]['id']+'">'+response[key]['description']+'</div></div>');
                }
            }

        }
    });
    return false;

}

function checkListAdd() {

   var name = $('#list_add_input').val().trim();
   var description = $('#list_add_text').val().trim();
    $('#list_add_name_error').empty();
    $('#list_add_desc_error').empty();
   if(!name) {
       var error = 'Укажите название дела';
       $('#list_add_name_error').prepend(error);


   }
   if(!description) {
       var error = 'Опишите, что хотите сделать';
       $('#list_add_desc_error').prepend(error);

   }
    if(error) {
        return false;
    }
}

$(document).ready(function() {
    getList();
});