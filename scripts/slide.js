$(document).ready(function() {
	// the array of images
	var images=[ 'images/slide3.jpg', '../images/cornell.jpg', 'images/slide1.jpg'];
	var piclink = ["url(" + images[0] + ")", "url(" + images[1] + ")", "url(" + images[2] + ")"];
	// current image index
	var backgroundImage = 0;

	// store the index of the first and last image
	var FIRST_IMAGE_INDEX = 0;
	var LAST_IMAGE_INDEX = piclink.length - 1;

  // var imgURL = "url(".concat(images[0]);
  // var imgURLnew = imgURL.concat(")");
  document.body.style.backgroundImage = "url(" + images[0] + ")";
	//

	var images=[ 'images/slide3.jpg', '../images/cornell.jpg', 'images/slide1.jpg'];
	var url=0;
	setInterval(function(){
	   url+=1;
	  if(url==3){
	    url=0;
	  }
	  document.body.style.backgroundImage = 'url('+ images[url] +')';
	  document.body.style.backgroundRepeat = "no-repeat";
		document.body.style.backgroundWidth = "100%";
		document.body.style.backgroundHeight = "100%";
	},3200);
});
