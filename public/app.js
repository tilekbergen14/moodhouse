//slider js
const rightArrow = document.getElementById("right-arrow");
const leftArrow = document.getElementById("left-arrow");
const img0 = document.getElementById("img0");
const img1 = document.getElementById("img1");
const img2 = document.getElementById("img2");
const img3 = document.getElementById("img3");
const img4 = document.getElementById("img4");
const images = [img0, img1, img2, img3, img4];

rightArrow.addEventListener("click", () => {
    images.forEach((img) => {
        const index = img.id[3];
        if (parseInt(index) === 4) {
            return (img.id = "img0");
        }
        img.id = "img" + (parseInt(index) + 1);
    });
});
leftArrow.addEventListener("click", () => {
    images.forEach((img) => {
        const index = img.id[3];
        if (parseInt(index) === 0) {
            return (img.id = "img4");
        }
        img.id = "img" + (parseInt(index) - 1);
    });
});

//filter box js
const filterBtn = document.querySelector(".filter-btn");
filterBtn.addEventListener("click", () => {
    const rightSide = document.querySelector(".right-side");
    rightSide.classList.toggle("d-block");
});
