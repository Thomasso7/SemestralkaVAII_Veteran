const slider = document.querySelector(".slider");
const firstImg = slider.querySelectorAll("img")[0];
const arrowIcons = document.querySelectorAll(".sliderbox i");
let isDragStart = false, prevPageX, prevScrollLeft;

const showHideIcons = () => {
    let scrollWidth = (slider.scrollWidth - slider.clientWidth);
    if (slider.scrollLeft === 0) {
        arrowIcons[0].style.display = "none";
    } else {
        arrowIcons[0].style.display = "block";
    }
    if (slider.scrollLeft >= scrollWidth) {
        arrowIcons[1].style.display = "none";
    } else {
        arrowIcons[1].style.display = "block";
    }
}

arrowIcons.forEach(icon => {
    let firstImgWidth = firstImg.clientWidth + 10;
    icon.addEventListener("click", () => {
       if (icon.id === "left") {
           slider.scrollLeft -= firstImgWidth;
       } else {
           slider.scrollLeft += firstImgWidth;
       }
       setTimeout(() => showHideIcons(), 60);
   });
});

setInterval(autoScroll, 4000);

function autoScroll() {
    if (!isDragStart) {
        slider.scrollLeft += firstImg.clientWidth + 10;
        setTimeout(() => showHideIcons(), 60);
    }
}

const dragStart = (e) => {
    isDragStart = true;
    e.preventDefault();
    prevPageX = e.pageX || e.changedTouches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
}

const dragStop = () => {
    isDragStart = false;
    slider.classList.remove("dragging");
}
const dragging = (e) => {
    if (!isDragStart) {
        return;
    }
    e.preventDefault();
    slider.classList.add("dragging");
    let positionDiff = (e.pageX || e.changedTouches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}

slider.addEventListener("mousedown", dragStart);
slider.addEventListener("touchstart", dragStart);

slider.addEventListener("mousemove", dragging);
slider.addEventListener("touchmove", dragging);

slider.addEventListener("mouseup", dragStop);
slider.addEventListener("mouseleave", dragStop);
slider.addEventListener("touchend", dragStart);
