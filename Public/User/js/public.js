$(document).ready(function() {
    $('.searchclick').click(function () {

        $keyword = $('#search').val();
        window.location.href = '/Fashionmall/index.php/Index/AllGood.html?keywords=' + $keyword;
    });
});