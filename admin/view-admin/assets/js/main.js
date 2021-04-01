// $('browse').click(function () {
//     var filesArr = [];
//     var that = $(this);
//     var find = new elfinderPopup({
//         url: '../elFinder/php/connector.minimal.php',
//         commandsOptions: {
//             getfile: {
//                 multiple: true
//             }
//         },
//         getFileCallback: function (file) {
//             var urls = $.map(file, function (f) {
//                 return f.url;
//             });
//             console.log(urls);
//             that.prev().val(file.url);
//             console.log(file.url);
//         }
//     });
//     find.popup();
// });
var pathToDataBase = [];
$('#clearList').click(function () {
    pathToDataBase = [];
    $('#listImages').html('');
    $('#imagenVistaRuta').val('');
    $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');

});

$('#browseUpdate').click(function () {
    var URLS = [];
    $('#editor').elfinder({
        // set your elFinder options here
        url: '../../elFinder/php/connector.minimal.php', // connector URL
        dialog: {
            width: 900,
            modal: true,
            title: 'Seleccionar un elemento'
        },
        resizable: false,
        commandsOptions: {
            getfile: {
                oncomplete: 'destroy',

                multiple: true
            }
        },
        getFileCallback: function (file) {
            var urls = $.map(file, function (f) {
                return f.url;
            });
            console.log(urls);
            var c = document.getElementById("listImages").childElementCount;
            if (c >= 0) {
                $('#imagenInfo').html('');
                for (let i = 0; i < urls.length; i++) {
                    var c = document.getElementById("listImages").childElementCount;
                    $('#listImages').append(
                        '<div class="col-lg-3 col-md-4 col-6" id="' + c + '">' +
                        '<a class="d-block mb-4 h-100" >' +
                        '<img name="imgP" id ="img' + c + '"  class="imgP img-fluid img-thumbnail" src="' + urls[i] + '" alt="">' +
                        '</a>' +
                        '</div>'
                    );
                    console.log('registro n: ' + c)
                }

            } else {
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');



                // var c = document.getElementById("listImages").childElementCount;

                // var children = document.getElementById("listImages").childNodes;
                // console.log('registro nodos: ' + children.values)
                // var nnodes = document.getElementById('listImages').length;
                // console.log('links actuales:  ' + c);
                // // console.log(file.path);
                // // var linkarray = [];
                // var pathToDataBase = [];
                // for (let i = 0; i <= c; i++) {
                //     const div1 = document.getElementById('img' + i);


                //     pathToDataBase.push(div1.getAttribute('src') + ' ; ');
                //     // pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // parent.jQuery.colorbox.close();
            }

            var c = document.getElementById("listImages").childElementCount;

            console.log('links totales:  ' + c);

            if (c > 0) {
                // for (let i = 0; i < c; i++) {
                //     var imageSrc = $("#img" + i).attr('src');
                //     //     div1 = document.getElementById('img' + i);


                //     //     console.log(div1);
                //     //pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // console.log(pathToDataBase);
                pathToDataBase = [];
                for (let i = 0; i < img_find().length; i++) {

                    pathToDataBase.push(img_find()[i]);
                    console.log(img_find()[i]);
                }
                $('#imagenVistaRuta').val(pathToDataBase);
            } else {
                $('#imagenVistaRuta').val('');
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');

            }
        }
    }).elfinder('instance');


});

