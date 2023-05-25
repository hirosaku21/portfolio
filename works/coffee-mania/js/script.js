const body = document.getElementsByTagName("body");
const postItemNum = document.getElementsByClassName("post-item").length;
const postList = document.querySelector(".post-list");
const navBtn = document.getElementById("js-nav-btn");
const nav = document.getElementById("js-nav");
const header = document.getElementById("js-header");
const mainContents = document.getElementById("js-main-contents");
let windowWidth = window.innerWidth;

window.addEventListener("resize", () => {
  windowWidth = window.innerWidth;
});

let toggleNavBtn = () => {
  navBtn.addEventListener("click", function () {
    this.classList.toggle("open");
    nav.classList.toggle("open");
    body[0].classList.toggle("open");
  });
};

let addHeaderHeight = () => {
  const headerHeight = header.offsetHeight;
  mainContents.style.paddingBlockStart = headerHeight + "px";
  if (windowWidth < 768) {
    nav.style.paddingBlockStart = headerHeight + "px";
  } else {
    nav.style.paddingBlockStart = "0";
  }
};

let addAutoFill = () => {
  if (postList !== null && postItemNum < 3) {
    postList.classList.add("auto-fill");
  }
};

toggleNavBtn();
addHeaderHeight();
addAutoFill();
window.addEventListener("resize", addHeaderHeight);
