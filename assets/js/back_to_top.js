//Get the button
var mybutton = document.getElementById("back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop >= 23 ||
    document.documentElement.scrollTop >= 23
  ) {
    mybutton.style.display = "flex";

    document.getElementById("logo_img").style.cssText = `
    background:url(/dealhopp/assets/images/logo/1.png) no-repeat;
    width:90px;
    height:75px;
    background-position: center;
    background-size: contain;
`;
    document.getElementById("logo").style.cssText = `
border-radius:  0 0 11px 11px;


`;
    document.getElementById("logo_img_mob").style.cssText = `
    background:url(/dealhopp/assets/images/logo/1.png) no-repeat;
    width:45px;
    height:45px;
    background-position: center;
    background-size: contain;
`;
    document.getElementById("logo_mob").style.cssText = `
border-radius:  0 0 11px 11px;

`;
  } else {
    mybutton.style.display = "none";

    document.getElementById("logo_img").style.cssText = `
    background:url(/dealhopp/assets/images/logo/Logo1.png) no-repeat;
    width:270px;
    background-position: center;
    background-size: contain;
`;
    document.getElementById("logo").style.cssText = `
border-radius:  0 0 11px 11px;

`;

    document.getElementById("logo_img_mob").style.cssText = `
    background:url(/dealhopp/assets/images/logo/Logo1.png) no-repeat;
    width:177px;
   height: 45px;
    background-position: center;
    background-size: contain;
`;
    document.getElementById("logo_mob").style.cssText = `
border-radius:  0 0 11px 11px;

`;
  }
}

// When the user clicks on the button, scroll to the top of the document
function back_to_top_Function() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
//open login or signup
function openForm() {
  document.getElementById("a_login").style.cssText = `
  -webkit-animation: popup .3s ease-in-out .1s forwards;
  animation: popup .3s ease-in-out .1s forwards;
   

  `;
  document.getElementById("a_signup").style.cssText = `
  visibility: hidden;
  opacity:0;
  pointer-events: none;
  `;
}

function closeForm() {
  document.getElementById("a_login").style.cssText = `
  visibility: hidden;
  opacity:0;
  pointer-events: none;
  `;
}
function openForm2() {
  document.getElementById("a_signup").style.cssText = `
  -webkit-animation: popup .3s ease-in-out .1s forwards;
  animation: popup .3s ease-in-out .1s forwards;
  `;
  document.getElementById("a_login").style.cssText = `
  visibility: hidden;
  opacity:0;
  pointer-events: none;
  `;
}

function closeForm2() {
  document.getElementById("a_signup").style.cssText = `
  visibility: hidden;
  opacity:0;
  pointer-events: none;
  `;
}
//Filter close / open
function uncheckAll() {
  $('input[type="checkbox"]:checked').click();
}
function toggleNav() {
  var element = document.getElementById("filter");
  var filter_btn_down = document.getElementById("a_filter_down");
  var filter_btn_up = document.getElementById("a_filter_up");
  var uncheck_show = document.getElementById("uncheck_show");

  if (element.style.display == "block") {
    $("#filter").slideUp();

    filter_btn_up.style.cssText = `
      display:none;
      `;
    filter_btn_down.style.cssText = `
      display:block;
      `;
    uncheck_show.style.cssText = `
      display:none;
      `;
    $([document.documentElement, document.body]).animate(
      {
        scrollTop: $(".banner").offset().top - 120,
      },
      800
    );
  } else {
    $("#filter").slideDown();

    element.style.cssText = `
      z-index:0;
       display:block;
      pointer-events: all;
      `;
    filter_btn_up.style.cssText = `
      display:block;
      `;
    filter_btn_down.style.cssText = `
      display:none;
      `;
    uncheck_show.style.cssText = `
      display:flex;
      `;
    $([document.documentElement, document.body]).animate(
      {
        scrollTop: $("#filter").offset().top - 90,
      },
      800
    );
  }
}
//user post box open/close

function openpost_box() {
  document.getElementById("post_popup").style.cssText = `
  -webkit-animation: popup .3s ease-in-out .1s forwards;
        animation: popup .3s ease-in-out .1s forwards;
        display:flex;
  `;
}

function closepost_box() {
  document.getElementById("post_popup").style.cssText = `
display:none;
  `;
}
