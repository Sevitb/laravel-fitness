// Создание карты.

ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
        // Координаты центра карты.
        // Порядок по умолчанию: «широта, долгота».
        // Чтобы не определять координаты центра карты вручную,
        // воспользуйтесь инструментом Определение координат.
        center: [48.69524704989439, 44.50799297431685],
        // Уровень масштабирования. Допустимые значения:
        // от 0 (весь мир) до 19.
        zoom: 16,
        controls: ["zoomControl", "fullscreenControl"]
    }),
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'ООО КАМ"',
            balloonContent: 'Пугачевская 7 Г (4 -х этажное здание), помещение № 9. Вход со стороны Волги.'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/images/home/global/map_mark.svg',
            // Размеры метки.
            iconImageSize: [89, 58],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-53, -58]
        });

    myMap.geoObjects
        .add(myPlacemark);

}