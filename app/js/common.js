$('.car-movies').slick({ 
 infinite: false,
 lazyLoad: 'ondemand', 
 speed: 500,
 slidesToShow: 5,
 slidesToScroll: 1,   
 prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fas fa-chevron-left' aria-hidden='true'></i></button>",
 nextArrow:"<button type='button' class='slick-next pull-right'><i class='fas fa-chevron-right' aria-hidden='true'></i></button>", 
 responsive: [
 {breakpoint:1230, settings: {slidesToShow:4}},
 {breakpoint:940, settings: {slidesToShow:4}},
 {breakpoint:760, settings: {slidesToShow:4}},
 {breakpoint:600, settings: {slidesToShow:3}},
 {breakpoint:470, settings: {slidesToShow:3}},
 {breakpoint:415, settings: {slidesToShow:2}},    
 ]
});
$('.multiple-items').slick({ 
 infinite: false,
 lazyLoad: 'ondemand',
 speed: 500,
 slidesToShow: 3,
 slidesToScroll: 1,
 rows: 3,     
 prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fas fa-chevron-left' aria-hidden='true'></i></button>",
 nextArrow:"<button type='button' class='slick-next pull-right'><i class='fas fa-chevron-right' aria-hidden='true'></i></button>", 
 responsive: [
 {breakpoint:1221, settings: {slidesToShow:2}},
 {breakpoint:600, settings: {slidesToShow:2}},
 {breakpoint:480, settings: {slidesToShow:1}}
 ]
});
$('.car-yet').slick({ 
 infinite: false,
 lazyLoad: 'ondemand', 
 speed: 500,
 slidesToShow: 6,
 slidesToScroll: 2, 
 arrows: false,    
 responsive: [
 {breakpoint: 1220, settings: {slidesToShow:5,slidesToScroll:2,dots:true}},
 {breakpoint: 1025, settings: {slidesToShow:4,dots:true}},    
 {breakpoint:800, settings: {slidesToShow:5,dots:true}},
 {breakpoint:770, settings: {slidesToShow:5,dots:true}},
 {breakpoint:735, settings: {slidesToShow:4,dots:true}},
 {breakpoint:470, settings: {slidesToShow:3,dots:true}},
 {breakpoint:420, settings: {slidesToShow:2,dots:true}},    
 ]
});