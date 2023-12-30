document.addEventListener('DOMContentLoaded', function() {
    const textElement = document.getElementById('typing-text');

    function typeText(textToType) {
      let i = 0;
      const typingInterval = setInterval(function() {
        textElement.textContent += textToType[i];
        i++;
  
        if (i === textToType.length) {
          clearInterval(typingInterval);
        }
      }, 80);
    }

    typeText(textToType);
});

function removeParagraph(field, paragraph) {  
  var input = document.getElementById(field);
  var text = document.getElementById(paragraph);
  if (text) {
      text.remove();
      input.style.background = "#eee";
      input.style.borderRadius = "0.260vw";
      input.focus();
  }
  else{
    console.log("overclick");
  }
}

function checkInputContent(input, fieldBox) {
  var prev = document.getElementById(input);
  var next = document.getElementById(fieldBox);
  
  var i = prev.value.trim();
  if (i.length > 0) {
    next.style.display = "flex";
  } else {
    next.style.display = "none";
  }
}

