
// 100vh for mobiles
function appHeight() {
    const doc = document.documentElement
       doc.style.setProperty('--vh', (window.innerHeight*.01) + 'px');
     }
   window.addEventListener('resize', appHeight);
   appHeight();
   
   
   // // Preloader
   // $(window).load(function() {
   //    $(".preloader_wrapper").delay(500).fadeOut("slow");
   // });
   
   
   //AOS
   AOS.init();
   
   
   // Popup Video
   $('.popup-video').magnificPopup({
     disableOn: 320,
     type: 'iframe',
     mainClass: 'mfp-fade',
     removalDelay: 160,
     preloader: false,
     fixedContentPos: false
   });
   
   
   
   // let my_main_wrapper = document.querySelector(".my_main_wrapper");
   
   // let suit_form = document.querySelector(".suit_form");
   // let shirt_form = document.querySelector(".shirt_form");
   // let phant_form = document.querySelector(".phant_form");
   
   // if(my_main_wrapper.id === "suit_select") {
   // 	shirt_form.classList.add("d-none");
   // 	phant_form.classList.add("d-none");
   // }
   // else if(my_main_wrapper.id === "shirt_select") {
   // 	suit_form.classList.add("d-none");
   // 	phant_form.classList.add("d-none");
   // }
   // else if(my_main_wrapper.id === "phant_select") {
   // 	suit_form.classList.add("d-none");
   // 	shirt_form.classList.add("d-none");	
   // }
   // else {
       
   // }
   