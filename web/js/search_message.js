/**
 * Created by Users CS on 23.04.2016.
 */
(function( $ ){
    $(function() { // создает локальную область видимости кода для html страницы
        /*$('#search').click(function(e){
            e.preventDefault();
            search_Avtor($('#input_search').val());
        });

        $('#dropdown_menu').mouseover(function(){
            $('#dropdown_menu').dropdown('toggle');
            //alert('some');
        });

        $('#facebook1').hover(function(){

            //function(){
            //    $(this).addClass('size_class');
            //},
            //function() {
            //    $(this).removeClass('size_class');

            $(this).animate({
                height: "250",
                width: "250",
                left: "-=50",
                top: "-=50"
            }, "fast");
            }, function() {
            $(this).animate({
                height: "150",
                width: "150",
                left: "+=50",
                top: "+=50"
            }, "fast");
        });

        $('#btn_search').click(function() {
            $('#myModal').modal("show"); // Показывает всплывающее окно
        });

        $('#search_input').hover(function() { // изменение цвета поля ввода исходя из данных
            if($('#search_name').val()) {
                $(this).removeClass('has-error');
                $(this).addClass('has-success');
            }
            else {
                $(this).removeClass('has-success');
                $(this).addClass('has-error');
            }
            //alert('class');
        });

        $('#getajax').live('click',function(){
            $.ajax({
                type:"POST",
                data:'do=yes',
                url:"request.php",
                success:function(html){  $('#ajax').html(html);   }
            });
        });

        $('button#getajax').click(function() {
            $('div#ajax').load('request.php');
        });
        */
        $('#btn_search').click(function(e){
            e.preventDefault(); // отменяет действия браузера по умолчанию
            alert('true');
        });

        $('#btn_add').click(function(){
            add();
            return false; // чтобы браузер не совершал обратный переход
        });

        //alert('comment');
    });
    //$(function() { // Блоки выполняются одновременно (как замыкания)
    //    alert('prev');
    //});
})( jQuery );

function search_Avtor(avtor_name){
    $.ajax({
        dataType: "html",
        url: "php/server.php",
        type: "GET",
        data: {
            action : "search",
            avtor_name : avtor_name
        },
        success: function(html) {
            $('#from_ajax').html(html);
            alert("Выполнено");
        },
        error: function() {
            alert("Ошибка при выполнении");
        }
    });
}

function add(){
    $.ajax({
        dataType: "html",
        url: "php/server.php",
        type: "POST",
        cache: false,
        data: {
            action : "add"
        },
        success: function(html) {
            $('#from_ajax2').html(html);
            //alert("Выполнено");
        },
        error: function() {
            alert("Ошибка при выполнении");
        }
    });
}