// Array of igalerija/ data

var imageData= new Array(10)

createTwoDimensionalArray(3);



// Image galerija/ data

imageData[0][0]="galerija/slika1.jpg";

imageData[1][0]="galerija/slika2.jpg";

imageData[2][0]="galerija/slika3.jpg";

imageData[3][0]="galerija/slika4.jpg";

imageData[4][0]="galerija/slika5.jpg";

imageData[5][0]="galerija/slika6.jpg";

imageData[6][0]="galerija/slika7.jpg";

imageData[7][0]="galerija/slika8.jpg";

imageData[8][0]="galerija/slika9.jpg";

imageData[9][0]="galerija/slika10.jpg";


// Image title data

imageData[0][1]="Grasslands";

imageData[1][1]="Tree Canopy";

imageData[2][1]="In the Clouds";

imageData[3][1]="Sunflower Bud";

imageData[4][1]="Morning Dew";

imageData[5][1]="Hillside Tree";

imageData[6][1]="Winter Wonderland";

imageData[7][1]="Mountain View";

imageData[8][1]="Babbling Brook";

imageData[9][1]="Wooded Trail";



// Image description data

imageData[0][2]="This is the description for the first image. Here will be where we give details on the image that is currently being viewed.";

imageData[1][2]="This is the description for the second image. Here will be where we give details on the image that is currently being viewed.";

imageData[2][2]="This is the description for the third image. Here will be where we give details on the image that is currently being viewed.";

imageData[3][2]="This is the description for the fourth image. Here will be where we give details on the image that is currently being viewed.";

imageData[4][2]="This is the description for the fifth image. Here will be where we give details on the image that is currently being viewed.";

imageData[5][2]="This is the description for the sixth image. Here will be where we give details on the image that is currently being viewed.";

imageData[6][2]="This is the description for the seventh image. Here will be where we give details on the image that is currently being viewed.";

imageData[7][2]="This is the description for the eighth image. Here will be where we give details on the image that is currently being viewed.";

imageData[8][2]="This is the description for the ninth image. Here will be where we give details on the image that is currently being viewed.";

imageData[9][2]="This is the description for the tenth image. Here will be where we give details on the image that is currently being viewed.";


// Our index, boundry and scroll tracking variables

var imageIndexFirst = 0;

var imageIndexLast = 3;

var continueScroll = 0;

var maxIndex = 9;

var minIndex = 0;


// This function creates our two dimensional array

function createTwoDimensionalArray(arraySize) {

for (i = 0; i < imageData.length; ++ i)

imageData[i] = new Array(arraySize);

}


// This function preloads the thumbnail images

function preloadThumbnails() {

imageObject = new Image();

for (i = 0; i < imageData.length; ++ i)

imageObject.src = imageData[i][0];

}



// This function changes the text of a table cell

function changeCellText(cellId,myCellData){

document.getElementById(cellId).innerHTML = myCellData;

}


// This function changes the images

function changeImage(ImageToChange,MyimageData){

document.getElementById(ImageToChange).setAttribute('src',MyimageData)

}


// This function changes the image alternate text

function changeImageAlt(ImageToChange,imageData){

document.getElementById(ImageToChange).setAttribute('alt',imageData)

}


// This function changes the image alternate text

function changeImageTitle(ImageToChange,imageData){

document.getElementById(ImageToChange).setAttribute('title',imageData)

}


// This function changes the image onmouseover

function changeImageOnMouseOver(ImageToChange,imageIndex){

document.getElementById(ImageToChange).setAttribute('onmouseover','handleThumbOnMouseOver(' + imageIndex + ');')

}


// This function hanles calling on change function

// for a thumbnail onmouseover event

function handleThumbOnMouseOver(imageIndex){

changeImage('imageLarge',imageData[imageIndex][0]);

changeCellText('imageTitleCell',imageData[imageIndex][1]);

changeCellText('imageDescriptionCell',imageData[imageIndex][2]);

changeImageAlt('imageLarge',imageData[imageIndex][1] + ' - ' + imageData[imageIndex][2]);

changeImageTitle('imageLarge',imageData[imageIndex][1] + ' - ' + imageData[imageIndex][2]);

}


// This function handles the scrolling in both directions