$('#browse').click(function () {
    var URLS = [];
    $('#editor').elfinder({
        // set your elFinder options here
        url: '../elFinder/php/connector.minimal.php', // connector URL
        dialog: {
            width: 900,
            modal: true,
            title: 'Seleccionar un elemento'
        },
        resizable: false,
        commandsOptions: {
            getfile: {
                oncomplete: 'destroy',

                multiple: true
            }
        },
        getFileCallback: function (file) {
            var urls = $.map(file, function (f) {
                return f.url;
            });
            console.log(urls);
            var c = document.getElementById("listImages").childElementCount;
            if (c >= 0) {
                $('#imagenInfo').html('');
                for (let i = 0; i < urls.length; i++) {
                    var c = document.getElementById("listImages").childElementCount;
                    $('#listImages').append(
                        '<div class="col-lg-3 col-md-4 col-6" id="' + c + '">' +
                        '<a class="d-block mb-4 h-100" >' +
                        '<img name="imgP" id ="img' + c + '"  class="imgP img-fluid img-thumbnail" src="' + urls[i] + '" alt="">' +
                        '</a>' +
                        '</div>'
                    );
                    console.log('registro n: ' + c)
                }

            } else {
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');



                // var c = document.getElementById("listImages").childElementCount;

                // var children = document.getElementById("listImages").childNodes;
                // console.log('registro nodos: ' + children.values)
                // var nnodes = document.getElementById('listImages').length;
                // console.log('links actuales:  ' + c);
                // // console.log(file.path);
                // // var linkarray = [];
                // var pathToDataBase = [];
                // for (let i = 0; i <= c; i++) {
                //     const div1 = document.getElementById('img' + i);


                //     pathToDataBase.push(div1.getAttribute('src') + ' ; ');
                //     // pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // parent.jQuery.colorbox.close();
            }

            var c = document.getElementById("listImages").childElementCount;

            console.log('links totales:  ' + c);

            if (c > 0) {
                // for (let i = 0; i < c; i++) {
                //     var imageSrc = $("#img" + i).attr('src');
                //     //     div1 = document.getElementById('img' + i);


                //     //     console.log(div1);
                //     //pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // console.log(pathToDataBase);
                pathToDataBase = [];
                for (let i = 0; i < img_find().length; i++) {

                    pathToDataBase.push(img_find()[i]);
                    console.log(img_find()[i]);
                }
                $('#imagenVistaRuta').val(pathToDataBase);
            } else {
                $('#imagenVistaRuta').val('');
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');

            }
        }
    }).elfinder('instance');


});

$('#browseAtr').click(function () {
    var URLS = [];
    $('#editorAtr').elfinder({
        // set your elFinder options here
        url: '../elFinder/php/connector.minimal.php', // connector URL
        dialog: {
            width: 900,
            modal: true,
            title: 'Seleccionar un elemento'
        },
        resizable: false,
        commandsOptions: {
            getfile: {
                oncomplete: 'destroy',
                multiple: false
            }
        },
        getFileCallback: function (file) {
            var urls = file.url
            console.log(file);
            var c = document.getElementById("listImages").childElementCount;

            $('#imagenVistaRuta').val('');
            $('#listImages').html('');
            if (c >= 0) {
                $('#imagenInfo').html('');
                var c = document.getElementById("listImages").childElementCount;
                $('#listImages').append(
                    '<div class="col-lg-3 col-md-4 col-6" id="' + c + '">' +
                    '<a class="d-block mb-4 h-100" >' +
                    '<img name="imgP" id ="img' + c + '"  class="imgP img-fluid img-thumbnail" src="' + urls + '" alt="">' +
                    '</a>' +
                    '</div>'
                );
                console.log('registro n: ' + c)


            } else {
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');



                // var c = document.getElementById("listImages").childElementCount;

                // var children = document.getElementById("listImages").childNodes;
                // console.log('registro nodos: ' + children.values)
                // var nnodes = document.getElementById('listImages').length;
                // console.log('links actuales:  ' + c);
                // // console.log(file.path);
                // // var linkarray = [];
                // var pathToDataBase = [];
                // for (let i = 0; i <= c; i++) {
                //     const div1 = document.getElementById('img' + i);


                //     pathToDataBase.push(div1.getAttribute('src') + ' ; ');
                //     // pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // parent.jQuery.colorbox.close();
            }

            var c = document.getElementById("listImages").childElementCount;

            console.log('links totales:  ' + c);

            if (c > 0) {
                // for (let i = 0; i < c; i++) {
                //     var imageSrc = $("#img" + i).attr('src');
                //     //     div1 = document.getElementById('img' + i);


                //     //     console.log(div1);
                //     //pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // console.log(pathToDataBase);
                pathToDataBase = [];
                for (let i = 0; i < img_find().length; i++) {

                    pathToDataBase.push(img_find()[i]);
                    console.log(img_find()[i]);
                }
                $('#imagenVistaRuta').val(pathToDataBase);
            } else {
                $('#imagenVistaRuta').val('');
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');

            }
        }
    }).elfinder('instance');


});

