console.log('%c' + 'Loading customizer loader ', 'color: #a08; font-size: 1rem; background-color:#fff');

function registerCustomizer(variableName, callback) {
  document.addEventListener("DOMContentLoaded", function() {

    console.log('%c' + 'Register callback for customize variable : ' + variableName, 'color: #a08; font-size: 1rem; background-color:#fff');

    wp.customize(
      variableName,
      function(value) {
        value.bind(function(newValue) {
          console.log(newValue);
          callback(newValue);
        });
      }
    );
  });
}


function registerInnerHTMLCustomizer(variableName, selector) {
  registerCustomizer(variableName, function(value) {

    let element = document.querySelector(selector);

    for(let child of element.childNodes) {
      if(child.classList) {
        if(!child.classList.contains('customize-partial-edit-shortcut')) {
          child.remove();
        }
      }
      else {
        child.remove();
      }
    }

    let container = document.createElement('div');
    container.innerHTML = value;

    for(let child of container.childNodes) {
      element.appendChild(child);
    }
  })
}

function registerImageCustomizer(variableName, selector) {
  registerCustomizer(variableName, function(value) {
    document.querySelector(selector).setAttribute('src', value);
  })
}

function registerBackgroundImageCustomizer(variableName, selector) {
  registerCustomizer(variableName, function(value) {
    document.querySelector(selector).style.backgroundImage = 'url(' + value + ')';
  })
}


function registerBackgroundColorCustomizer(variableName, selector) {
  registerCustomizer(variableName, function(value) {
    document.querySelector(selector).style.backgroundColor = value;
  })
}




document.addEventListener('DOMContentLoaded', function(event) {
  document.addEventListener('click', function(event) {
    // console.log(event.currentTarget);
    console.log(event.target);
  });
});