function scrollImages(scrollDirection) {

// We need a variable for holding our working index value

var currentIndex;

// Determine which direction to scroll - default is down (left)

if (scrollDirection == 'up')

{

// Only do work if we are not to the last image

if (imageIndexLast != maxIndex)

{

// We set the color to black for both before we begin

// If we reach the end during the process we'll change the "button" color to silver

document.getElementById('scrollPreviousCell').setAttribute('style','color: Black')

document.getElementById('scrollNextCell').setAttribute('style','color: Black')

// Move our tracking indexes up one

imageIndexLast = imageIndexLast + 1;

imageIndexFirst = imageIndexFirst + 1;

//  Change next "button" to silver if we are at the end

if (imageIndexLast == maxIndex)

{

document.getElementById('scrollNextCell').setAttribute('style','color: Silver')

}

// Changescrollbar images in a set delay sequence to give a pseudo-animated effect

currentIndex = imageIndexLast;

changeImage('scrollThumb4',imageData[currentIndex][0]);

changeImageOnMouseOver('scrollThumb4',currentIndex);

currentIndex = imageIndexLast - 1;

setTimeout("changeImage('scrollThumb3',imageData[" + currentIndex + "][0])",25);

setTimeout("changeImageOnMouseOver('scrollThumb3'," + currentIndex + ")",25);

currentIndex = imageIndexLast - 2;

setTimeout("changeImage('scrollThumb2',imageData[" + currentIndex + "][0])",50);

setTimeout("changeImageOnMouseOver('scrollThumb2'," + currentIndex + ")",50);

currentIndex = imageIndexLast - 3;

setTimeout("changeImage('scrollThumb1',imageData[" + currentIndex + "][0])",75);

setTimeout("changeImageOnMouseOver('scrollThumb1'," + currentIndex + ")",75);

// Wait and check to see if user is still hovering over button

// This pause gives the user a chance to move away from the button and stop scrolling

setTimeout("scrollAgain('" + scrollDirection + "')",1000);

}

}

else

{

// Only do work if we are not to the first image

if (imageIndexFirst != minIndex)

{

// We set the color to black for both before we begin

// If we reach the end during the process we'll change the "button" color to silver

document.getElementById('scrollPreviousCell').setAttribute('style','color: Black')

document.getElementById('scrollNextCell').setAttribute('style','color: Black')

// Move our tracking indexes down one

imageIndexLast = imageIndexLast - 1;

imageIndexFirst = imageIndexFirst - 1;

//  Change previous "button" to silver if we are at the beginning

if (imageIndexFirst == minIndex)

{

document.getElementById('scrollPreviousCell').setAttribute('style','color: Silver')

}

// Change scrollbar images in a set delay sequence to give a pseudo-animated effect

currentIndex = imageIndexFirst;

changeImage('scrollThumb1',imageData[currentIndex][0]);

changeImageOnMouseOver('scrollThumb1',currentIndex);

currentIndex = imageIndexFirst + 1;

setTimeout("changeImage('scrollThumb2',imageData[" + currentIndex + "][0])",25);

setTimeout("changeImageOnMouseOver('scrollThumb2'," + currentIndex + ")",25);

currentIndex = imageIndexFirst + 2;

setTimeout("changeImage('scrollThumb3',imageData[" + currentIndex + "][0])",50);

setTimeout("changeImageOnMouseOver('scrollThumb3'," + currentIndex + ")",50);

currentIndex = imageIndexFirst + 3;

setTimeout("changeImage('scrollThumb4',imageData[" + currentIndex + "][0])",75);

setTimeout("changeImageOnMouseOver('scrollThumb4'," + currentIndex + ")",75);

// Wait and check to see if user is still hovering over button

// This pause gives the user a chance to move away from the button and stop scrolling

setTimeout("scrollAgain('" + scrollDirection + "')",1000);

}

}

}


// This function determines whether or not to keep scrolling

function scrollAgain(scrollDirection)

{

if (continueScroll == 1)

{

scrollImages(scrollDirection);

}

}


// This function kicks off scrolling down (left)

function scrollPrevious() {

continueScroll = 1;

scrollImages('down');

}


// This function kicks off scrolling up (right)

function scrollNext() {

continueScroll = 1;

scrollImages('up');

}


// This function stops the scrolling action

function scrollStop() {

continueScroll = 0;

}

