jQuery(document).ready(function() {
  var $ = jQuery;
  var screenRes = $(window).width();
  var screenHeight = $(window).height();

  $("[href=#]").click(function(event){
    event.preventDefault();
  });

  // Body Wrap
  $(".body_wrap").css("min-height", screenHeight);
  $(window).resize(function() {
    screenHeight = $(window).height();
    $(".body_wrap").css("min-height", screenHeight);
  });

  // Remove outline in IE
  $("a, input, textarea").attr("hideFocus", "true").css("outline", "none");
  // Add gradient to IE
  setTimeout(function () {
    $("input, textarea, .select_styled, .body_wrap, .boxed-velvet .inner, .widget_categories li, .dropdown > li a, .tabs li a, .tab-pane, .comment-body .inner, .chzn-container, .carousel-title, .note").addClass("gradient");
  }, 0);

  // First Child, Last Child
  $(".widget-container li:first-child, .pricing_box li:first-child, .dropdown li:first-child, ol li:first-child").addClass("first");
  $(".widget-container li:last-child, .pricing_box li:last-child, .dropdown li:last-child, ol li:last-child").addClass("last");

  // buttons
  $(".btn").not(".btn-round").hover(function(){
    $(this).stop().animate({
      "opacity": 0.8
    });
  },function(){
    $(this).stop().animate({
      "opacity": 1
    });
  });
  $('a.btn, span.btn').on('mousedown', function(){
    $(this).addClass('active')
  });
  $('a.btn, span.btn').on('mouseup mouseout', function(){
    $(this).removeClass('active')
  });

  if ($("div,p").hasClass("input_styled")) {
    $(".input_styled input").customInput();
  }
    
  // NavBar Parents Arrow
  $(".dropdown ul").parent("li").addClass("parent");
  // NavBar
  $(".dropdown ul li:first-child, .cusel span:first-child").addClass("first");
  $(".dropdown ul li:last-child, .cusel span:last-child").addClass("last");

  // Tabs
  var $tabs_on_page = $('.tabs').length;
  var $bookmarks = 0;

  for(var i = 1; i <= $tabs_on_page; i++){
    $('.tabs').eq(i-1).addClass('tab_id'+i);
    $bookmarks = $('.tab_id'+i+' li').length;
    $('.tab_id'+i).addClass('bookmarks'+$bookmarks);
  };  
  
});