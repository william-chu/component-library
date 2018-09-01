document.addEventListener("DOMContentLoaded", function() {
  const mastheadCarousel = document.getElementById('masthead-carousel-rail');
  const imagesArray = document.getElementsByClassName('masthead-carousel-image');
  const headlinesArray = [MCdata.headline1, MCdata.headline2, MCdata.headline3];
  let slideInterval;
  let currentSlideIndex = 0;
  let isPaused = false;

  changeImage = (index) => {
    // Hides all images
    for (let i = 0; i < imagesArray.length; i++) {
      imagesArray[i].style.opacity = 0;
    }
    // Shows next image
    imagesArray[index].style.opacity = 1;
  }

  changeText = (index) => {
    document.getElementById('masthead-carousel-headline').innerHTML = headlinesArray[index];
  }

  changeDot = (index) => {
    let dotId = "dot" + index;
    document.getElementById(dotId).classList.toggle('masthead-carousel-dot-active');
  }

  slideForward = () => {
    changeDot(currentSlideIndex);
    currentSlideIndex += 1;
    if (currentSlideIndex > (imagesArray.length - 1)) {
      currentSlideIndex = 0;
    }
    changeImage(currentSlideIndex);
    changeText(currentSlideIndex);
    changeDot(currentSlideIndex);
  }

  slideBack = () => {
    changeDot(currentSlideIndex);
    currentSlideIndex -= 1;
    if (currentSlideIndex < 0) {
      currentSlideIndex = (imagesArray.length - 1);
    }
    changeImage(currentSlideIndex);
    changeText(currentSlideIndex);
    changeDot(currentSlideIndex);
  }

  slideByDot = (index) => {
    changeDot(currentSlideIndex);
    currentSlideIndex = index;
    changeImage(index);
    changeText(index);
    changeDot(index);
  }

  forwardClick = () => {
    if (isPaused) {
      slideForward();
    } else {
      clearSlideInterval();
      slideForward();
      setSlideInterval();
    }
  }

  backClick = () => {
    if (isPaused) {
      slideBack();
    } else {
      clearSlideInterval();
      slideBack();
      setSlideInterval();
    }
  }

  dotClick = (index) => {
    if (isPaused) {
      slideByDot(index);
    } else {
      clearSlideInterval();
      slideByDot(index);
      setSlideInterval();
    }
  }

  setSlideInterval = () => {
    slideInterval = setInterval(function() {
      slideForward();
    }, 7000);
  }

  clearSlideInterval = () => {
    clearInterval(slideInterval);
    slideInterval = null;
  }

  pauseToggle = () => {
    if (slideInterval === null) {
      setSlideInterval();
      isPaused = false;
    } else {
      clearSlideInterval();
      isPaused = true;
    }
    document.getElementById('masthead-carousel-pause').classList.toggle('masthead-carousel-pause-active');
  }

  setSlideInterval();
  changeImage(currentSlideIndex);
});
