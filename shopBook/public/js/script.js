
// $(function(){
//
//     function loadpage(url){
//         $.get(url).then(function(content) {
//             var contentClean = content.replace(/[\s\S]+<body>/m,'').replace(/<\/body>[\s\S]+/m,'');
//             var $body =$('body');
//             var $newtruc = $('#truc');
//             if ($newtruc.length < 1) {
//                 $newtruc = $('<div id="truc"></div>');
//             }
//
//             // on met l'ancien html dans le div flottant
//             $body
//                 .animate({ opacity: 0 }, function() {
//                     $body.html(contentClean);
//                     history.pushState({}, '', url);
//                     console.log("animation done");
//
//                 })
//                 .delay(0)
//                 .animate({  opacity: 1
//                 }, 5, function() {
//                     // Animation complete.
//                     console.log("animation done");
//
//                 });
//         });
//     }
//
//
//
//     $('html').on('click', 'a[href]', function (ev) {
//         ev.preventDefault();
//         var url = $(this).attr('href');
//         loadpage(url);
//     });
//
// });
//
// // $('#main').smoothState();
