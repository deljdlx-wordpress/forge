console.log('%c' + 'customzers.js loaded', 'color: #0bf; font-size: 1rem; background-color:#fff');



registerBackgroundColorCustomizer('background-color', 'body')
registerBackgroundColorCustomizer('header-background-color', '#header-menu')


registerImageCustomizer('logo', '.header__logo img');


registerInnerHTMLCustomizer('footer-text', '.theme-footer-text');


// console.log("CUSTOMIZER LOADED");



// registerBackgroundColorCustomizer('menu-footer-color', '#footer')
// ;
// registerImageCustomizer('menu-profile-image', '.menu-profile-image');
// registerInnerHTMLCustomizer('menu-title', '.menu-title');
// registerInnerHTMLCustomizer('menu-footer-0', '.menu-footer-0');
// registerInnerHTMLCustomizer('menu-footer-1', '.menu-footer-1');

// registerInnerHTMLCustomizer('hero-title', '.hero-title');
// registerInnerHTMLCustomizer('hero-text', '.hero-text');

// registerBackgroundImageCustomizer('hero-image', '#hero');
// registerCustomizer('hero-features-list', function(value) {

//   const heroTextElement = document.querySelector('.hero-features-list');
//   if (heroTextElement) {

//     heroTextElement.typed.destroy();

//     let typed_strings = value;
//     typed_strings = typed_strings.split(',');

//     heroTextElement.typed = new Typed(heroTextElement, {
//       strings: typed_strings,
//       loop: true,
//       typeSpeed: 100,
//       backSpeed: 50,
//       backDelay: 2000
//     });
//   }

// });


