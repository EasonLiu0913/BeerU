
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

    var that = this;
    // 調速度300+慢300-快
    var delta = 300 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    // 重複來回
    // if (!this.isDeleting && this.txt === fullTxt) {
    // delta = this.period;
    // this.isDeleting = true;
    // } else if (this.isDeleting && this.txt === '') {
    // this.isDeleting = false;
    // this.loopNum++;
    // delta = 500;
    // }

    setTimeout(function() {
    that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');

    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
          new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    // 調游標
    css.innerHTML = ".typewrite > .wrap { border-right: 1.5px solid var(--gold);}";
    document.body.appendChild(css);
};
$(".typewrite:contains('<')").css('opacity','0') 