$('#browseAtrUp').click(function () {
    var URLS = [];
    $('#editorAtr').elfinder({
        // set your elFinder options here
        url: '../../elFinder/php/connector.minimal.php', // connector URL
        dialog: {
            width: 900,
            modal: true,
            title: 'Seleccionar un elemento'
        },
        resizable: false,
        commandsOptions: {
            getfile: {
                oncomplete: 'destroy',
                multiple: false
            }
        },
        getFileCallback: function (file) {
            var urls = file.url
            console.log(file);
            var c = document.getElementById("listImages").childElementCount;

            $('#imagenVistaRuta').val('');
            $('#listImages').html('');
            if (c >= 0) {
                $('#imagenInfo').html('');
                var c = document.getElementById("listImages").childElementCount;
                $('#listImages').append(
                    '<div class="col-lg-3 col-md-4 col-6" id="' + c + '">' +
                    '<a class="d-block mb-4 h-100" >' +
                    '<img name="imgP" id ="img' + c + '"  class="imgP img-fluid img-thumbnail" src="' + urls + '" alt="">' +
                    '</a>' +
                    '</div>'
                );
                console.log('registro n: ' + c)


            } else {
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');



                // var c = document.getElementById("listImages").childElementCount;

                // var children = document.getElementById("listImages").childNodes;
                // console.log('registro nodos: ' + children.values)
                // var nnodes = document.getElementById('listImages').length;
                // console.log('links actuales:  ' + c);
                // // console.log(file.path);
                // // var linkarray = [];
                // var pathToDataBase = [];
                // for (let i = 0; i <= c; i++) {
                //     const div1 = document.getElementById('img' + i);


                //     pathToDataBase.push(div1.getAttribute('src') + ' ; ');
                //     // pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // parent.jQuery.colorbox.close();
            }

            var c = document.getElementById("listImages").childElementCount;

            console.log('links totales:  ' + c);

            if (c > 0) {
                // for (let i = 0; i < c; i++) {
                //     var imageSrc = $("#img" + i).attr('src');
                //     //     div1 = document.getElementById('img' + i);


                //     //     console.log(div1);
                //     //pathToDataBase.push(linkarray[i] + ' ; ');
                // }
                // console.log(pathToDataBase);
                pathToDataBase = [];
                for (let i = 0; i < img_find().length; i++) {

                    pathToDataBase.push(img_find()[i]);
                    console.log(img_find()[i]);
                }
                $('#imagenVistaRuta').val(pathToDataBase);
            } else {
                $('#imagenVistaRuta').val('');
                $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');

            }
        }
    }).elfinder('instance');


});

function deletenode(node) {

    $('#imagenVistaRuta').val('');
    var el = document.getElementById(node);
    var pathTodelete = $("#img" + node).attr('src');

    console.log('path to delete : ' + pathTodelete);

    var pathToDataBaseClear = removeItemFromArr(pathToDataBase, pathTodelete);
    $('#imagenVistaRuta').val(pathToDataBaseClear);

    pathToDataBase = pathToDataBaseClear;

    console.log('path clear: ' + pathToDataBaseClear);
    el.remove();

    var c = document.getElementById("listImages").childElementCount;
    if (c == 0) {
        $('#imagenVistaRuta').val('');

        $('#imagenInfo').html('<p class="text-black-50">Ninguna imagen seleccionada</p>');
    }


}

function processFile() {


    // var nombres = file;
    // document.write(nombres + "<br>" + "<br>");
    // var expresionRegular = /\s*;\s*/;
    // var listaNombres = nombres.split(expresionRegular);
    // document.write(listaNombres);

}

function removeItemFromArr(arr, item) {
    return arr.filter(function (e) {
        return e !== item;
    });
};

function img_find() {
    // var imageSrc = $("#img" + i).attr('src');

    var imgs = document.getElementsByName("imgP");
    // var imgs = $.attr('src'));
    var imgSrcs = [];

    for (var i = 0; i < imgs.length; i++) {
        imgSrcs.push(imgs[i].getAttribute('src'));
    }

    return imgSrcs;
}
$(".m").on('click', function () {
    files = $(this).attr('id');

    path = $($("#selectedImage" + files)).children('img');
    path = path.attr('id');
    console.log(path);
    pintar(path);

});

function pintar(path) {
    $('.selectFolder').removeClass('bg-info');
    $('#selectFolder' + path).addClass('bg-info');
    $('#imagen360Ruta').val('panoramas/' + path);
    console.log(path);

}
// when the user clicks on unlike


// $('.unlike').on('click', function () {
//     var postid = $(this).data('id');
//     $post = $(this);

//     $.ajax({
//         url: 'index.php',
//         type: 'post',
//         data: {
//             'unliked': 1,
//             'postid': postid
//         },
//         success: function (response) {
//             $post.parent().find('span.likes_count').text(response + " likes");
//             $post.addClass('hide');
//             $post.siblings().removeClass('hide');
//         }
//     });
// });


