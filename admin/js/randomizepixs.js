window.onload = choosePic;

var myPix = new Array("images/testimony in GLT.jpg","images/testimony in GLT.jpg", "images/testimony in GLT.jpg", "images/testimony in GLT.jpg");
function choosePic() {
      randomNum = Math.floor((Math.random() * myPix.length));
      document.getElementById("myPicture").src = myPix[randomNum];
}
