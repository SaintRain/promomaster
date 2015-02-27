/**
 * Обработчик нажатия кнопки Дублировать
 * 
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
$(document).ready(function() {
    $('body').on('click', '.dublicateProduct', function() {
        var newArticle = prompt("Пожалуйста, укажите новый артикул", $(this).attr('data-article'));
        if (newArticle !== null) {
            if (newArticle != '' && newArticle != $(this).attr('data-article')) {
                //Даные для создания дубликата
                var new_options = {
                    newArticle: newArticle,
                    subject_id: $(this).attr('data-id')
                };
                $.post(
                        product_dublicate_create,
                        new_options,
                        function(res) {
                            if (res.newObjectId) {
                                alert('Успешно создан дубликат продукта с ID:' + res.newObjectId);
                            }
                            else {
                                alert('Ошибка создания дубликата продукта, смотрите консоль!');
                                console.log(res.errors);
                            }
                        }
                );
            }
            else {
                alert('Пожалуйста, укажите новый артикул!');
            }
        }
    });
});