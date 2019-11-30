$(function() {

    $("#Home").parallax({
      imageSrc: "uploads/night2.jpg",
      speed: 0.2
    });
});

$(window).scroll(function() {
  if ($(this).scrollTop() > 90 ) {
    $("#mynavs").css({
      "background-color": "#343a40",
      "border-bottom-color": "#944dff",
      "border-bottom-style": "solid",
      "border-bottom-width": "2px"
    });
  } else {
    $("#mynavs").css({
      "background-color": "transparent",
      "border-bottom-color": "none",
      "border-bottom-style": "none",
      "border-bottom-width": "none"
    });
  }
});


$(window).scroll(function() {
  if ($(this).scrollTop() > 85 && $(this).scrollTop() > 85) {
    $("#Works h3").addClass("animated bounceInDown");
    $("#Works h6").addClass("animated bounceInUp");
  }
  if ($(this).scrollTop() > 100 && $(this).scrollTop() > 100) {
    $(".works-card").css("display", "block");
    $(".works-card").addClass("animated flipInY");
  }
  if ($(this).scrollTop() > 650 && $(this).scrollTop() > 650) {
    $("#Skills h2").addClass("animated lightSpeedIn");
    $("#Skills h6").addClass("animated lightSpeedIn");
    $("#Skills h2").css("display", "block");
    $("#Skills h6").css("display", "block");
  }
  if ($(this).scrollTop() > 770 && $(this).scrollTop() > 770) {
    $("#Skills .skill").css("display", "block");
    $("#Skills .knob").addClass("animated slideInDown");
    $("#Skills h5").css("display", "block");
    $("#Skills h5").addClass("animated jackInTheBox");
    $("#Skills .skill").addClass("animated jackInTheBox");
    $('.knob').each(function () {

        var $this = $(this);
        var myVal = $this.attr("value");
        $this.knob();
        
        $({
        value: 0
        }).animate({
        value: myVal
        }, {
        duration: 3000,
        easing: 'swing',
        step: function () {
            $this.val(Math.ceil(this.value)).trigger('change');
        
        }
        })
        
    });
    
  }
  if ($(this).scrollTop() > 1060 && $(this).scrollTop() > 1060) {
    $("#Services h2").addClass("animated zoomIn");
    $("#Services .timeline").addClass("animated zoomIn");
  }
  if ($(this).scrollTop() > 1330 && $(this).scrollTop() > 1330) {
    $("#Services .services-card").addClass("animated zoomIn");
    $("#Services .services-card").css("display", "block");
  }
  if ($(this).scrollTop() > 1700 && $(this).scrollTop() > 1700) {
    $("#Contact .form-card").css("display", "block");
    $("#Contact .form-card").addClass("animated zoomIn");
    $("#Contact .social").css("display", "block");
    $("#Contact .social").addClass("animated zoomIn");
    $("#Contact .clients").css("display", "block");
    $("#Contact .clients").addClass("animated zoomIn");
    $("#Blog").css("display", "block");
    $("#Blog").addClass("animated zoomIn");
  }
});

//nav scroll
/*var scrollAnimate = $(".nav-scroll");

scrollAnimate.click(function(e) {
  e.preventDefault();
  $("body").animate(
    {
      scrollTop: $(this.hash).offset().top
    },
  100
  );
});*/

//JQUERY KNOB FOR SKILLS


$(function () {
  /* jQueryKnob */
  
  $('.knob').knob({
    /*change : function (value) {
     //console.log("change : " + value);
     },
     release : function (value) {
     console.log("release : " + value);
     },
     cancel : function () {
     console.log("cancel : " + this.value);
     },*/
    draw: function () {

      // "tron" case
      if (this.$.data('skin') == 'tron') {

        var a   = this.angle(this.cv)  // Angle
          ,
            sa  = this.startAngle          // Previous start angle
          ,
            sat = this.startAngle         // Start angle
          ,
            ea                            // Previous end angle
          ,
            eat = sat + a                 // End angle
          ,
            r   = true

        this.g.lineWidth = this.lineWidth

        this.o.cursor
        && (sat = eat - 0.3)
        && (eat = eat + 0.3)

        if (this.o.displayPrevious) {
          ea = this.startAngle + this.angle(this.value)
          this.o.cursor
          && (sa = ea - 0.3)
          && (ea = ea + 0.3)
          this.g.beginPath()
          this.g.strokeStyle = this.previousColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
          this.g.stroke()
        }

        this.g.beginPath()
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
        this.g.stroke()

        this.g.lineWidth = 2
        this.g.beginPath()
        this.g.strokeStyle = this.o.fgColor
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
        this.g.stroke()

        return false
      }
    }
  })
});