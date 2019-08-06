// conteneur de l'image zoomée
document.write('<div id="div_zoom_image" class="div_zoom">');
document.write('<img id="img_zoom_image" src="" class="zoom" />');
document.write('</div>');
// affiche l'image au niveau du curseur
function overImage(imgUrl) {
    document.getElementById("div_zoom_image").style.visibility = "visible";
    document.getElementById("img_zoom_image").src = imgUrl;
    document.onmousemove = moveImage;
}
// masque l'image
function outImage() {
    document.getElementById("div_zoom_image").style.visibility = "hidden";
    document.getElementById("img_zoom_image").src = "";
    document.onmousemove = "";
}
// permet d'afficher l'image lorsque la souris bouge dans l'image
function moveImage(event) {
    // position
    var x = event.pageX + 5;
    var y = event.pageY + 5;
    // placement
    document.getElementById("div_zoom_image").style.left = x + "px";
    document.getElementById("div_zoom_image").style.top = y + "px";
}