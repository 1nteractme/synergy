function changeColorOnHover(buttonId, elementId, newColor) {
    const button = document.getElementById(buttonId);
    const element = document.getElementById(elementId);
  
    button.addEventListener("mouseover", () => {
        element.style.transition = "color 1s ease";
        element.style.color = newColor;
        element.style.textShadow = newColor + ' 0 0 0.10vw';//' 1.04vw 1.04vw 2.6vw';
    });
  
    button.addEventListener("mouseout", () => {
      element.style.transition = "color 1s ease";
      element.style.color = "#eee";
      element.style.textShadow = "#eee 0 0 0";;
    });
}

changeColorOnHover("log_button", "span_auth", "#168aad");
changeColorOnHover("reg_button", "span_reg", "#52b69a");