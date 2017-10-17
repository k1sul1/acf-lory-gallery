'use strict';

/**
 * This file will never change, so feel free to overwrite it.
 */
document.addEventListener('DOMContentLoaded', function () {
  var createSlider = function createSlider(el) {
    var numSlides = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 3;

    return lory(el, {
      infinite: numSlides,
      enableMouseEvents: true,
      ease: 'cubic-bezier(0.455, 0.03, 0.515, 0.955)'
    });
  };
  var iDidNotPlanForThis = function iDidNotPlanForThis() {
    // Only one col on phones.
    return window.innerWidth <= 600 ? 1 : 3;
  };

  console.log(iDidNotPlanForThis());

  [].forEach.call(document.querySelectorAll('.acflory'), function (slider) {
    if (slider.getAttribute('data-fullscreen') === 'true') {
      var linkListener = function linkListener(e) {
        var link = e.target;
        var wasFullscreen = slider.classList.contains('fullscreen');
        var create = function create() {
          var instance = createSlider(slider, !wasFullscreen ? 1 : iDidNotPlanForThis());

          instance.slideTo(parseInt(link.getAttribute('data-index'), 10));
          slider._slider = instance;
        };

        slider.classList.toggle('fullscreen');
        if (!wasFullscreen) {
          // go to fullscreen
          slider._slider.destroy();
          requestAnimationFrame(create);
        } else {
          // exit fullscreen, create new slider
          slider._slider.destroy();
          requestAnimationFrame(create);
          addListeners(slider);
        }

        e.preventDefault();
      };

      var addListeners = function addListeners(element) {
        [].forEach.call(element.querySelectorAll('a'), function (link) {
          link.addEventListener('click', linkListener);
        });
      };

      addListeners(slider);
    }

    slider._slider = createSlider(slider, iDidNotPlanForThis());
  });
});

//# sourceMappingURL=bundle.js.map