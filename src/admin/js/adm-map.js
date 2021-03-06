/**
 * Created by dev on 5/4/17.
 */

var map = {
    dom: null,
    campus: {
        vulkan: {
            dom: null,
            background: 'vulkan-map.png'
        },
        fjerdingen: {
            dom: null,
            background: 'fjerdingen-map.png'
        },
        brenneriveien: {
            dom: null,
            background: 'brenneriveien-map.png'
        }
    }
};

$(document).ready(function() {
    // Get map and relevant childred
    map.dom = $('.map');
    map.dom.click(function (e) {
        var x = e.pageX;
        var y = e.pageY;
        var offsetX = $(this).offset().left;
        var offsetY = $(this).offset().top;
        x = x - offsetX;
        y = y - offsetY;
        var mapY = $(this).height();
        var mapX = $(this).width();
        x = (x / mapX) * 100;
        y = (y / mapY) * 100;
        moveLocation(x, y);
        $("input[name='posX']").val(x);
        $("input[name='posY']").val(y);
    });
});

function changeMap() {
    var campus = $('#campcamp').find('option:selected').text();
    console.log(campus);
    map.dom.css('background-image', 'url(../assets/imgs/map/' + map.campus[campus.toLowerCase()].background + ')');

    if (campus == "Fjerdingen") {
        $(".cFjerdingen").css('opacity', 1);
        $(".cBrenneriveien").css('opacity', 0);
        $(".cVulkan").css('opacity', 0);
    }

    if (campus == "Brenneriveien") {
        $(".cBrenneriveien").css('opacity', 1);
        $(".cFjerdingen").css('opacity', 0);
        $(".cVulkan").css('opacity', 0);
    }

    if (campus == "Vulkan") {
        $(".cVulkan").css('opacity', 1);
        $(".cFjerdingen").css('opacity', 0);
        $(".cBrenneriveien").css('opacity', 0);
    }
}

function moveLocation(x, y) {
    $('#dummy').css({
        'left': x + '%',
        'top': y + '%'
    });
}