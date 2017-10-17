/**
 * This file will never change, so feel free to overwrite it.
 */
document.addEventListener('DOMContentLoaded', function () {
  const createSlider = (el, numSlides = 3) => {
    return lory(el, {
      infinite: numSlides,
      enableMouseEvents: true,
      ease: 'cubic-bezier(0.455, 0.03, 0.515, 0.955)',
    });
  };

  [].forEach.call(document.querySelectorAll('.acflory'), (slider) => {
    if (slider.getAttribute('data-fullscreen') === 'true') {
      const linkListener = (e) => {
        const link = e.target;
        const wasFullscreen = slider.classList.contains('fullscreen');
        const create = () => {
          const instance = createSlider(
            slider,
            !wasFullscreen ? 1 : 3
          );

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

      const addListeners = (element) => {
        [].forEach.call(element.querySelectorAll('a'), (link) => {
          link.addEventListener('click', linkListener);
        });
      };

      addListeners(slider);
    }

    slider._slider = createSlider(slider, 3);
  });
});

